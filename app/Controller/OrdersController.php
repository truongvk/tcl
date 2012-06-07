<?php

App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {
    public $helpers = array('Number');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('history');
    }    
    /**
     * Order history of customer 
     */
    public function history(){
        if(!$this->Session->check('Auth.User.id')){
            $this->redirect("/");
        }
        $this->paginate = array(
            //'contain' => array('Customer'),
            'conditions' => array('User.id'=>$this->Auth->user('id')), 
            'order' => array('Order.created' => 'DESC')
        );

        $this->Order->recursive = 0;
        $this->set('orders', $this->paginate());       
    }
    
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Manage Order'));
        //$this->set('description', __('Manage Order'));

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
        
        if(!empty($this->request->data['Order']['customer_type'])){
            $conditions[] = array('Customer.customer_type_id ='.$this->request->data['Order']['customer_type']);
        }
        
        if(!empty($this->request->data['Order']['status'])){
            $status = ($this->request->data['Order']['status'] > 0) ? $this->request->data['Order']['status'] : 0;
            $conditions[] = array('Order.published'=>intval($status));
        }
        
        if(!empty($this->request->data['Order']['customer_name'])){
            $conditions['OR'][] = array('Customer.first_name LIKE "%'.$this->request->data['Order']['customer_name'].'%"');
            $conditions['OR'][] = array('Customer.last_name LIKE "%'.$this->request->data['Order']['customer_name'].'%"');
        }
        
        if(!empty($this->request->data['Order']['from']) && !empty($this->request->data['Order']['to'])){
            $from = explode('/',$this->request->data['Order']['from']);
            array_reverse($from);
            $from = implode('-',$from);  

            $to = explode('/',$this->request->data['Order']['to']);
            array_reverse($to);
            $to = implode('-',$to);                
            $conditions[] = "Order.created BETWEEN '".date('Y-m-d 00:00:00', strtotime($from))."' AND '". date('Y-m-d 23:59:59', strtotime($to))."'";
        }
        
        $this->paginate = array(
            'contain' => array('Customer', 'User'=>array('fields'=>array('User.id','User.email'))),
            'conditions' => $conditions,             
            'order' => array('Order.created' => 'DESC')
        );

        $this->Order->recursive = 0;
        $this->set('orders', $this->paginate());
        
        $customer_types = $this->Order->Customer->CustomerType->find('list');
        $this->set(compact('customer_types'));        
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->set('title', __('Order'));
        $this->set('description', __('View Order'));

        $this->set('order', $this->Order->read(null, $id));
    }


    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Order']['total'] = floatval($this->request->data['Order']['ordertotal']) 
                                                    + floatval($this->request->data['Order']['shipping_fee'])
                                                    + floatval($this->request->data['Order']['fee_arising']);
            if($this->request->data['Order']['published'] < 2){
                $this->request->data['Order']['cancel_reason'] = null;
            }
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Order->read(null, $id);
        }        
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
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->Order->delete()) {
            $this->Session->setFlash(__('Data deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     *  Active/Inactive
     *
     * @param int $id
     * @param int $status
     */
    public function admin_toggle($id, $status, $field='published') {
        $this->autoRender = false;

        if ($id) {
            $status = ($status) ? 0 : 1;
            $data['Order'] = array('id' => $id, $field => $status);
            if ($this->Order->saveAll($data['Order'], array('validate' => false))) {
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
            $orderLists = json_decode($this->request->data['Order']['ordered']);
            $queryStr = 'UPDATE ' . $this->Order->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            return $this->Order->query($queryStr);
        }
        return false;
    }

}
