<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$trilhas = $this->trilhas->adm_trilha($usuario_id);
		$this->load->view('admin_trilha', $trilhas);
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
		

		$trilhas = $this->trilhas->adm_trilha($usuario_id);
		if(isset($alerta)){$trilhas['alerta'] = $alerta;}
		
		$this->load->view('admin_trilha', $trilhas);
	}

}
