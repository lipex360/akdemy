<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<!-- Centro -->
<div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">

	<!-- Player de Vídeo -->
	<div class="row">
		<div class="col-md-12">
			<img src="<?= base_url('assets/images/play.gif')?>" alt="Trilhas"> <span><b>Título do Vídeo</b></span>
			<a href="javascript:history.back()" class="pull-right pink"><i class="fa fa-chevron-left margin-right-5" aria-hidden="true"></i></i>Voltar</a>
		</div>
	</div>
	<div class="row margin-top-10">
		<div class="col-md-12">
			<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sit dolor debitis.</span>
		</div>
	</div>

	<div class="row margin-top-20">
		<div class="col-md-12 ">
			<iframe width="100%" height="500" src="https://www.youtube.com/embed/<?= $video->link;?>?autoplay=1" class="bg-pink" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>

	<div class="row margin-top-10">

		<div class="col-md-12">
		<a href="" class="bg-finepink pink padding-5 pull-left margin-right-10"><i class="fa fa-check-square-o margin-right-5 margin-left-5" aria-hidden="true"></i> Concluir Atividade</a>
		<a href="" class="bg-finepink pink padding-5 pull-left margin-right-10"><i class="fa fa-check-circle margin-right-5 margin-left-5" aria-hidden="true"></i> Atividade Concluída</a>
		<a href="" class="bg-finepink pink padding-5 pull-left"><i class="fa fa-star-o margin-right-5 margin-left-5" aria-hidden="true"></i> Incluir nos Favoritos</a>
		<a href="" class="bg-finepink pink padding-5 pull-left"><i class="fa fa-star margin-right-5 margin-left-5" aria-hidden="true"></i> Remover dos Favoritos</a>
		<a href="" class="bg-finepink pink padding-5 pull-right"><i class="fa fa-question-circle margin-right-5 margin-left-5" aria-hidden="true"></i> Precisa de Ajuda?</a>
		</div>

	</div>
	<!-- ### Player de Vídeo ### -->

</div>
<!-- ### Centro ### -->

<!-- Comentários -->
<?php 
	$this->load->view('modulos/comentarios');
	$this->load->view('rodape'); 
?>