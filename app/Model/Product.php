<?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property Category $Category
 * @property ProductGallery $ProductGallery
 * @property Property $Property
 */
class Product extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'instock' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_promoted' => array(
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
    
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);

        $this->validate['name']['notempty']['message'] = __('Not empty.');
    }
        
    public $actsAs = array(
        'Slug' => array('field' => 'name', 'slug_field' => 'slug', 'primary_key' => 'id', 'replacement' => '-', 'DBcheck'=>true),
        'Containable'
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
            'order' => '',
            'counterCache' => true
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Gallery' => array(
			'className' => 'Attachment',
			'foreignKey' => 'foreign_key',
			'conditions' => array(
				'Gallery.model' => 'Product',
			),
                        'order'=>array('Gallery.ordered'=>'ASC')
		)
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Property' => array(
            'className' => 'Property',
            'joinTable' => 'products_properties',
            'foreignKey' => 'product_id',
            'associationForeignKey' => 'property_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

    public function afterSave($created) {
        parent::afterSave($created);

        if(!empty($this->data['Gallery']['upload'])){
            $this->data['Gallery']['model'] = 'Product';
            $this->data['Gallery']['foreign_key'] = ($this->getLastInsertID()) ? $this->getLastInsertID() : $this->id;
            foreach($this->data['Gallery']['upload'] as $attachment){
                if(isset($attachment['error']) && $attachment['error'] > 0){
                    continue;
                }
                $this->data['Gallery']['attachment'] = $attachment;
                $this->Gallery->save($this->data);
                $this->Gallery->id = false;
            }
        }

        Cache::clear();
        clearCache();//clear cache view
    }

    public function  afterDelete() {
        parent::afterDelete();

        Cache::clear();
        clearCache();//clear cache view
    }

    /**
     * Get promotion product
     *
     * @return array
     */
    public function getPromotionProducts(){
        if (($products = Cache::read('getPromotionProducts')) === false) {
            $products = $this->find('all', array(
                    'order'=>array('Category.lft' => 'ASC','Product.ordered' => 'ASC'),
                    'fields'=>array('Product.id', 'Product.name', 'Product.slug', 'Product.excerpt', 'Product.features_excerpt', 'Product.price'),
                    'contain'=>array('Category','Gallery'=>array('fields'=>array('Gallery.attachment', 'Gallery.dir'),'order'=>array('Gallery.ordered'=>'ASC'), 'limit'=>1)),
                    'conditions'=>array('Product.published'=>1, 'Product.is_promoted'=>1),
                    'limit'=>  Configure::read('Settings.num_of_promotion_products.value'),
                ));
            Cache::write('getPromotionProducts', $products);
        }
        return $products;
    }
    /**
     * Get latest product
     *
     * @return array
     */
    public function getLatestProducts(){
        if (($products = Cache::read('getLatestProducts')) === false) {
            $products = $this->find('all', array(
                    'order'=>array('Category.lft' => 'ASC','Product.created' => 'DESC'),
                    'fields'=>array('Product.id', 'Product.name', 'Product.slug', 'Product.excerpt', 'Product.features_excerpt', 'Product.price'),
                    'contain'=>array('Category','Gallery'=>array('fields'=>array('Gallery.attachment', 'Gallery.dir'),'order'=>array('Gallery.ordered'=>'ASC'), 'limit'=>1)),
                    'conditions'=>array('Product.published'=>1),
                    'limit'=>  Configure::read('Settings.num_of_latest_products.value'),
                ));
            Cache::write('getLatestProducts', $products);
        }
        return $products;
    }

    public function getProductDetail($id){
        if (($products = Cache::read('getProductDetail'.$id)) === false) {
            $products = $this->find('first', array('conditions'=>array('Product.id'=>$id),
                                        'contain'=>array('Gallery'=>array('fields'=>array('Gallery.id','Gallery.attachment', 'Gallery.dir')),
                                            'Category'=>array('fields'=>array('Category.id','Category.name','Category.slug')))
                                        ));
            Cache::write('getProductDetail'.$id, $products);
        }
        return $products;
    }

    public function getRelatedProducts($exceptID, $categoryId){
        if (($products = Cache::read('getRelatedProducts'.$exceptID.$categoryId)) === false) {
            $products = $this->find('all', array(
                                            'conditions'=>array('Product.id <>'=>$exceptID, 'Product.category_id'=>$categoryId),
                                            'fields' => array('Product.id', 'Product.slug', 'Product.name'),
                                            'limit' => 20,
                                            'contain'=>array('Gallery'=>array('fields'=>array('Gallery.attachment', 'Gallery.dir'),'order'=>array('Gallery.ordered'=>'ASC'), 'limit'=>1))
                                        ));
            Cache::write('getRelatedProducts'.$exceptID.$categoryId, $products);
        }
        return $products;
    }
    
    public function getProductIdBySlug($slug){
        if (($products = Cache::read('getProductIdBySlug'.$slug)) === false) {
            $products = $this->field('Product.id', array('Product.slug'=>$slug));
            Cache::write('getProductIdBySlug'.$slug, $products);
        }
        return $products;
    }
    
    
}
