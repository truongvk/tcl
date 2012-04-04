<?php
App::uses('AppModel', 'Model');

class Attachment extends AppModel {
	public $name = 'Attachment';
	public $actsAs = array(
		'Upload.Upload' => array(
			'attachment' => array(
                                    'path'=>'webroot{DS}files{DS}products{DS}',
                                    'thumbnailMethod'=>'php',
                                    'thumbnailSizes' => array(
                                        'big' => '800x600',
                                        'small' => '450x340',
                                        'thumb' => '260x180',                             
                                        'tiny' => '80x80'                                    
                                    ),
                                    'deleteOnUpdate' => true
			),
		),
	);

	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'foreign_key',
		)
	);
        
        public function beforeSave($options = array()) {
            parent::beforeSave($options);
            //pr($this->data['Attachment']);exit;
            return true;
        }
}
?>
