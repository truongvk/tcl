<?php

App::uses('AppModel', 'Model');

/**
 * StaticPage Model
 *
 */
class StaticPage extends AppModel {
    var $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'path'=>'webroot{DS}files{DS}pages{DS}',
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'deleteOnUpdate' => true
            )
        ),
        'Slug' => array('field' => 'title', 'slug_field' => 'slug', 'primary_key' => 'id', 'replacement' => '_', 'DBcheck'=>true)
    );    
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
        'published' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ordered' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
