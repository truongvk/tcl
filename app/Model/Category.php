<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 */
class Category extends AppModel {
    public $actsAs = array('Tree',
                    'Slug' => array('field' => 'name', 'slug_field' => 'slug', 'primary_key' => 'id', 'replacement' => '_', 'DBcheck'=>true),
        );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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

    public function afterSave($options = array()) {
        parent::beforeSave($options);

        Cache::clear();
        clearCache();
    }

    public function  afterDelete() {
        parent::afterDelete();

        Cache::clear();
        clearCache();
    }


    public function getAllCategory(){
        if(($categories = Cache::read('getAllCategory')) === false){
            $categories = $this->find('all',
                                    array('conditions'=>array(),
                                        'fields'=>array('Category.id', 'Category.parent_id', 'Category.name', 'Category.published'),
                                        'order'=>array('Category.lft' => 'ASC')
                                        ));
            Cache::write('getAllCategory', $categories);
        }
        return $categories;
    }

    /**
     * get category that has parent_id = 0
     *
     * @return array
     */
    public function getParentCategories($fields = array('id', 'name')){
        if (($list_categories = Cache::read('getParentCategories'.implode("_", $fields), 'where2list')) === false) {
            $root_categories = $this->find('list', array('fields'=>$fields, 'order'=>array('Category.lft' => 'ASC'),'conditions'=>array('Category.parent_id'=>0, 'Category.published'=>1)));
            Cache::write('getParentCategories'.implode("_", $fields), $root_categories);
        }
        return $root_categories;
    }
    /**
     * Get all parent and their childs
     * @int $id
     */
    public function listCategories($key=null, $value=null) {
        $keyCache = base64_encode($key.$value);
        if (($categories = Cache::read('list_categories'.$keyCache)) === false) {
            $categories = $this->generateTreeList(array('Category.published' => 1), $key ,$value, '--');
            Cache::write('list_categories'.$keyCache, $categories);
        }
        return $categories;
    }

    public function getCategoryById($category_id){
        if (($catname = Cache::read('getCategoryById'.$category_id)) === false) {
            $catname = $this->find('first', array('fields'=>array('Category.id', 'Category.parent_id', 'Category.name', 'Category.slug', 'Category.product_count'),'conditions'=>array('Category.id'=>$category_id)));
            Cache::write('getCategoryById'.$category_id, $catname);
        }
        return $catname;
    }


    public function getBreadscrumbPath($category_id){
        if (($parents = Cache::read('getBreadscrumbPath'.$category_id)) === false) {
            $parents = $this->getPath($category_id, array('Category.id', 'Category.name', 'Category.slug', 'Category.product_count'));
            Cache::write('getBreadscrumbPath'.$category_id, $parents);
        }
        return $parents;
    }
    public function getCategoryIdBySlug($slug){
        if (($id = Cache::read('getCategoryIdBySlug'.$slug)) === false) {
            $id = $this->field('Category.id', array('Category.slug'=>$slug));
            Cache::write('getCategoryIdBySlug'.$slug, $id);
        }
        return $id;
    }

}
