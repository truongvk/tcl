<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');
App::import('Vendor', 'AclManagement.Facebook', array('file' => 'Facebook' . DS . 'src' . DS . 'facebook.php'));
App::import('Vendor', 'AclManagement.Twitter', array('file' => 'Twitter' . DS . 'twitteroauth.php'));

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AclManagementAppController {

    public $uses = array('AclManagement.User');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('register', 'login', 'logout', 'facebook_connect', 'twitter_connect', 'twitter_login', 'oauth_callback');

        $this->User->bindModel(array('belongsTo' => array(
                'Group' => array(
                    'className' => 'AclManagement.Group',
                    'foreignKey' => 'group_id',
                    'dependent' => true
                )
                )), false);
    }

    /**
     * Check facebook status
     *
     */
    private function __checkFBStatus() {
        if ($this->Auth->user()) {
            $this->redirect('/');
        }
        // Create a Facebook client API object.
        $this->facebook = new Facebook(array('appId' => Configure::read('Facebook.appId'), 'secret' => Configure::read('Facebook.secret')));
        //check to see if a user is not logged in, but a facebook user_id is set
        if (!$this->Auth->user() && $this->facebook->getUser()):
            //Get basic data
            try {
                $fbme = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {

            }

            //see if this facebook id is in the User database; if not, create the user using their fbid hashed as their password
            $user_record = $this->User->find('first', array(
                        'conditions' => array('facebook_id' => $this->facebook->getUser()),
                        'fields' => array(),
                        'contain' => array()
                    ));

            //create new user
            if (empty($user_record)):
                $user_record['User']['facebook_id'] = $this->facebook->getUser();
                $user_record['User']['group_id'] = 2; //Member
                $user_record['User']['password'] = $this->Auth->password($this->__randomString());
                if ($fbme) {
                    // getting the profile data
                    $user_id = $fbme['id'];
                    $name = $fbme['name'];
                    $email = $fbme['email'];
                    $username = $fbme['username'];
                    /*
                      $facebook_url=$fbme['link'];
                      $location=$fbme['location']['name'];
                      $bio_info=$fbme['bio'];
                      $work_array=$fbme['work'];
                      $education_array=$fbme["education"];
                      $date_of_birth=$fbme['birthday'];
                     */

                    $user_record['User']['email'] = $email;
                    $user_record['User']['name'] = $name;
                    $user_record['User']['username'] = $username;
                    $user_record['User']['status'] = 1;
                }
                $this->User->create();
                $this->User->save($user_record, false);
            else:
                if (($user_record['User']['facebook_id'] = $this->facebook->getUser()) && ($user_record['User']['status'] == 0)) {
                    $this->Session->setFlash(__('Your account has been banned. Please contact system administrator for more information.'), 'error');
                    $this->redirect('/users/login');
                }
                if ($fbme) {
                    // getting the profile data
                    $name = $fbme['name'];
                    $email = $fbme['email'];
                    $username = $fbme['username'];

                    $user_record['User']['email'] = $email;
                    $user_record['User']['name'] = $name;
                    $user_record['User']['username'] = $username;
                    //$user_record['User']['status']      = 1;

                    $this->User->create();
                    $this->User->updateAll(
                            array(
                                'User.email' => '"' . $email . '"',
                                'User.name' => '"' . $name . '"',
                                'User.username' => '"' . $username . '"'
                            ),
                            array(
                                'facebook_id' => $fbme['id']
                            )
                    );
                }
            endif;

            //change the Auth fields
            if (!isset($user_record['User']['email']) || empty($user_record['User']['email'])) {
                $this->Auth->fields = array('username' => 'facebook_id', 'password' => 'password');
            }

            //log in the user with facebook credentials
            if ($this->Auth->login($user_record['User'])) {
                $this->redirect($this->Auth->redirect());
            }

        endif;
    }

    public function facebook_connect() {
        $this->autoRender = false;
        //check to see if user is signed in with facebook
        $this->__checkFBStatus();
    }

    /**
     * Twitter OAuth Connect
     *
     */
    public function twitter_connect() {
        $this->autoRender = false;

        if (!empty($this->request->query['oauth_verifier']) && $this->Session->check('Twitter.oauth_token') && $this->Session->check('Twitter.oauth_token_secret')) {
            // We've got everything we need
            // TwitterOAuth instance, with two new parameters we got in twitter_login.php
            $twitteroauth = new TwitterOAuth(Configure::read('Twitter.ConsumerKey'), Configure::read('Twitter.ConsumerSecret'), $this->Session->read('Twitter.oauth_token'), $this->Session->read('Twitter.oauth_token_secret'));
            // Let's request the access token
            $access_token = $twitteroauth->getAccessToken($this->request->query['oauth_verifier']);
            // Save it in a session var
            $this->Session->write('Twitter.access_token', $access_token);
            // Let's get the user's info
            $user_info = $twitteroauth->get('account/verify_credentials');
            // Print user's info
            //echo "<pre>";
            //print_r($user_info);
            //echo "</pre>";
            if (isset($user_info->error)) {
                $this->redirect('/users/twitter_login');
            } else {
                $userRecord = $this->User->find('first', array('conditions' => array('User.oauth_provider' => 'twitter', 'User.oauth_uid' => $user_info->id)));
                if (empty($userRecord)) {
                    $userRecord["User"]["oauth_provider"] = 'twitter';
                    $userRecord["User"]["oauth_uid"] = $user_info->id;
                    $userRecord["User"]["oauth_token"] = $access_token['oauth_token'];
                    $userRecord["User"]["oauth_secret"] = $access_token['oauth_token_secret'];
                    $userRecord["User"]["email"] = $user_info->screen_name . '.' . $user_info->id . '@twitter.com';
                    $userRecord['User']['password'] = $this->Auth->password($this->__randomString());
                    $userRecord["User"]["username"] = $user_info->screen_name;
                    $userRecord["User"]["name"] = $user_info->name;
                    $userRecord["User"]["group_id"] = 2; //Member
                    $userRecord['User']['status'] = 1;
                    $this->User->save($userRecord['User'], false);
                } else {
                    if (($userRecord['User']['oauth_uid'] == $user_info->id) && ($userRecord['User']['status'] == 0)) {
                        $this->Session->setFlash(__('Your account has been banned. Please contact system administrator for more information.'), 'error');
                        $this->redirect('/users/login');
                    }

                    $userRecord["User"]["oauth_uid"] = $user_info->id;
                    $userRecord["User"]["oauth_token"] = $access_token['oauth_token'];
                    $userRecord["User"]["oauth_secret"] = $access_token['oauth_token_secret'];
                    $userRecord["User"]["email"] = $user_info->screen_name . '.' . $user_info->id . '@twitter.com';
                    $userRecord["User"]["username"] = $user_info->screen_name;
                    $userRecord["User"]["name"] = $user_info->name;
                    $userRecord["User"]["group_id"] = 2; //Member
                    $this->User->updateAll(
                            array(
                                'User.oauth_token' => '"' . $access_token['oauth_token'] . '"',
                                'User.oauth_secret' => '"' . $access_token['oauth_token_secret'] . '"'
                            ),
                            array(
                                'oauth_provider' => 'twitter',
                                'oauth_uid' => $user_info->id
                            )
                    );
                }
                //change the Auth fields
                if (!isset($userRecord['User']['email']) || empty($userRecord['User']['email'])) {
                    $this->Auth->fields = array('username' => 'oauth_uid', 'password' => 'password');
                }

                //log in the user with facebook credentials
                if ($this->Auth->login($userRecord['User'])) {
                    $this->redirect($this->Auth->redirect());
                }
            }
        } else {
            // Something's missing, go back to square 1
            $this->redirect('/users/twitter_login');
        }
    }

    public function twitter_login() {
        // The TwitterOAuth instance
        $twitteroauth = new TwitterOAuth(Configure::read('Twitter.ConsumerKey'), Configure::read('Twitter.ConsumerSecret'));
        // Requesting authentication tokens, the parameter is the URL we will be redirected to
        $request_token = $twitteroauth->getRequestToken(FULL_BASE_URL . '/users/twitter_connect');

        // Saving them into the session
        $this->Session->write('Twitter.oauth_token', $request_token['oauth_token']);
        $this->Session->write('Twitter.oauth_token_secret', $request_token['oauth_token_secret']);

        // If everything goes well..
        if ($twitteroauth->http_code == 200) {
            // Let's generate the URL and redirect
            $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
            $this->redirect($url);
        } else {
            // It's a bad idea to kill the script, but we've got to know when there's an error.
            throw new NotFoundException(__('Something wrong happened.'));
        }
    }

    public function oauth_callback() {
        //do nothing
        CakeLog::write('Twitter', 'Callback');
    }

    /**
     * login method
     *
     * @return void
     */
    function login() {
        $this->layout = "login";

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect.', 'error');
            }
        }
    }

    /**
     * logout method
     *
     * @return void
     */
    function logout() {
        $this->Session->setFlash('Good-Bye', 'success');
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('title', __('Users'));
        $this->set('description', __('Manage Users'));

        $this->User->recursive = 1;
        $this->set('users', $this->paginate("User"));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'), 'error');
        }
        $this->set('user', $this->User->read(null, $id));
    }

      /**
     * register method
     *
     * @return void
     */
    public function register() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
            $this->request->data['User']['group_id']    = 2;//member
            $this->request->data['User']['status']      = 1;//active user
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $this->request->data['User']['password'] = null;
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     *  Active/Inactive User
     *
     * @param <int> $user_id
     */
    public function toggle($user_id, $status) {
        $this->layout = "ajax";
        $status = ($status) ? 0 : 1;
        $this->set(compact('user_id', 'status'));
        if ($user_id) {
            $data['User'] = array('id' => $user_id, 'status' => $status);
            $allowed = $this->User->saveAll($data["User"], array('validate' => false));
        }
    }

    /**
     * Random pass for social login
     *
     * @param <int> $minlength
     * @param <int> $maxlength
     * @param <booleam> $useupper
     * @param <boolean> $usespecial
     * @param <boolean> $usenumbers
     * @return string
     */
    private function __randomString($minlength = 20, $maxlength = 20, $useupper = true, $usespecial = false, $usenumbers = true) {
        $charset = "abcdefghijklmnopqrstuvwxyz";
        if ($useupper)
            $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($usenumbers)
            $charset .= "0123456789";
        if ($usespecial)
            $charset .= "~@#$%^*()_+-={}|][";
        if ($minlength > $maxlength)
            $length = mt_rand($maxlength, $minlength);
        else
            $length = mt_rand($minlength, $maxlength);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
        }
        return $key;
    }

}
