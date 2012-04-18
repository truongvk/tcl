<?php

App::uses('AppController', 'Controller');

/**
 * CustomerTypes Controller
 *
 * @property CustomerType $CustomerType
 */
class CustomerTypesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('CustomerType'));
        $this->set('description', __('Manage CustomerType'));


        $this->paginate = array('conditions' => array(), 'order' => array('CustomerType.ordered' => 'ASC'));

        $this->CustomerType->recursive = 0;
        $this->set('customerTypes', $this->paginate());
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->CustomerType->create();
            if ($this->CustomerType->save($this->request->data)) {
                $this->Session->setFlash(__('The customer type has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer type could not be saved. Please, try again.'), 'error');
            }
        }
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->CustomerType->id = $id;
        if (!$this->CustomerType->exists()) {
            throw new NotFoundException(__('Invalid customer type'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CustomerType->save($this->request->data)) {
                $this->Session->setFlash(__('The customer type has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer type could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->CustomerType->read(null, $id);
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
        $this->CustomerType->id = $id;
        if (!$this->CustomerType->exists()) {
            throw new NotFoundException(__('Invalid customer type'));
        }
        if ($this->CustomerType->delete()) {
            $this->Session->setFlash(__('Customer type deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Customer type was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
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
            $orderLists = json_decode($this->request->data['CustomerType']['ordered']);
            $queryStr = 'UPDATE ' . $this->CustomerType->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            return $this->CustomerType->query($queryStr);
        }
        return false;
    }

}
