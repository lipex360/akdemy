<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header');
?>

<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">
	<?php 
		$this->load->view('modulos/consultor/atividades');
		$this->load->view('modulos/consultor/tb-trilhas-indicadas') ;
	?>

</div>
