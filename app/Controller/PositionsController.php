<?php

class PositionsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		
		/******************************
		
			position: set options
		
		******************************/
		$option = $this->_index_Options();
		
// 		debug($option);
		
		$this->set('positions', $this->Position->find('all',
				$option
				
		));
		
	}//public function index()
	
	public function _index_Options() {
		
// 		debug($this->request->query['sort']);
		
		if (@$this->request->query['sort']) {
			// 		if (@$this->request->query['order']) {
		
			$sort = $this->request->query['sort'];
				
			// 			debug("yes");
			$option = array(
					'order' => array(
							"Position.$sort" => 'asc')
			);
				
		} else {
		
			$option = array(
					'order' => array(
							"Position.id" => 'asc')
			);
		
		}
		
		return $option;
		
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
		
// 		debug($position);
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Position->create();
			
// 			$this->Position['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Position']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Position']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Position->save($this->request->data)) {
				
				$this->Session->setFlash(__('Your position has been saved.'));
				return $this->redirect(array('action' => 'index'));
				
			} else {
				
				$this->Session->setFlash(__('Unable to add your position.'));
				
			}
			
		} else {
			
// 			$data = [1,2,3,4,5];
// 			$data = array(1 => 1, 2 => 2, 3 => 3, 4 => 4);
			$this->loadModel('Video');
				
			$videos = $this->Video->find('all');
				
			// 			debug($langs);
				
			$select_Videos = array();
				
			foreach ($videos as $video) {
			
				$video_Name = $video['Video']['title'];
				$video_Id = $video['Video']['id'];
			
				$select_Videos[$video_Id] = $video_Name;
					
			}
				
			// 			debug($select_Langs);
				
			//REF http://www.php.net/manual/en/function.asort.php
			asort($select_Videos);
				
			$this->set('video_names', $select_Videos);
			
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
	
	public function edit_memo() {

		$this->layout = 'plain';
		
		$position_id = $this->request->query['id'];
		$position_memo = $this->request->query['memo'];
		
		$position = $this->Position->findById($id);
		
		$position['Position']['memo'] = $position_memo;
		
		/******************************
		
			Edit memo
		
		******************************/
		$this->Position->save($position);
		
// 		if ($res == true) {
		
			$this->sort_PosList();
			// 			$this->render('/Elements/videos/js/delete_position_failed');
				
// 		} else {
		
// 			// 			delete_position_failed.ctp
// 			$this->render('/Elements/videos/js/delete_position_failed');
		
// 		}
// 		;
		
		
// 		$position = $this->Position->findById($id);
	}	
}