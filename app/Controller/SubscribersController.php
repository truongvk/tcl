<?php

App::uses('AppController', 'Controller');

/**
 * Subscribers Controller
 *
 * @property Subscriber $Subscriber
 */
class SubscribersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('add');
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Subscriber'));
        $this->set('description', __('Manage Subscriber'));


        $this->paginate = array('conditions' => array(), 'order' => array('Subscriber.id' => 'DESC'));

        $this->Subscriber->recursive = 0;
        $this->set('subscribers', $this->paginate());
    }

    /**
     * add method
     *
     * 
     * @return void
     */
    public function add() {
        if(!$this->request->is('ajax')){
            throw new NotFoundException(__('Invalid Contact'));
        }
        $this->autoRender = false;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Subscriber->save($this->request->data)) {
                return true;
            } else{
                $invalidFields = $this->Subscriber->invalidFieldsList();
                return $invalidFields;
            }
            return false;
        } 
    }
    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Subscriber->read(null, $id);
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
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->Subscriber->delete()) {
            $this->Session->setFlash(__('Subscriber deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Subscriber was not deleted'), 'error');
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
            $data['Subscriber'] = array('id' => $id, $field => $status);
            if ($this->Subscriber->saveAll($data['Subscriber'], array('validate' => false))) {
                $url = '/admin/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = '/img/icons/allow-' . $status . '.png';

                return "<img id=\"status-{$id}\" onclick=\"published.toggle('status-{$id}', '{$url}');\" src=\"{$src}\">";
            }
        }

        return false;
    }

}
