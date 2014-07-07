<?php

class VideosController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('videos', $this->Video->find('all'));
		
// 		debug(Utils::get_dPath_Log());
		
		Utils::write_Log(
					Utils::get_dPath_Log(), 
					"Videos#index", 
					__FILE__, __LINE__);
		
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
		} else {
			
			$this->loadModel('Genre');
			
			$genres = $this->Genre->find('all');
			
			$select_Genres = array();
			
			foreach ($genres as $genre) {
					
				$genre_Name = $genre['Genre']['name'];
				$genre_Id = $genre['Genre']['id'];
					
				$select_Genres[$genre_Id] = $genre_Name;
					
			}
				
			asort($select_Genres);
			
			$this->set('genre_names', $select_Genres);
				
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
	
	public function save_CurrentTime() {
		
		$this->layout = 'plain';
		
// 		$result = $this->request->data['curTime'];
// 		$result = $this->request->data;
// 		$result = $this->request;
// 		$result = $this->request->query;
		$result = $this->request->query['curTime'];
		$video_id = $this->request->query['video_id'];
		
		/******************************
		
			save position
		
		******************************/
		$res = $this->save_Position($result, $video_id);
		
		if ($res == true) {
		
// 			$result = "Saved: ".$result;
			$arr = array ('saved'=> true,'point'=> $result, 'video_id' => $video_id);
			
		} else {
		
// 			$result = "Not saved: ".$result;
			$arr = array ('saved'=> false,'point'=> $result, 'video_id' => $video_id);
		
		}

		/******************************
		
			report
		
		******************************/
		$result = $result."/".$video_id;
		
// 		debug($result);
		
		// set to return response=error
// 		$arr = array ('response'=>'error','comment'=>'test comment here');
		
		$this->set('arr', $arr);
// 		$this->set('result', $result);
		
		$this->render('/Elements/videos/js/retrieve_CurrentTime');
		
		
	}

	public function 
	save_Position($result, $video_id) {
		
		$this->loadModel('Position');
		
		$this->Position->create();
		
		$this->Position->set('video_id', $video_id);
		$this->Position->set('point', $result);
		
		$this->Position->set('created_at', Utils::get_CurrentTime());
		$this->Position->set('updated_at', Utils::get_CurrentTime());
		
		if ($this->Position->save()) {
			
			return true;
			
		} else {
			
			return false;
		}
		
	}
	
}