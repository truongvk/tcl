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


        $this->paginate = array('conditions' => array(), 'order' => array('Customer.ordered' => 'ASC'));

        $this->Customer->recursive = 0;
        $this->set('customers', $this->paginate());
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
            throw new NotFoundException(__('Invalid customer'));
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
            
            $this->Session->setFlash(__('Customer deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Customer was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }
}
