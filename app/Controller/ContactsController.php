<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController {

    public $components = array('Email');
    
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


        $this->paginate = array('conditions' => array(), 'order' => array('Contact.created' => 'DESC'));

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
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->set('title', __('Contact'));

        $this->set('contact', $this->Contact->read(null, $id));
    }

    /**
     * contact us method
     *
     * @return void
     */
    public function index() {
        if(!$this->request->is('ajax')){
            throw new NotFoundException(__('Invalid Contact'));
        }
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->Contact->create();
            $this->request->data['Contact']['created'] = date('Y-m-d H:i:s');
            if ($this->Contact->save($this->request->data)) {
                $sentTo = $this->requestAction('/global_config/setting2array/admin_email/1');
                $email = $this->Email;
                $email->from = $this->request->data['Contact']['email'];
                $email->to = $sentTo;
                $email->subject = '[TCLVN]'.__('Feedback');
                $email->sendAs = 'html';
                $email->send($this->request->data['Contact']['content']);
                
                return true;
            }else{
                $invalidFields = $this->Contact->invalidFieldsList();
                return $invalidFields;
            }

            return false;
        }
    }
}
