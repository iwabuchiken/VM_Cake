<?php

class PositionsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('positions', $this->Position->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid position'));
		}
	
		$position = $this->Position->findById($id);
		if (!$position) {
			throw new NotFoundException(__('Invalid position'));
		}
		$this->set('position', $position);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Position->create();
			if ($this->Position->save($this->request->data)) {
				$this->Session->setFlash(__('Your position has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your position.'));
		} else {
			
// 			$data = [1,2,3,4,5];
			$data = array(1 => 1, 2 => 2, 3 => 3, 4 => 4);
			
			$this->set('data', $data);
			
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid position id'));
		}
	
		$position = $this->Position->findById($id);
	
		if (!$position) {
			throw new NotFoundException(__("Can't find the position. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Position->delete($id)) {
			// 		if ($this->Position->save($this->request->data)) {
	
			$this->Session->setFlash(__(
								"Position deleted => %s", 
								$position['Position']['point']));
	
			return $this->redirect(
					array(
							'controller' => 'positions',
							'action' => 'index'
				
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Position can't be deleted => %s", 
							$position['Position']['point']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'positions',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)
	
	
}