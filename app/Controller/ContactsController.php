<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('index');
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Contact'));
        $this->set('description', __('Manage Contact'));


        $this->paginate = array('conditions' => array(), 'order' => array('Contact.ordered' => 'ASC'));

        $this->Contact->recursive = 0;
        $this->set('contacts', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }

        $this->set('title', __('Contact'));
        $this->set('description', __('View Contact'));

        $this->set('contact', $this->Contact->read(null, $id));
    }

    /**
     * contact us method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'error');
            }
        }
    }
}
