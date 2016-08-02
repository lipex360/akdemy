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
    <title>Akdemy - Login</title>

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
      <?php if(isset($mensagem)){ ?>
      <div class="col-md-12 a-<?= $classe ?> alerta shadow-grey">
        <span><?= $mensagem; ?></span>
        <a href="javascript:void(0)" class="pull-right close-alerta"><i class="fa fa-times" aria-hidden="true"></i></a>
      </div>
      <?php } ?>
    </div>
  </div>

  <div class="container ">
    <div class="row">
      <div class="col-md-6 padding-30 col-md-offset-3 shadow-grey bg-white border-radius">
        
        <div class="row margin-top-10">
          <div class="col-md-2 col-md-offset-5">
            <img src="<?= base_url('assets/images/login.gif') ?>" alt="">
          </div>
        </div>
        
        <form action="<?= base_url('home/login'); ?>" method="post">

          <div class="row margin-top-30">
            <div class="col-md-10 col-md-offset-1">
              <div class="box-input padding-10">
                <img src="<?= base_url('assets/images/smile.gif') ?>" alt="smile" class="hidden-xs hidden-sm hidden-md">
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" class="margin-left-5" required="required">
              </div>
            </div>
          </div>

          <div class="row margin-top-30">
            <div class="col-md-10 col-md-offset-1">
              <div class="box-input padding-10">
                <img src="<?= base_url('assets/images/key.gif') ?>" alt="key" class="hidden-xs hidden-sm hidden-md">
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" class="margin-left-5" required="required">
              </div>
            </div>
          </div>

          <div class="row margin-top-30">
            <div class="col-md-4 col-md-offset-4">
              <div class="padding-2">
                <button class="button" name="action" value="login" name="command" >Entrar</button>
              </div>
            </div>
          </div>

        </form>

        <div class="row margin-top-50">
          <div class="col-md-6 col-md-offset-3 text-center">
            <ul class="list-unstyled list-inline margin-left-10">
              <li class="pull-left hidden-xs hidden-sm hidden-md"><img src="<?= base_url('assets/images/baby.gif') ?>" alt="baby"></li>
              <li class="pull-left margin-top-2 "><a href="" class="margin-left-5 pink">Ixi! esqueci minha senha :(</a></li>
            </ul>
            
            
          </div>
        </div>


      </div>
    </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
  </body>
</html>
