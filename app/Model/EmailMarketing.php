<?php
App::uses('AppModel', 'Model');
/**
 * EmailMarketing Model
 *
 * @property CustomerType $CustomerType
 */
class EmailMarketing extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        public function beforeValidate($options = array()) {
            parent::beforeValidate($options);
            
            $this->validate['title']['notempty']['message'] = __('Not empty.');
            $this->validate['content']['notempty']['message'] = __('Not empty.');            
            
        }
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CustomerType' => array(
			'className' => 'CustomerType',
			'foreignKey' => 'customer_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
