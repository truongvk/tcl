<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 */
class Category extends AppModel {
    public $actsAs = array(
        'Slug' => array('field' => 'name', 'slug_field' => 'slug', 'primary_key' => 'id', 'replacement' => '-'),
        'Tree'
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
    }

    public function  afterDelete() {
        parent::afterDelete();

        Cache::clear();
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
    public function listCategories() {
        if (($list_categories = Cache::read('list_main_categories')) === false) {
            $root_categories = $this->getParentCategories(array('id', 'id'));
            $categories = $this->generateTreeList(array('Category.published' => 1), null, null, '');
            $list_categories = null;
            $optgroup = null;
            foreach ($categories as $category_id => $category_name) {
                if (in_array($category_id, $root_categories)) {
                    $optgroup = $category_name;
                }
                if (!in_array($category_id, $root_categories)) {
                    $list_categories[$optgroup][$category_id] = $category_name;
                }
            }
            Cache::write('list_main_categories', $list_categories);
        }
        return $list_categories;
    }
    
    public function getCategoryName($category_id){
        if (($catname = Cache::read('getCategoryName')) === false) {
            $catname = $this->field('Category.name', array('Category.id'=>$category_id));
            Cache::write('getCategoryName', $catname);
        }
        return $catname;
    }
}
