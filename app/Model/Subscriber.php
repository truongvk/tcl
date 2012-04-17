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
}
