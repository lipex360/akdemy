<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Akdemy - <?= ucfirst($this->uri->segment('1'))?></title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url('assets/css/base.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url('assets/font-aw/css/font-awesome.min.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url('assets/js/jqueryui/jquery-ui.min.css') ?>">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

	<div class="topo-sistema">
		<div class="container">
			<div class="row">
				<div class="col-md-4 padding-top-10">
					<img src="<?= base_url('assets/images/logo.gif')?>" alt="">
				</div>

				<div class="col-md-4 col-md-offset-4 text-right margin-top-20">
					<a href="<?= base_url('home/logout') ?>" class="pink">
						<img src="<?= base_url('assets/images/girl.gif')?>" alt="Aluno Icon">
						<span class="margin-top-10"><?= $_SESSION['usuario']['nome'] ?> | <i class="fa fa-bars" aria-hidden="true"></i></span>
					</a>
				</div>

			</div>
		</div>
	</div>

	<div class="topo-menu shadow-grey">
		
		<div class="container">
			<div class="row padding-top-10">

				<div class="col-md-4">
					<ul class="list-unstyled list-inline menu">
						
						<li>
							<a href="<?= base_url('dashboard'); ?>" title="Voltar ao Início">
								<i class="fa fa-home" aria-hidden="true" ></i>
							</a>
						</li>
						
						<?php 
							if($menu){
						foreach ($menu as $linkmenu) { ?>

						<li>
							<a href="<?= base_url($linkmenu->link); ?>" title="<?= $linkmenu->titulo ?>">
								<i class="<?= $linkmenu->classe ?>" style="font-size:20px !important" aria-hidden="true"></i>
							</a>
						</li>

						<?php }} ?>


					</ul>
				</div>

				<div class="col-md-8 text-right">
					<ul class="list-unstyled list-inline menu">

						<li>
							<a href="javascript:void()" title="Documentos">
								<i class="fa fa-files-o" aria-hidden="true"></i>
							</a>
						</li>

						<li>
							<a href="javascript:void()" title="Trilhas Recomendadas">
								<i class="fa fa-television" aria-hidden="true"></i>
							</a>
						</li>

						<li>
							<a href="javascript:void()" title="Vídeos Favoritos">
								<i class="fa fa-star" aria-hidden="true"></i>
							</a>
						</li>

						<li>
							<a href="javascript:void()" title="Trilhas Concluídas">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
						</li>

						<li class="element">
							<a href="javascript:void()" title="Mensagens">
								<i class="fa fa-envelope-o element" aria-hidden="true"></i>
							</a>
						</li>

					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<div class="row r-alerta">
			<?php
				if(isset($alerta->mensagem) || isset($alerta['mensagem'])){
				if(isset($alerta->mensagem)) {
					$mensagem = $alerta->mensagem;
					$classe = $alerta->classe;
				}else{
					$mensagem = $alerta['mensagem'];
					$classe = $alerta['classe'];
				}
			?>
			<div class="col-md-12 a-<?= $classe ?> alerta shadow-grey">
				<span><?= $mensagem; ?></span>
				<a href="javascript:void(0)" class="pull-right close-alerta"><i class="fa fa-times" aria-hidden="true"></i></a>
			</div>
		<?php } ?>
		</div>
	</div>

