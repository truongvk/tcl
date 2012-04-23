<?php
App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {
    var $helpers = array('Html', 'Form', 'TreeView');

    public function beforeFilter(){
        parent::beforeFilter();
        
        $this->Auth->allow('get_menu_categories');
    }

    public function get_menu_categories(){
        $this->autoRender  = false;
        
        $categories = Cache::read('get_menu_categories');
        if(empty($categories)){
            $categories = $this->Category->find('threaded', array('order'=>array('Category.lft'=>'ASC'),'conditions'=>array('Category.published'=>1)));
            Cache::write('get_menu_categories', $categories);
        }
        
        return $categories;
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('title', __('Category'));
        $this->set('description', __('Manage Category'));
        $this->__addUrl();

        $this->Category->recursive = 0;
        $categories = $this->Category->getAllCategory();
        $this->set('categories', $categories);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        }
        $parentCategories = $this->Category->generateTreeList();
        $this->set(compact('parentCategories'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                //$this->redirect($this->__getPreviousUrl());
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Category->read(null, $id);
        }
        $parentCategories = $this->Category->generateTreeList();
        $this->set(compact('parentCategories'));
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
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('Data deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data was not deleted'), 'error');
        $this->redirect($this->__getPreviousUrl());
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
            $data['Category'] = array('id' => $id, $field => $status);
            if ($this->Category->saveAll($data['Category'], array('validate' => false))) {
                $link = ($this->base) ? FULL_BASE_URL .$this->base : '';
                $url = $link.'/admin/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = $link. '/img/icons/allow-' . $status . '.png';

                return "<img id=\"status-{$id}\" onclick=\"published.toggle('status-{$id}', '{$url}');\" src=\"{$src}\">";
            }
        }

        return false;
    }

    /**
     * Tree EXTJS
     *
     */
    public function admin_sort() {
        $this->set('title', __('Category'));
        $this->set('description', __('Order Category'));
    }

    public function admin_getnodes() {
        $this->layout = 'ajax';
        // retrieve the node id that Ext JS posts via ajax
        $parent = isset($this->request->data['node']) ? intval($this->request->data['node']) : 0;

        // find all the nodes underneath the parent node defined above
        // the second parameter (true) means we only want direct children
        if ($parent) {
            $nodes = $this->Category->children($parent, true);
        } else {
            $nodes = $this->Category->find('all', array(
                'conditions' => array('Category.parent_id' => $parent),
                'order' => array('Category.lft' => 'ASC')));
        }

        // send the nodes to our view
        $this->set(compact('nodes'));
    }

    function admin_reorder() {
        $this->autoRender = false;
        // retrieve the node instructions from javascript
        // delta is the difference in position (1 = next node, -1 = previous node)

        $node = intval($this->request->data['node']);
        $delta = intval($this->request->data['delta']);

        if ($delta > 0) {
            $this->Category->moveDown($node, abs($delta));
        } elseif ($delta < 0) {
            $this->Category->moveUp($node, abs($delta));
        }

        // send success response
        Cache::clear();
        clearCache();
        exit('1');
    }

    function admin_reparent() {
        $this->autoRender = false;

        $node = intval($this->request->data['node']);
        $parent = intval($this->request->data['parent']);
        $position = intval($this->request->data['position']);

        // save the employee node with the new parent id
        // this will move the employee node to the bottom of the parent list

        $this->Category->id = $node;
        $property['Category']['parent_id'] = $parent;
        $this->Category->save($property);

        // If position == 0, then we move it straight to the top
        // otherwise we calculate the distance to move ($delta).
        // We have to check if $delta > 0 before moving due to a bug
        // in the tree behavior (https://trac.cakephp.org/ticket/4037)

        if ($position == 0) {
            $this->Category->moveUp($node, true);
        } else {
            $count = $this->Category->childCount($parent, true);
            $delta = $count - $position - 1;
            if ($delta > 0) {
                $this->Category->moveUp($node, $delta);
            }
        }

        // send success response
        Cache::clear();
        clearCache();
        exit('1');
    }
}
