<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_trilha extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}
		$this->load->model('Usuario_model', 'usuario');
		$this->load->model('Videos_model', 'videos');
		$this->load->model('Trilha_model', 'trilhas');
	}
	
	public function trilha()
	{
		$usuario_id = $_SESSION['usuario']['id'];

		// TRILHAS ATIVAS
		$view['trilhas'] = $this->trilhas->getTrilhasAtivas($usuario_id);

		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'adm-trilha-adicionar';
		$view['modulos'][] = 'tb-trilhas-admin';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-trilhas', $view);
	}



	public function trilha_cadastrar(){

		$usuario_id = $_SESSION['usuario']['id'];

		$action = $this->input->post('action');

		if($action === "cad_trilha"){
			$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required');
			$this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'trim|required');

			if($this->form_validation->run()){
				$data['titulo'] = $action = $this->input->post('titulo', true);
				$data['descricao'] = $action = $this->input->post('descricao', true);
				$data['tutor_id'] = $usuario_id;

				$insert = $this->db->insert('trilhas', $data);
				$alerta['mensagem'] = "Trilha {$data['titulo']} cadastrada com sucesso! <b><a href='' >Clique Aqui</a></b> para configurá-la";
				$alerta['classe'] = 'success';
			}
		}
		
		if(isset($alerta)){$view['alerta'] = $alerta;}
		$view['trilhas'] = $this->trilhas->getTrilhasAtivas($usuario_id);
		$view['menu'] = $this->getMenu();

		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'adm-trilha-adicionar';
		$view['modulos'][] = 'tb-trilhas-admin';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-trilhas', $view);
	}

	public function trilha_editar($trilha_id){
		$view['menu'] = $this->getMenu();

		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'adm-trilha-editar';
		$this->load->view('adm-trilhas', $view);
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}

}
