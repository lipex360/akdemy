<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trilhas extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}

		
	}
	
	public function index()
	{
		echo "Todoas as Trilhas";
	}

	public function percurso($trilha_id)
	{
		extract($_SESSION['usuario']);

		// DADOS DA TRILHA
		$trilhas = $this->trilhas->trilhas($trilha_id);
		$rTrilhas = $trilhas->result();
		$view['trilha'] = $rTrilhas[0];

		// VIDEOS DA TRILHA
		$videos = $this->tb_videos($id, $trilha_id);
		$view['videos'] = $videos;

		// MODULOS DA PÁGINA
		$view['modulos'][] = 'f-adicionar-trilha';
		$view['modulos'][] = 'tb-trilhas-admin';

		// MENU ESQUERDO
		$view['menu'] = $this->getMenu();	

		$this->load->view('trilhas', $view);
	}


	public function tb_videos($usuario_id, $trilha_id){
		$videos = $this->videos->videos_trilha($trilha_id);
		$rVideos = $videos->result();

		$tb_videos = array();
		foreach ($rVideos as $videos) {
			$favorito = $this->videos->getFavoritos($usuario_id, $videos->id);
			
			$views = $this->videos->getViews($usuario_id, $videos->id);
			$rViews = $views->result();

			if(isset($rViews[0]->views)){
				$views = (int) $rViews[0]->views;
			}else{
				$views = 0;
			}

			$status = $this->videos->getStatus($usuario_id, $videos->id);
			$rStatus = $status->result();

			if(isset($rStatus[0]->status)){
				$status = (int) $rStatus[0]->status;
			}else{
				$status = 0;
			}
			
			$tb_videos[] = array(
				'id' => $videos->id,
				'titulo' => $videos->titulo,
				'descricao' => $videos->descricao,
				'views' => $views,
				'favorito' => $favorito->num_rows(),
				'status' => $status
				);

		}

		return $tb_videos;
	}

	public function video_favorito(){
		$id = $_POST['videoId'];
		echo $this->videos->setFavorito($id);
	}


	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}

		
}
