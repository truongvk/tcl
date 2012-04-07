<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('Sanitize', 'Utility');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class CartController extends AppController {

    public $helpers = array('Number', 'Text', 'NamedParams');

    public function  beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('index', 'view', 'delete', 'add2cart', 'mini_cart');
    }

    public function index(){        
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }

        $this->set('cart', $this->shoppingCart);
    }

    public function view(){
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->layout = 'ajax';
        $this->set('cart', $this->shoppingCart);
    }
    
    public function add2cart(){
        $this->autoRender = false;
        if (!$this->request->is('post') || !$this->request->is('ajax')) {
            throw new MethodNotAllowedException();
        }
        $this->loadModel('Product');
        if ($this->request->is('post')) {
            $id = $this->request->data['Product']['id'];
            $qty = $this->request->data['Product']['qty'];
            $this->Product->id = $id;
            if (!$this->Product->exists()) {
                return false;
            }
            $product = $this->Product->find('first', array('conditions'=>array('Product.id'=>$id), 'fields'=>array('Product.name', 'Product.price', 'Product.slug'),
                'contain'=>array('Gallery'=>array('fields'=>array('Gallery.attachment', 'Gallery.dir'),'order'=>array('Gallery.ordered'=>'ASC'), 'limit'=>1))));
            $extra = Array();
            $extra['slug'] =  $product['Product']['slug'];
            $extra['image'] =  !empty($product['Gallery']) ? array('name'=>$product['Gallery'][0]['attachment'], 'dir'=>$product['Gallery'][0]['dir']) : null;
            $this->shoppingCart->add_item($id, $qty, $product['Product']['price'], $product['Product']['name'], $extra);

            return true;
        }
        return false;
    }

    public function mini_cart(){
        $this->layout = 'ajax';
    }

    public function delete($id=null){
        if (!$this->request->is('post') || !$id) {
            throw new MethodNotAllowedException();
        }

        $this->shoppingCart->del_item(intval($id));
        $this->redirect(array('action'=>'index'));
    }
}
?>
