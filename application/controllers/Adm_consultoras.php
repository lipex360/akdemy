<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_consultoras extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_id'] != 1){
			redirect('home');
		}

		$this->load->model('Usuario_model', 'usuario');
		$this->load->model('Videos_model', 'videos');
		$this->load->model('Trilhas_model', 'trilhas');
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}

	public function consultoras(){
		$usuario_id = $_SESSION['usuario']['id'];

		
		if($this->input->post('action')=="nova_consultora"){
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
			$this->form_validation->set_rules('telefone', 'EMAIL', 'trim|required');

			if($this->form_validation->run()){
				$data['tutor_id'] = $usuario_id;
				$data['nivel_id'] = 2;
				$data['nome'] =  $this->input->post('nome');
				$data['email'] =  $this->input->post('email');
				$data['telefone'] = $this->input->post('telefone');
				$data['hash'] = substr(md5(date('Ymd hisu').$usuario_id.date('u')), 0, 5);
				$data['acesso'] = NULL;
				$data['status'] = 0;

				$consultora = $this->usuario->base_consultores($usuario_id, $data['email']);
				$consultora = $consultora->result();

				if(!$consultora){
					$nova_consultora = $this->usuario->nova_consultora($data);
					if($nova_consultora){
						$alerta['mensagem'] = "Consultora {$data['nome']} incluída com sucesso! Um e-mail foi enviada para ela com instruções de ativação.";
						$alerta['classe'] = 'success';
						$this->email();
						
					} else {
						$alerta['mensagem'] = "Erro ao incluir a consultora. Entre em contato com o desenvolvedor";
						$alerta['classe'] = 'danger';
					}
				} else {
					$alerta['mensagem'] = "Você já possui uma consultora cadastrada com os dados informados";
					$alerta['classe'] = 'warning';
				}
				
			}
		}

		if(isset($alerta)){$view['alerta'] = $alerta;}

		// CONSULTORAS ATIVAS
		$consultoras = $this->usuario->base_consultores($usuario_id, NULL, 1);
		$consultoras = $consultoras->result();
		$view['ativas'] = $consultoras;

		// CONSULTORAS CONVIDADAS
		$consultoras = $this->usuario->base_consultores($usuario_id, NULL, 0);
		$consultoras = $consultoras->result();
		$view['convidadas'] = $consultoras;

		$view['modulos'][] = "tb-consultoras-ativas";
		$view['modulos'][] = "tb-consultoras-convidadas";

		$view['menu'] = $this->getMenu();
		$this->load->view('adm-consultoras', $view);
	}


	public function email(){
		$this->load->library('email');

		$this->email->from('lipex360@gmail.com', 'Felipe');
		$this->email->to('lipex360@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();
	}
}