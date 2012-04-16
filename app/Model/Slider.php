<?php

App::uses('AppModel', 'Model');

/**
 * Slider Model
 *
 */
class Slider extends AppModel {

    var $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'path' => 'webroot{DS}files{DS}sliders{DS}',
                'thumbnailMethod' => 'php',
                'thumbnailSizes' => array(
                    'big' => '960x340'
                ),
                'deleteOnUpdate' => true,
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'deleteOnUpdate' => true
            )
        )
    );
    public function afterSave($created) {
        parent::afterSave($created);

        Cache::clear();
        clearCache();//clear cache view
    }

    public function  afterDelete() {
        parent::afterDelete();

        Cache::clear();
        clearCache();//clear cache view
    }
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
        )
    );

    public function get_sliders(){
        if (($sliders = Cache::read('get_sliders')) === false) {
            $sliders = $this->find('all', array(
                    'order'=>array('Slider.ordered' => 'ASC'),
                    'conditions'=>array('Slider.published'=>1, 'Slider.published'=>1)
                ));
            Cache::write('get_sliders', $sliders);
        }
        return $sliders;
    }
}
