<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Akdemy - Ativação de Usuário</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/base.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/font-aw/css/font-awesome.min.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
  
  <div class="topo-sistema">
    <div class="container">
      <div class="row">
        <div class="col-md-12 padding-top-10">
          <img src="<?= base_url('assets/images/logo.gif')?>" alt="">
        </div>
      </div>
    </div>
  </div>
    
  <div class="topo-menu shadow-grey">
    
  </div>

  <div class="container">
    <div class="row r-alerta">

    </div>
  </div>

  <div class="container ">
    <div class="row">
      <div class="col-md-6 padding-30 col-md-offset-3 shadow-grey bg-white border-radius">
        
        <div class="row margin-top-10">
          <div class="col-md-4 col-md-offset-4">
            <span><i class="fa fa-check" aria-hidden="true"></i><b>Ativação de Usuário</b></span>
          </div>
        </div>

        <div class="row margin-top-20">
          <div class="col-md-10 col-md-offset-1">
            <p>Olá <?= $consultora->nome; ?>.</p>
            <p>Para ativar sua conta no Akdemy, preencha os campos abaixo</p>
          </div>
        </div>
        
        <form action="<?= base_url('home/ativa_conta'); ?>" class="form_ativar" name="form_ativar" method="post">
  
          <input type="hidden" name="hash" value="<?= $consultora->hash ?>">
          <div class="row margin-top-10">
            <div class="col-md-10 col-md-offset-1">
              <label for="">Nome</label>
              <input type="text" name="nome" class="input-sistem" value="<?= $consultora->nome; ?>" required="required">
            </div>
          </div>

          <div class="row margin-top-20">
            <div class="col-md-10 col-md-offset-1">
              <label for="">Senha</label>
              <input type="password" name="senha" class="input-sistem pass1" placeholder="Digite uma senha" required="required">
            </div>
          </div>

          <div class="row margin-top-20">
            <div class="col-md-10 col-md-offset-1">
              <label for="">Repita a Senha</label>
              <input type="password" class="input-sistem pass2" placeholder="Repita a senha" required="required">
            </div>
          </div>

          <div class="row margin-top-30">
            <div class="col-md-4 col-md-offset-4">
              <div class="padding-2">
                <input type="submit" class="button ativa_conta" value="Ativar Conta" name="action" >
              </div>
            </div>
          </div>

        </form>


      </div>
    </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('assets/js/jqueryui/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/mask.js') ?>"></script>
  </body>
</html>
