<?php

App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {

    //public $uses = array('Customer', 'AclManagement.User');
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Customer'));
        $this->set('description', __('Manage Customer'));

        $conditions = array();
        if ($this->request->is('post')) {
            if(!empty($this->request->data)){
                $this->set('conditions', base64_encode(serialize($this->request->data)));
            }            
        }else{
            if(isset($this->request->params['named']['conditions'])){
                $this->request->data = unserialize(base64_decode($this->request->params['named']['conditions']));
            }
        }        
        
        if(!empty($this->request->data['Customer']['customer_type'])){
            $conditions[] = array('Customer.customer_type_id ='.$this->request->data['Customer']['customer_type']);
        }
        
        if(!empty($this->request->data['Customer']['customer_name'])){
            $conditions['OR'][] = array('Customer.first_name LIKE "%'.$this->request->data['Customer']['customer_name'].'%"');
            $conditions['OR'][] = array('Customer.last_name LIKE "%'.$this->request->data['Customer']['customer_name'].'%"');
        }
        
        if(!empty($this->request->data['Customer']['customer_email'])){
            $conditions[] = array('User.email LIKE "%'.$this->request->data['Customer']['customer_email'].'%"');
        }
        if(!empty($this->request->data['Customer']['from']) && !empty($this->request->data['Customer']['to'])){
            $from = explode('/',$this->request->data['Customer']['from']);
            array_reverse($from);
            $from = implode('-',$from);  

            $to = explode('/',$this->request->data['Customer']['to']);
            array_reverse($to);
            $to = implode('-',$to);                
            $conditions[] = "User.created BETWEEN '".date('Y-m-d 00:00:00', strtotime($from))."' AND '". date('Y-m-d 23:59:59', strtotime($to))."'";
        }
        
        $this->paginate = array('conditions' => $conditions, 'order' => array('Customer.id' => 'ASC'));

        $this->Customer->recursive = 0;
        $this->set('customers', $this->paginate());
        
        $customer_types = $this->Customer->CustomerType->find('list');
        $this->set(compact('customer_types'));        
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->set('title', __('Customer'));
        $this->set('description', __('Customer Info'));

        $this->Customer->User->id = $id;
        if (!$this->Customer->User->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->Customer->User->bindModel(array(
            'hasOne' => array(
                'CheckoutAddress' => array(
                    'className'    => 'CheckoutAddress',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                ),
                'DeliveryAddress' => array(
                    'className'    => 'DeliveryAddress',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                ),
                'Customer' => array(
                    'className'    => 'Customer',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                )                
            )
        ));
        $this->set('customer', $this->Customer->User->find('first', 
                array(
                    'conditions'=>array('User.id'=>$id),
                    'contain'=>array('Customer')
                )));
    }
    
    /**
     * email marketing method
     *
     * @param string $id
     * @return void
     */
    public function admin_email_marketing() {
        $this->set('title', __('Email Marketing'));
        $this->set('description', __('Send Email To Customers'));

       

        $this->Customer->User->bindModel(array(
            'hasOne' => array(
                'CheckoutAddress' => array(
                    'className'    => 'CheckoutAddress',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                ),
                'DeliveryAddress' => array(
                    'className'    => 'DeliveryAddress',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                ),
                'Customer' => array(
                    'className'    => 'Customer',
                    'foreignKey' => 'user_id',
                    'conditions'   => array(),
                    'dependent'    => true
                )                
            )
        ));
        $this->set('customer', $this->Customer->User->find('first', 
                array(
                    'conditions'=>array('User.id'=>$id),
                    'contain'=>array('Customer')
                )));
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
        $this->loadModel('CheckoutAddress');
        $this->loadModel('DeliveryAddress');    
        
        if ($this->User->delete($id)) {
            $this->Customer->deleteAll(array('Customer.user_id'=>$id));
            $this->CheckoutAddress->deleteAll(array('CheckoutAddress.user_id'=>$id));
            $this->DeliveryAddress->deleteAll(array('DeliveryAddress.user_id'=>$id));
            
            $this->Session->setFlash(__('Data deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }
}
