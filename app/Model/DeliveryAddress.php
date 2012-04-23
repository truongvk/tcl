<?php
App::uses('AppModel', 'Model');
/**
 * CheckoutAddress Model
 *
 * @property User $User
 */
class DeliveryAddress extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'delivery_address';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(		
		'phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Not empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Not empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ward' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Not empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'district' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Not empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Not empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
        public function beforeValidate($options = array()) {
            parent::beforeValidate($options);
            
            $this->validate['first_name']['notempty']['message'] = __('Not empty.');
            $this->validate['last_name']['notempty']['message'] = __('Not empty.');
            $this->validate['phone']['notempty']['message'] = __('Not empty.');
            $this->validate['address']['notempty']['message'] = __('Not empty.');
            $this->validate['ward']['notempty']['message'] = __('Not empty.');
            $this->validate['district']['notempty']['message'] = __('Not empty.');
            $this->validate['city']['notempty']['message'] = __('Not empty.');
            
        }
}
