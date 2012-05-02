<?php

App::uses('AppController', 'Controller');

/**
 * EmailMarketings Controller
 *
 * @property EmailMarketing $EmailMarketing
 */
class EmailMarketingsController extends AppController {
    public $components = array('Email');
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Email Marketing'));
        $this->set('description', __('Manage Email Marketing'));


        $this->paginate = array('conditions' => array(), 'order' => array('EmailMarketing.created' => 'DESC'));

        $this->EmailMarketing->recursive = 0;
        $this->set('emailMarketings', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->EmailMarketing->id = $id;
        if (!$this->EmailMarketing->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->set('title', __('EmailMarketing'));
        $this->set('description', __('Review'));

        $this->set('emailMarketing', $this->EmailMarketing->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->EmailMarketing->create();
            $this->loadModel('AclManagement.User');
            $this->loadModel('Subscriber');
            $customers = null;
            $subscribers = null;
            $conditions = null;
            if($this->request->data['EmailMarketing']['customer_type_id'] > 0){
                $conditions = array('Customer.customer_type_id' => $this->request->data['EmailMarketing']['customer_type_id']);
            }else{
                $conditions = array('Customer.customer_type_id > 0');
            
                $subscribers = $this->Subscriber->find('list', array('fields'=>array('Subscriber.id', 'Subscriber.email'),'conditions'=>array('Subscriber.published'=>1)));
            }
            
            if($conditions != null){
                $customers = $this->User->find('list', array(
                    'fields'=>array('User.id', 'User.email'),
                    'joins'=>array(
                        array(  'table' => 'customers',
                                'alias' => 'Customer',
                                'type' => 'LEFT',
                                'conditions' => array(
                                    'Customer.user_id = User.id'
                                ))),
                    'conditions'=>$conditions));
            }
            $customers = array_merge($customers, $subscribers);
            $customers = array_unique($customers);
            
            if ($this->EmailMarketing->save($this->request->data)) {
                foreach($customers as $customer){
                    $this->Email->from = 'no-reply@'.Configure::read('Settings.domain.value');
                    $this->Email->to = $customer;
                    $this->Email->subject = $this->request->data['EmailMarketing']['content'];
                    $email->sendAs = 'html';
                    $this->Email->send($this->request->data['EmailMarketing']['content']);
                }
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        }
        
        $customers = $this->EmailMarketing->CustomerType->find('list', array('conditions'=>array(), 'contain'=>false));
        $customers[-1] = __('Subscribers');
        $this->set('customer_types',$customers);
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->EmailMarketing->id = $id;
        if (!$this->EmailMarketing->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->EmailMarketing->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->EmailMarketing->read(null, $id);
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
        $this->EmailMarketing->id = $id;
        if (!$this->EmailMarketing->exists()) {
            throw new NotFoundException(__('Invalid email marketing'));
        }
        if ($this->EmailMarketing->delete()) {
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
    public function admin_toggle($id, $status, $field = 'published') {
        $this->autoRender = false;

        if ($id) {
            $status = ($status) ? 0 : 1;
            $data['EmailMarketing'] = array('id' => $id, $field => $status);
            if ($this->EmailMarketing->saveAll($data['EmailMarketing'], array('validate' => false))) {
                $url = '/admin/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = '/img/icons/allow-' . $status . '.png';

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
            $orderLists = json_decode($this->request->data['EmailMarketing']['ordered']);
            $queryStr = 'UPDATE ' . $this->EmailMarketing->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            return $this->EmailMarketing->query($queryStr);
        }
        return false;
    }

}
