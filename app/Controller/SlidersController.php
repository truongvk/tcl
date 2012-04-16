<?php

App::uses('AppController', 'Controller');

/**
 * Sliders Controller
 *
 * @property Slider $Slider
 */
class SlidersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('get_sliders');
    }
    
    public function get_sliders(){
        return $this->Slider->get_sliders();
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Slider'));
        $this->set('description', __('Manage Slider'));


        $this->paginate = array('conditions' => array(), 'order' => array('Slider.ordered' => 'ASC'));

        $this->Slider->recursive = 0;
        $this->set('sliders', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Slider->id = $id;
        if (!$this->Slider->exists()) {
            throw new NotFoundException(__('Invalid slider'));
        }

        $this->set('title', __('Slider'));
        $this->set('description', __('View Slider'));

        $this->set('slider', $this->Slider->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Slider->create();
            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash(__('The slider has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The slider could not be saved. Please, try again.'), 'error');
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
        $this->Slider->id = $id;
        if (!$this->Slider->exists()) {
            throw new NotFoundException(__('Invalid slider'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash(__('The slider has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The slider could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Slider->read(null, $id);
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
        $this->Slider->id = $id;
        if (!$this->Slider->exists()) {
            throw new NotFoundException(__('Invalid slider'));
        }
        if ($this->Slider->delete()) {
            $this->Session->setFlash(__('Slider deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Slider was not deleted'), 'error');
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
            $data['Slider'] = array('id' => $id, $field => $status);
            if ($this->Slider->saveAll($data['Slider'], array('validate' => false))) {
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
            $orderLists = json_decode($this->request->data['Slider']['ordered']);
            $queryStr = 'UPDATE ' . $this->Slider->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            return $this->Slider->query($queryStr);
        }
        return false;
    }

}
