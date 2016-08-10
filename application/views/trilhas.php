<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header');
?>

<!-- Centro -->
<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-30">

	<!-- Vídeos da Trilha  -->
	<div class="row">
		<div class="col-md-8">
			<i class="fa fa-television tableTitle" aria-hidden="true"></i> <span><b><?= $trilha->titulo; ?></b></span>
		</div>
		<div class="col-md-4">
			<a href="javascript:history.back()" class="pull-right pink"><i class="fa fa-chevron-left margin-right-5" aria-hidden="true"></i></i>Voltar</a>
		</div>
	</div>

	<div class="row margin-top-10">
		<div class="col-md-12">
			<?= nl2br($trilha->descricao); ?>
		</div>
	</div>
</div>

<?php 
	$this->load->view('modulos/tb-videos-trilha');
	$this->load->view('modulos/comentarios');
	$this->load->view('rodape'); 
?>