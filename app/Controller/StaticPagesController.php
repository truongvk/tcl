<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * StaticPages Controller
 *
 * @property StaticPage $StaticPage
 */
class StaticPagesController extends AppController {

    var $actsAs = array(
        'Slug' => array('field' => 'title', 'slug_field' => 'slug', 'primary_key' => 'id', 'replacement' => '-'),
    );

    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('get_pages', 'display');
    }
    
    /**
     * get static page to show on menu 
     * @return type 
     */
    public function get_pages(){
        return $this->StaticPage->find('all', array('fields'=>array('StaticPage.id', 'StaticPage.title', 'StaticPage.slug'), 'conditions'=>array('StaticPage.published'=>1)));
    }
    
    public function display($slug=null){
        $this->layout = 'info';
        $content = $this->StaticPage->findBySlug(Sanitize::escape($slug));        
        if (empty($content)) {
            throw new NotFoundException(__('Invalid Page'));
        }
        $this->set(compact('content'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Page'));
        $this->set('description', __('Manage Page'));

        $this->paginate = array('conditions' => array(), 'order' => array('StaticPage.ordered' => 'ASC'));

        $this->StaticPage->recursive = 0;
        $this->set('staticPages', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->StaticPage->id = $id;
        if (!$this->StaticPage->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->set('title', __('Page'));
        $this->set('description', __('View Page'));

        $this->set('staticPage', $this->StaticPage->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->set('title', __('Page'));
        $this->set('description', __('Add Page'));
        if ($this->request->is('post')) {
            $this->StaticPage->create();
            if ($this->StaticPage->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
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
        $this->set('id', $id);
        $this->set('title', __('Page'));
        $this->set('description', __('Edit Page'));
        $this->StaticPage->id = $id;
        if (!$this->StaticPage->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->StaticPage->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->StaticPage->read(null, $id);
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
        $this->StaticPage->id = $id;
        if (!$this->StaticPage->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->StaticPage->delete()) {
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
            $data['StaticPage'] = array('id' => $id, $field => $status);
            if ($this->StaticPage->saveAll($data['StaticPage'], array('validate' => false))) {
                $link = ($this->base) ? FULL_BASE_URL .$this->base : ''; 
                $url = $link.'/admin/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = $link. '/img/icons/allow-' . $status . '.png';

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
            $orderLists = json_decode($this->request->data['StaticPage']['ordered']);
            $queryStr = 'UPDATE ' . $this->StaticPage->table . ' SET ordered = CASE id ';
            foreach ($orderLists as $order => $id):
                if (!$id)
                    continue;
                $queryStr .= 'WHEN ' . $id . ' THEN ' . $order . ' ';
            endforeach;
            $queryStr .= 'END WHERE id IN (' . implode(", ", $orderLists) . ');';

            $this->StaticPage->query($queryStr);
            return true;
        }
        return false;
    }
    /**
     * admin_delete_file method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete_file() {
        $this->autoRender = false;
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if (!empty($this->request->data)) {
            $this->StaticPage->id = $this->request->data['StaticPage']['id'];
            if (!$this->StaticPage->exists()) {
                throw new NotFoundException(__('Invalid page'));
            }

            $photo = $this->request->data['StaticPage']['photo'];
            $this->request->data['StaticPage']['photo'] = null;
            $this->request->data['StaticPage']['photo_dir'] = null;
            if ($this->StaticPage->save($this->request->data, false)) {
                @unlink(WWW_ROOT.'files'.DS.'pages'.DS.$this->StaticPage->id.DS.$photo);
                return true;
            }
        }
        return false;
    }
}
