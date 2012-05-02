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
    public $components = array('Email');
    public $helpers = array('Number', 'Text', 'NamedParams');

    public function  beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('index', 'view', 'edit', 'delete', 'add2cart', 'mini_cart', 'thankyou', 'checkout');
    }

    public function index(){
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

    public function edit(){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        foreach($this->request->data['Cart']['quantity'] as $itemId => $itemQty){
            $this->shoppingCart->edit_item(intval($itemId), intval($itemQty));
        }
        $this->redirect(array('action'=>'index'));
    }

    public function delete($id=null){
        if (!$this->request->is('post') || !$id) {
            throw new MethodNotAllowedException();
        }

        $this->shoppingCart->del_item(intval($id));
        $this->redirect(array('action'=>'index'));
    }

    public function checkout($IsCheckoutWithoutLogin=0){
        if($this->shoppingCart->itemcount <= 0){
            $this->redirect(array('action'=>'index'));
        }

        if(!$this->Session->check('Auth.User.id') && !$IsCheckoutWithoutLogin){
            $this->redirect('/users/login');
        }

        $this->set(compact('IsCheckoutWithoutLogin'));

        if ($this->request->is('post')) {
            $this->loadModel('Order');
            $this->request->data['Order']['user_id'] =  ($this->Session->check('Auth.User.id')) ? $this->Session->read('Auth.User.id') : 0;
            $this->request->data['Order']['personal_information'] = serialize($this->request->data);
            $cartInfo = $this->shoppingCart->get_contents();
            $cartInfo['total'] = $this->shoppingCart->total;
            $this->request->data['Order']['cart_information'] = serialize($cartInfo);
            if($this->Order->save($this->request->data['Order'])){
                $this->shoppingCart->empty_cart();

                //email alert to admin
                $sentTo = $this->requestAction('/global_config/setting2array/admin_email/1');
                $this->Email->from = 'no-reply@'.Configure::read('Settings.domain.value');
                $this->Email->to = $sentTo;
                $this->Email->subject = '[TCLVN]'.__('Warning New Order');
                $email->sendAs = 'html';
                $this->Email->send(__('Just had a new order. Plese visit %s to process this order.', Configure::read('Settings.domain.value')));
                
                $this->redirect(array('action'=>'thankyou'));
            }
        }else{
            if($this->Session->check('Auth.User.id')){
                $this->Session->setFlash(__('Please check your information before checkout.'), 'error');

                $this->loadModel('AclManagement.User');
                $userInfo = $this->User->find('first', array(
                                                'conditions'=>array('User.id'=>$this->Auth->user('id')),
                                                'fields'=>array('CheckoutAddress.*', 'DeliveryAddress.*', 'Customer.*')
                                            ));
                $this->data = $userInfo;
            }
        }
        $this->set('cart', $this->shoppingCart);
    }

    public function thankyou(){

    }
}
?>
