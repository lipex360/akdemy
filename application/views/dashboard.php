<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->view('header');
	
	
	$diretorio = $_SESSION['usuario']['pathNivel'].'/';
	$path = 'modulos/'.$diretorio;
	
	foreach ($modulos as $modulo) {
		$modulo = $path.$modulo;
		$this->load->view($modulo);;
	}

	$this->load->view('rodape');
	
?>
