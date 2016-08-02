<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}
    }

	public function index(){
		$view = array();
		// var_dump($_SESSION['usuario']);
		extract($_SESSION['usuario']);

		// MENU DE ACESSO
		$menu = $this->usuario->menu($nivel_id);
		if($menu){
			$view['menu'] = $menu;
		}

		//TRILHAS INDICADAS
		$view['trilhas_indicadas'] = $this->getIndicadas($id, $tutor_id);
		$view['tb_trilhas'] = $this->tb_trilhas_indicadas($id, $tutor_id);

		$this->load->view('dashboard', $view);
	}


	public function getIndicadas($id, $tutor_id){
		$trilhas_indicadas  = $this->trilhas->usuarios_trilhas($id, $tutor_id);
		$rTrilhas_indicadas = $trilhas_indicadas->result();
		$nTrilhas_indicadas = $trilhas_indicadas->num_rows();

		return $nTrilhas_indicadas;
	}

	public function tb_trilhas_indicadas($id, $tutor_id){
		$trilhas_indicadas  = $this->trilhas->usuarios_trilhas($id, $tutor_id);
		$rTrilhas_indicadas = $trilhas_indicadas->result();

		$tb_trilhas = array();
		foreach ($rTrilhas_indicadas as $trilha) {
			$trilhas = $this->trilhas->trilhas($trilha->trilha_id);
			$rTrilhas = $trilhas->result();

			foreach($rTrilhas as $trilhas){
				$videos = $this->videos->videos_trilha($trilhas->id);
				$nVideos = $videos->num_rows();
				$tb_trilhas[] = array(
					'id' => $rTrilhas[0]->id,
					'titulo' => $rTrilhas[0]->titulo,
					'descricao' => $rTrilhas[0]->descricao,
					'videos' => $nVideos
					);
			}			
		}

		return $tb_trilhas;
	}
	
 

}
