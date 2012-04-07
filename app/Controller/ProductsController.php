<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('Sanitize', 'Utility');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

    public $helpers = array('Number', 'Text', 'NamedParams');

    public function  beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('index','detail', 'view');
    }

    /**
     * homepage
     */
    public function index() {
        $this->layout = 'homepage';

        /**
         * Get promotion products
         */
        $promotion_products = $this->Product->getPromotionProducts();
        $this->set(compact('promotion_products'));
        /**
         * Get latest products
         */
        $latest_products = $this->Product->getLatestProducts();
        $this->set(compact('latest_products'));
    }

    public function view($category_id=0) {
        $this->Product->Category->id = $category_id;
        if (!$this->Product->Category->exists()) {
            throw new NotFoundException(__('Invalid Category'));
        }
        /**
         * Get attribute to search
         */
         $attributes = $this->Product->Property->getThreadPropertiesByCategoryId($category_id);
         $this->set(compact('attributes'));
        /**
         *Initial condition for view
         */
        $conditions = array('Product.published'=>1) ;
        if($category_id){
            if($this->Product->Category->childCount($category_id, true) > 0){
                $children = $this->Product->Category->children($category_id, true, array('id'));
                $children = Set::extract('/Category/id', $children);
                $conditions['Product.category_id'] = $children;
            }  else {
                $conditions['Product.category_id'] = $category_id;
            }

            $category = $this->Product->Category->getCategoryById($category_id);
            $this->set('category_name', $category['Category']['name']);
        }
        /**
         * Filter
         */
        $joins = null;
        $group = null;
        if (!empty($this->request->params["named"])) {
           //filter properties
            $properties_params = Set::extract("/Property[parent_id=0]/slug", $attributes);
            $scopeProperties = null;
            foreach ($properties_params as $slug) {
                if (isset($this->request->params["named"][$slug]) && !empty($this->request->params["named"][$slug])) {
                    $scopeProperties["OR"][] = "ProductsProperty.property_id = (SELECT Property.id FROM properties Property WHERE Property.slug = '" . Sanitize::escape($this->request->params["named"][$slug])."')";
                }
            }
            if (!empty($scopeProperties)) {
                $joins = array(
                    'table' => 'products_properties',
                    'alias' => 'ProductsProperty',
                    'type' => 'left',
                    'conditions' => array("ProductsProperty.product_id = Product.id"));

                $group = array("Product.id HAVING COUNT(Product.id) = " . count($scopeProperties["OR"]));
                $conditions = array_merge($conditions, $scopeProperties);
            }
        }
        /**
         * List Products By Category
         */
        $key = md5(serialize($conditions));
        if (($products = Cache::read('filterProduct'.$key)) === false) {
            $products = $this->Product->find('all', array(
                    'order'=>array('Category.lft' => 'ASC', 'Product.ordered' => 'ASC'),
                    'fields'=>array('Product.id', 'Product.name', 'Product.slug', 'Product.excerpt', 'Product.features_excerpt', 'Product.price'),
                    'contain'=>array('Category'=>array('fields'=>array('Category.id', 'Category.name')),'Gallery'=>array('fields'=>array('Gallery.attachment', 'Gallery.dir'),'order'=>array('Gallery.ordered'=>'ASC'), 'limit'=>1)),
                    'conditions'=>$conditions,
                    'joins'=>array($joins),
                    'group'=>$group
                ));
            Cache::write('filterProduct'.$key, $products);
        }
        $this->set(compact('products', 'category_id'));

    }

    public function detail($id) {
        /**
         * Get product detail
         */
        $product = $this->Product->getProductDetail($id);
        $this->set(compact('product'));

        /**
         *Get related products
         */
        $related_products = null;
        $category = null;
        if(!empty($product)){
            $related_products = $this->Product->getRelatedProducts($id, $product['Product']['category_id']);
            $category = $this->Product->Category->getCategoryById($product['Product']['category_id']);
        }
        $this->set('category', $category);
        $this->set(compact('related_products'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Product'));
        $this->set('description', __('Manage Product'));


        $this->paginate = array('conditions' => array(), 'order' => array('Product.created' => 'DESC', 'Product.ordered' => 'ASC'));

        $this->Product->recursive = 0;
        $this->set('products', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }

        $this->set('title', __('Product'));
        $this->set('description', __('View Product'));

        $this->set('product', $this->Product->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->loadModel('ProductsProperty');
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $lastID = $this->Product->getLastInsertID();

                $this->ProductsProperty->saveProperties($this->request->data, $lastID);

                $this->Session->setFlash(__('The product has been saved'), 'success');
                $this->redirect(array('action' => 'edit', $lastID));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'error');
            }
        }
        $categories = $this->Product->Category->generateTreeList();
        $this->set(compact('categories'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->loadModel('ProductsProperty');

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Product->save($this->request->data)) {
                $lastID = $this->request->data['Product']['id'];

                $this->ProductsProperty->saveProperties($this->request->data, $lastID);

                $this->Session->setFlash(__('The product has been saved'), 'success');
                $this->redirect(array('action' => 'edit', $lastID));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Product->read(null, $id);
            $properties = $this->Product->ProductsProperty->find('list', array(
                        'fields' => array('id', 'property_id'),
                        'conditions' => array('ProductsProperty.product_id' => $id),
                        'contain' => false));
            if (!empty($properties)) {
                $this->set('properties', $properties);
            }
        }
        $categories = $this->Product->Category->generateTreeList();
        $this->set(compact('categories'));
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->Product->delete()) {
            $this->Product->ProductsProperty->deleteAll(array('ProductsProperty.product_id'=>$id));
            $galleries = $this->Product->Gallery->find('list', array(
                'fields'=>array('Gallery.id', 'Gallery.id'),
                'conditions'=>array('Gallery.model'=>'Product','Gallery.foreign_key'=>$id)));
            if(!empty($galleries)){
                foreach($galleries as $galleriesId){
                    $gallery_folder = WWW_ROOT.'files'.DS.'products'.DS.$galleriesId;
                    if (is_dir($gallery_folder)) {
                        $folder = new Folder($gallery_folder);
                        $folder->delete();
                        @rmdir($gallery_folder);
                    }
                }
                $this->Product->Gallery->deleteAll(array('Gallery.id'=>$galleries));
            }

            $this->Session->setFlash(__('Product deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     *  Active/Inactive
     *
     * @param int $id
     * @param int $status
     */
    public function admin_toggle($id, $status, $field = 'published') {
        $this->autoRender = false;

        if ($id) {
            $status = ($status) ? 0 : 1;
            $data['Product'] = array('id' => $id, $field => $status);
            if ($this->Product->saveAll($data['Product'], array('validate' => false))) {
                $link = ($this->base) ? FULL_BASE_URL . $this->base : '';
                $url = $link . '/admin/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = $link . '/img/icons/allow-' . $status . '.png';

                return "<img id=\"status-{$id}\" onclick=\"published.toggle('status-{$id}', '{$url}');\" src=\"{$src}\">";
            }
        }

        return false;
    }

    /**
     *  Order by Drag/Drop
     *
     */
    public function admin_ordered() {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $orderLists = json_decode($this->request->data['Product']['ordered']);
            $queryStr = 'UPDATE ' . $this->Product->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            $this->Product->query($queryStr);
            Cache::clear();
            return true;
        }
        return false;
    }

    /**
     *  Order Gallery by Drag/Drop
     */
    public function admin_gallery_ordered() {
        if (!$this->request->is('ajax')) {
            throw new MethodNotAllowedException();
        }
        $this->autoRender = false;

        if (!empty($this->request->data)) {
            $orderLists = null;
            parse_str($this->request->data['Gallery']['ordered'], $orderLists);
            $queryStr = 'UPDATE attachments SET ordered = CASE id ';
            foreach ($orderLists['listItem'] as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists['listItem']) . ');';

            $this->Product->query($queryStr);
            Cache::clear();
            return true;
        }
        return false;
    }
    /**
     * admin_delete_image method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete_image($galleriesId = null) {
        $this->autoRender = false;

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->Gallery->delete($galleriesId)) {
            $gallery_folder = WWW_ROOT.'files'.DS.'products'.DS.$galleriesId;
            if (is_dir($gallery_folder)) {
                $folder = new Folder($gallery_folder);
                $folder->delete();
                @rmdir($gallery_folder);
            }
            return true;
        }
        return false;
    }
}