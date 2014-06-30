<?php

class GenresController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('genres', $this->Genre->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid genre'));
		}
	
		$genre = $this->Genre->findById($id);
		if (!$genre) {
			throw new NotFoundException(__('Invalid genre'));
		}
		$this->set('genre', $genre);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Genre->create();
			if ($this->Genre->save($this->request->data)) {
				$this->Session->setFlash(__('Your genres has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your genres.'));
		}
	}
	
}