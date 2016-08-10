<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}	
	}

	public function view($video_id){
	
		extract($_SESSION['usuario']);
		$this->setViews($id, $video_id);

		// MENU ESQUERDO
		$view['menu'] = $this->getMenu();	
		$this->load->view('video', $view);
	}

	// Seta Visualizações
	public function setViews($id, $video_id){
		if(is_null(get_cookie('view_cookie'))){
			set_cookie('view_cookie', 'repeat', 20);
			
			$views = $this->videos->getViews($id, $video_id);
			if($views->num_rows()){
				$rViews = $views->result();
				$nViews = $rViews[0]->views;
				$this->videos->setViews($id, $video_id, $nViews);
			}else{
				$this->videos->setViews($id, $video_id);
			}
		}
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}


}

?>