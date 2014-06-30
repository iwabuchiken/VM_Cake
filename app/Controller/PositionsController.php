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
		}
	}
	
}