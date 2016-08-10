<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_videos extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}
		$this->load->model('Usuario_model', 'usuario');
		$this->load->model('Videos_model', 'videos');
		$this->load->model('Trilha_model', 'trilhas');
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}
	
	public function videos()
	{
		$usuario_id = $_SESSION['usuario']['id'];
		
		// TRILHAS DISPONÍVEIS
		$trilhas = $this->trilhas->tutor_trilhas($usuario_id);
		$qTrilhas = $trilhas->result();
		$view['trilhas'] = $qTrilhas;
		
		// CADASTRAR NOVO VÍDEO
		$action = $this->input->post('action');
		if($action === "cad_video"){
			$form = $this->input->post();
			unset($form['action']);
			$form['tutor_id'] = $usuario_id;
			$data = $form['data'];
			if(!empty($data)){
				$data = explode('/', $data);
				$form['data'] = $data[2].'-'.$data[1].'-'.$data[0];
			}
			
			$setVideo = $this->videos->inserir($form);
			if($setVideo){
				$alerta['mensagem'] = "Vídeo <b>{$form['titulo']}</b> cadastrada com sucesso! <b><a href='editar/$setVideo'>Clique Aqui</a></b> para configurá-lo";
				$alerta['classe'] = 'success';
			}else{
				$alerta['mensagem'] = "Erro ao cadastrar o Vídeo";
				$alerta['classe'] = 'danger';
			}
		}

		// MÓDULOS DA PÁGINA
		if(isset($alerta)){$view['alerta'] = $alerta;}
		$view['modulos'][] = 'adm-video-adicionar';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-videos', $view);
	}

}
