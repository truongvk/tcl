<?php
/**
 * User Model
 */
App::uses('AclManagementAppModel', 'AclManagement.Model');
App::uses('CakeEmail', 'Network/Email');
class User extends AclManagementAppModel {
    public $name = 'User';
    public $useTable = "users";
    public $actsAs = array('Acl' => array('type' => 'requester'), 'Containable');
    public $validate = array(
//        'username' => array(
//            'alphanumeric' => array(
//                'rule' => 'alphaNumeric',
//                'message' => 'Only letters and numbers allowed.'
//            ),
//            'minlength' => array(
//                'rule' => array('minLength', '3'),
//                'message' => 'Minimum length of 3 characters.'
//            ),
//            'maxlength' => array(
//                'rule' => array('maxLength', '32'),
//                'message' => 'Maximum length of 32 characters.'
//            ),
//            'unique' => array(
//                'rule' => 'isUnique',
//                'message' => 'Username already in use.'
//            )
//        ),
//        'name' => array(
//            'required' => true,
//            'allowEmpty' => false,
//            'rule' => 'notEmpty',
//            'message' => 'You must enter your real name.'
//        ),
        'email' => array(
            'notempty' => array(
                    'rule' => array('notempty'),
                    //'message' => 'Your custom message here',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),            
            'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Invalid email.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'Email already in use.'
            )
        ),
        'password' => array(
            'required' => true,
            'allowEmpty' => false,
            'rule' => 'comparePwd',
            'message' => 'Password mismatch or less than 6 characters.'
        )
    );
    public $hasOne = array(
        'CheckoutAddress' => array(
            'className'    => 'CheckoutAddress',
            'foreignKey' => 'user_id',
            'conditions'   => array(),
            'dependent'    => true
        ),
        'DeliveryAddress' => array(
            'className'    => 'DeliveryAddress',
            'foreignKey' => 'user_id',
            'conditions'   => array(),
            'dependent'    => true
        ),
        'Customer' => array(
            'className'    => 'Customer',
            'foreignKey' => 'user_id',
            'conditions'   => array(),
            'dependent'    => true
        )
    );

    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    /**
     * Group-only ACL
     * This method will tell ACL to skip checking User Aro’s and to check only Group Aro’s.
     * Every user has to have assigned group_id for this to work.
     *
     * @param <type> $user
     * @return array
     */
    function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }


    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);

        $this->validate['email']['email']['message'] = __('Invalid email.');
        $this->validate['email']['unique']['message'] = __('Email already in use.');
        $this->validate['password']['message'] = __('Password mismatch or less than 6 characters.');
            
        if (isset($this->data['User']['id'])) {
            $this->validate['password']['required'] = false;
            $this->validate['password']['allowEmpty'] = true;
            unset($this->validate['email']);
        }

        return true;
    }

    public function beforeSave() {
        App::uses('Security', 'Utility');
        App::uses('String', 'Utility');

        if (empty($this->data['User']['password'])) { # empty password -> do not update
            unset($this->data['User']['password']);
        } else {
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
        }

        $this->data['User']['key'] = String::uuid();

        return true;
    }

    public function comparePwd($check) {
        $check['password'] = trim($check['password']);

        if (!isset($this->data['User']['id']) && strlen($check['password']) < 6) {
            return false;
        }

        if (isset($this->data['User']['id']) && empty($check['password'])) {
            return true;
        }

        $r = ($check['password'] == $this->data['User']['password2'] && strlen($check['password']) >= 6);

        if (!$r) {
            $this->invalidate('password2', __d('user', 'Password missmatch.'));
        }

        return $r;
    }

    function forgotPassword($email) {
        $user = $this->find('first', array("conditions" => array("User.email"=> $email), "contain"=>array('Customer')));
        if ($user) {
            $id = $user['User']['id'];
            $password = $user['User']['password'];

            $salt = Configure::read("Security.salt");
            $activate_key = md5($password . $salt);

            $link = Router::url("/users/activate_password/$id/$activate_key", true);
            $link = "<a href='".$link."' target='_blank'>".$link."</a>";

            $message = __("Forgot your password, %s ?<br> We received a request to reset the password for your account (%s) . If you want to reset your password, please click on the link below (or copy and paste the URL into your browser).
            <br>" . $link . "<br>This link takes you to a secure page where you can change your password. However, if you don’t want to reset your password, please ignore this message.
            <br>Yours sincerely,<br>", $user['Customer']['last_name'].' '.$user['Customer']['first_name'], $user['User']['email']);

            $cake_email = new CakeEmail();
            $cake_email->from(array('no-reply@'.Configure::read('Settings.domain.value') => 'TCLVN'));
            $cake_email->to($email);
            $cake_email->subject('[TCLVN] '.__('Forgot Password'));
            $cake_email->send($message);

            return true;
        }
        else {
            return false;
        }
    }
    
    function activatePassword($data) {
        $user = $this->read(null, $data['User']['ident']);pr($data);
        if ($user) {
            $password = $user['User']['password'];
            $salt = Configure::read("Security.salt");
            $thekey = md5($password . $salt);

            if ($thekey == $data['User']['activate']) {
                $password = AuthComponent::password($data['User']['password']);
                if ($this->updateAll(array('User.password' => "'".$password."'"), array("User.id" => $data['User']['ident']))) {
                    return true;
                } else {
                    return false;
                }                
            } else {
                return false;
            }
        } 
        return false;
    }    
}