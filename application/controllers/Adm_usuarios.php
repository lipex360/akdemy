<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_usuarios extends CI_Controller {
	function __construct() {
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

	public function consultoras(){
		$usuario_id = $_SESSION['usuario']['id'];
		$view['modulos'][] = "";

		$view['menu'] = $this->getMenu();
		$this->load->view('adm-usuarios', $view);
	}
}