<?php
App::uses('AppModel', 'Model');
/**
 * Subscriber Model
 *
 */
class Subscriber extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
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
		)
	);
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);

        $this->validate['email']['email']['message'] = __('Invalid email.');
        $this->validate['email']['unique']['message'] = __('Email already in use.');
    }        
}
