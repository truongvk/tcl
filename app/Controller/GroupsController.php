<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
        $this->set('title', __('Group'));
        $this->set('description', __('Manage Group'));


		$this->paginate = array('conditions'=>array(), 'order'=>array('Group.ordered'=>'ASC'));
		
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		
        $this->set('title', __('Group'));
        $this->set('description', __('View Group'));		
		
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'error');
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}

    /**
     *  Active/Inactive
     *
     * @param int $id
     * @param int $status
     */
    public function admin_toggle($id, $status, $field='published') {
        $this->autoRender = false;

        if ($id) {
			$status = ($status) ? 0 : 1;
            $data['Group'] = array('id'=>$id, $field=>$status);
            if($this->Group->saveAll($data['Group'], array('validate'=>false))){
				$url = '/admin/'.  Inflector::tableize($this->name) .'/toggle/'.$id.'/'.$status.'/'.$field;
                $src = '/img/icons/allow-'.$status.'.png';
				
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
        if(!empty($this->request->data)){
            $orderLists = json_decode($this->request->data['Group']['ordered']);
            $queryStr = 'UPDATE '.$this->Group->table.' SET ordered = CASE id ';
            foreach($orderLists as $order => $id):
                if(!$id) continue;
                $queryStr .= 'WHEN '.$id.' THEN '.$order.' ';
            endforeach;
            $queryStr .= 'END WHERE id IN ('.  implode(", ", $orderLists).');';

            return $this->Group->query($queryStr);
        }
        return false;
    }	
}
