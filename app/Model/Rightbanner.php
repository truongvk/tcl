<?php
App::uses('AppModel', 'Model');
/**
 * Rightbanner Model
 *
 */
class Rightbanner extends AppModel {
 var $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'path' => 'webroot{DS}files{DS}rightbanners{DS}',
                'thumbnailMethod' => 'php',
                'thumbnailSizes' => array(
                    'big' => '220x600'
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
    
    public function get_rightbanner(){
        if (($sliders = Cache::read('get_rightbanner')) === false) {
            $sliders = $this->find('first', array(
                    'order'=>array('Rightbanner.ordered' => 'ASC'),
                    'conditions'=>array('Rightbanner.published'=>1)
                ));
            Cache::write('get_rightbanner', $sliders);
        }
        return $sliders;
    }
}
