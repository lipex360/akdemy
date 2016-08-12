<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Título da Página</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Youtube Link</h1>
          <form action="<?= base_url('link')?>" method="post">
            <input type="text" name="link" id="" class="form-control">
            <p><?= $embed ?></p>
          </form>
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
