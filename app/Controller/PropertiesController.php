<?php

App::uses('AppController', 'Controller');

/**
 * Properties Controller
 *
 * @property Property $Property
 */
class PropertiesController extends AppController {

    var $helpers = array('TreeView');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($delSession=0) {
        $this->set('title', __('Property'));
        $this->set('description', __('Manage Property'));

        $this->Property->recursive = 0;

        if($delSession){
            $this->Session->delete('GetPropertiesByCategory');
        }

        $cateId = 0;
        if(empty($this->request->data) && $this->Session->check('GetPropertiesByCategory')){
            $this->request->data = $this->Session->read('GetPropertiesByCategory');
            $cateId = $this->request->data['Property']['category_id'];
        }
        if($this->request->is('post') || $this->request->is('put')){
            $this->Session->write('GetPropertiesByCategory', $this->request->data);
            $this->redirect(array('action'=>'index'));
        }
        $categories = $this->Property->getPropertiesByCategory($cateId);
        $this->set('properties', $categories);
        $categories = $this->Property->Category->find('list', array('conditions'=>array('Category.parent_id'=>0), 'order'=>array('Category.lft'=>'asc')));
        $this->set(compact('categories'));
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Property->id = $id;
        if (!$this->Property->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }

        $this->set('title', __('Property'));
        $this->set('description', __('View Property'));

        $this->set('property', $this->Property->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($category_id=0) {
        if ($this->request->is('post')) {
            $this->Property->create();
            if(empty($this->request->data['Property']['name'])){
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'add', $category_id));
            }

            $prepareData = array();
            foreach($this->request->data['Property']['name'] as $name){
                if(!$name) continue;

                $prepareData[] = array( 'name'=>$name,
                                        'category_id'=>$this->request->data['Property']['category_id'],
                                        'parent_id'=>$this->request->data['Property']['parent_id'],
                                );
            }
            if ($this->Property->saveMany($prepareData)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        }

        //$parentProperties = $this->Property->gene;
        //$categories = $this->Property->Category->generateTreeList();
        $categories = $this->Property->Category->find('list', array('conditions'=>array('Category.parent_id'=>0), 'order'=>array('Category.lft'=>'asc')));
        $this->set(compact('categories'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Property->id = $id;
        if (!$this->Property->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Property->save($this->request->data)) {
                $this->Session->setFlash(__('Data has been saved'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data could not be saved. Please, try again.'), 'error');
            }
        } else {
            $this->request->data = $this->Property->read(null, $id);
        }

        $categories = $this->Property->Category->find('list', array('conditions'=>array('Category.parent_id'=>0), 'order'=>array('Category.lft'=>'asc')));
        $parentProperties = $this->Property->generateTreeList();
        $this->set(compact('parentProperties', 'categories'));
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
        $this->Property->id = $id;
        if (!$this->Property->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->Property->delete()) {
            $this->Property->deleteAll(array('Property.parent_id'=>$id));
            $this->Session->setFlash(__('Data deleted'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data was not deleted'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Tree EXTJS
     *
     */
    public function admin_sort() {
        $this->set('title', __('Property'));
        $this->set('description', __('Order Property'));
    }

    public function admin_getnodes() {
        $this->layout = 'ajax';
        // retrieve the node id that Ext JS posts via ajax
        $parent = isset($this->request->data['node']) ? intval($this->request->data['node']) : 0;

        // find all the nodes underneath the parent node defined above
        // the second parameter (true) means we only want direct children
        if ($parent) {
            $nodes = $this->Property->children($parent, true);
        } else {
            $nodes = $this->Property->find('all', array(
                'conditions' => array('Property.parent_id' => $parent),
                'order' => array('Property.lft' => 'ASC')));
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
            $this->Property->moveDown($node, abs($delta));
        } elseif ($delta < 0) {
            $this->Property->moveUp($node, abs($delta));
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

        $this->Property->id = $node;
        $property['Property']['parent_id'] = $parent;
        $this->Property->save($property);

        // If position == 0, then we move it straight to the top
        // otherwise we calculate the distance to move ($delta).
        // We have to check if $delta > 0 before moving due to a bug
        // in the tree behavior (https://trac.cakephp.org/ticket/4037)

        if ($position == 0) {
            $this->Property->moveUp($node, true);
        } else {
            $count = $this->Property->childCount($parent, true);
            $delta = $count - $position - 1;
            if ($delta > 0) {
                $this->Property->moveUp($node, $delta);
            }
        }

        // send success response
        exit('1');
    }

    /**
     *
     * @param type $category_id
     * @param type $json
     * @return type
     */
    public function getListPropertiesByCategory($category_id=null, $json=true){
        $this->autoRender = false;

        $condition =  ($category_id) ? array('Property.parent_id'=>0, 'Property.category_id'=>$category_id) : array('Property.parent_id'=>0);
        //$properties = $this->Property->generateTreeList($condition);
        $properties = $this->Property->find('list', array('conditions'=>$condition, 'order'=>array('Property.lft'=>'asc')));
        if($json){
            return json_encode($properties);
        }
        return $properties;
    }

    /**
     * get all properties and fill in combobox with optgroup
     * @param type $category_id
     * @return boolean
     */
    function get_properties_by_category($category_id=0){
        $this->autoRender = false;
        //Configure::write('debug', '0');

        if(!$category_id || !$this->request->is('ajax')){
            //return false;
        }

        $list_properties = json_encode($this->Property->listPropertiesByCategory($category_id));

        return $list_properties;
    }

}
