<?php

App::uses('AppController', 'Controller');

/**
 * Rightbanners Controller
 *
 * @property Rightbanner $Rightbanner
 */
class RightbannersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('get_rightbanner');
    }
    
    public function get_rightbanner(){
        return $this->Rightbanner->get_rightbanner();
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Rightbanner'));
        $this->set('description', __('Manage Rightbanner'));


        $this->paginate = array('conditions' => array(), 'order' => array('Rightbanner.ordered' => 'ASC'));

        $this->Rightbanner->recursive = 0;
        $this->set('rightbanners', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Rightbanner->id = $id;
        if (!$this->Rightbanner->exists()) {
            throw new NotFoundException(__('Invalid data'));
        }

        $this->set('title', __('Rightbanner'));
        $this->set('description', __('View'));

        $this->set('rightbanner', $this->Rightbanner->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Rightbanner->create();
            if ($this->Rightbanner->save($this->request->data)) {
                $this->Session->setFlash(__('The data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The data could not be saved. Please, try again.'), 'error');
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
        $this->Rightbanner->id = $id;
        if (!$this->Rightbanner->exists()) {
            throw new NotFoundException(__('Invalid data'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Rightbanner->save($this->request->data)) {
                $this->Session->setFlash(__('The data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Rightbanner->read(null, $id);
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
        $this->Rightbanner->id = $id;
        if (!$this->Rightbanner->exists()) {
            throw new NotFoundException(__('Invalid data'));
        }
        if ($this->Rightbanner->delete()) {
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
            $data['Rightbanner'] = array('id' => $id, $field => $status);
            if ($this->Rightbanner->saveAll($data['Rightbanner'], array('validate' => false))) {
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
            $orderLists = json_decode($this->request->data['Rightbanner']['ordered']);
            $queryStr = 'UPDATE ' . $this->Rightbanner->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            return $this->Rightbanner->query($queryStr);
        }
        return false;
    }

}
