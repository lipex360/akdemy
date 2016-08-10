<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	// function index
	public function index(){
		$this->load->view('home');
	}
	// ### function index ###


	// function login
	public function login(){

		// Acionado por Post
		if($this->input->post('action') == 'login'){
		
			// Regras do Formulário
			$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
			$this->form_validation->set_rules('senha', 'EMAIL', 'trim|md5|required');

			// Validou Formulário
			if($this->form_validation->run()){
				$email =  $this->input->post('email');
				$senha = $this->input->post('senha');

				$this->load->model('Usuario_model', 'usuario');
				$query = $this->usuario->check_usuario($email, $senha);

				// Encontrou resultado no Select
				if($query->row()){
					
					// Registra retorno do Banco
					foreach ($query->result() as $retorno){}
					
					// Usuário ativo
					if($retorno->status == 1){
						// Constroi sessão do usuário
						foreach ($retorno as $key => $value) {
							$_SESSION['usuario'][$key] = $value;
						}

						// Último Acesso
						if(is_null($retorno->acesso)){
							$_SESSION['usuario']['acesso'] = date('Y-m-d H:i:s');
							$this->usuario->setAcesso($_SESSION['usuario']['id']);
						}else{
							$acesso = $this->usuario->getAcesso($_SESSION['usuario']['id']);
							$_SESSION['usuario']['acesso'] = $acesso;
							$this->usuario->setAcesso($_SESSION['usuario']['id']);
						}

						// Diretório Nível
						$_SESSION['usuario']['pathNivel'] = $this->usuario->getNivelDiretorio($_SESSION['usuario']['nivel_id']);

						unset($_SESSION['usuario']['datacad']);
						unset($_SESSION['usuario']['senha']);

						redirect('dashboard');
					}

					// Usuário Inativo
					else{
						unset($_SESSION);
						$alerta = $this->usuario->alerta('usuario-inativo');
					}
				} 

				// Não encontrou usuários
				else{
					unset($_SESSION);
					$alerta = $this->usuario->alerta('usuario-nao-encontrado');
				}
			}

			// Não Validou Formulário
			else{
				unset($_SESSION);
				$alerta = $this->usuario->alerta('formulario-nao-validado');
			}

			// Carrega View com Alerta
			unset($_SESSION);
			$this->load->view('home', $alerta[0]);
		}


		// Não acionado por Post
		else{
			session_destroy();
			unset($_SESSION);
			redirect('home');

		}
		
		
	}
	// ### function login ###


	// function logout
	public function logout(){
		session_destroy();
		unset($_SESSION);
		redirect('home');
	}
	// ### function logout ###

}
