<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controler {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}
	}
	
	public function index()
	{
		$view = array();
		// var_dump($_SESSION['usuario']);
		extract($_SESSION['usuario']);

		// MENU DE ACESSO
		$menu = $this->usuario->menu($nivel_id);
		if($menu){
			$view['menu'] = $menu;
		}

		
		$this->load->view('baseview');
	}

}
