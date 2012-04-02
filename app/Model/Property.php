<?php

App::uses('AppModel', 'Model');

/**
 * Property Model
 *
 * @property Category $Category
 */
class Property extends AppModel {

    public $actsAs = array('Tree', 'Containable');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'parent_id' => array(
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

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public function afterSave($options = array()) {
        parent::beforeSave($options);

        Cache::clear();
    }

    public function  afterDelete() {
        parent::afterDelete();

        Cache::clear();
    }
    public function getAllProperty() {
        if(($properties = Cache::read('getAllProperty')) === false){
            $properties = $this->find('all', array('conditions' => array(),
                'fields' => array('Property.id', 'Property.parent_id', 'Property.name'),
                'order' => array('Property.lft' => 'ASC'),
                'contain'=>array('Category'=>array('fields'=>array('Category.id', 'Category.name')))
                    ));
            Cache::write('getAllProperty', $properties);
        }
        return $properties;
    }

    public function getPropertiesByCategory($cateId=0) {
        $condition = ($cateId) ? array('Property.category_id'=>$cateId) : null;
        if(($properties = Cache::read('getPropertiesByCategory'.$cateId)) === false){
            $properties = $this->find('all', array('conditions' => $condition,
                'fields' => array('Property.id', 'Property.parent_id', 'Property.name'),
                'order' => array('Property.lft' => 'ASC'),
                'contain'=>array('Category'=>array('fields'=>array('Category.id', 'Category.name')))
                    ));
            Cache::write('getPropertiesByCategory'.$cateId, $properties);
        }
        return $properties;
    }
    /**
    * Get parent and their childs by specific id
    * Using when choice category, then load properties of this category
    * @int $id
    */
    function listPropertiesByCategory($category_id){
        if (($list_categories = Cache::read('list_properties_by_categories_'.$category_id)) === false) {
            $list_properties = null;
            $properties = $this->generateTreeList(array('Property.category_id' => $category_id), null, null, '');
            //if null: find the properties of father
            if(empty($properties)){
                $category_id = $this->Category->field("parent_id", array("Category.id"=>$category_id));
                $properties = $this->generateTreeList(array('Property.category_id' => $category_id), null, null, '');
            }
            //setup data follow cakephp optgroupt
            if(!empty($properties)){
                $root_properties = $this->find('list', array('fields'=>array('id', 'id'),'conditions'=>array('Property.category_id'=>$category_id, 'Property.parent_id'=>0)));
                $optgroup = null;
                foreach($properties as $property_id => $property_name){
                    if(in_array($property_id, $root_properties)){
                        $optgroup = $property_name;
                    }
                    if(!in_array($property_id, $root_properties)){
                        $list_properties[$optgroup][$property_id] = $property_name;
                    }
                }
            }
            Cache::write('list_properties_by_categories_'.$category_id, $list_categories);
        }
        return $list_properties;
    }
}
