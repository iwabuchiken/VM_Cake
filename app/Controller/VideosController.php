<?php

class VideosController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('videos', $this->Video->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		$video = $this->Video->findById($id);
		if (!$video) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $video);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('Your video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your video.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid video id'));
		}
	
		$video = $this->Video->findById($id);
	
		if (!$video) {
			throw new NotFoundException(__("Can't find the video. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Video->delete($id)) {
			// 		if ($this->Video->save($this->request->data)) {
				
			$this->Session->setFlash(__("Video deleted => %s", $video['Video']['title']));
				
			return $this->redirect(
					array(
							'controller' => 'videos',
							'action' => 'index'
							
					));
				
		} else {
				
			$this->Session->setFlash(
					__("Video can't be deleted => %s", $video['Video']['title']));
				
			// 			$page_num = _get_Page_from_Id($id - 1);
				
			return $this->redirect(
					array(
							'controller' => 'videos',
							'action' => 'view',
							$id
					));
				
		}
	
	}//public function delete($id)
	
	public function retrieve_CurrentTime() {
		
		$this->layout = 'plain';
		
		$cur_Time = 500;
		
		$this->set('cur_Time', $cur_Time);
		
		//REF http://book.cakephp.org/2.0/en/controllers.html "This allows direct rendering of elements"
		$this->render('/Elements/videos/js/retrieve_CurrentTime');
		
// 		return $this->redirect(array('action' => 'index'));
		
	}
}