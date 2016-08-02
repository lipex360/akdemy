<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

  <!-- Centro -->
  <div class="container shadow-grey bg-white border-radius padding-top-30 padding-bottom-50">

    <!-- Player de Vídeo -->
    <div class="row">
      <div class="col-md-12">
        <img src="<?= base_url('assets/images/play.gif')?>" alt="Trilhas"> <span><b><?= $video->titulo; ?></b></span>
        <a href="javascript:history.back()" class="pull-right pink"><i class="fa fa-chevron-left margin-right-5" aria-hidden="true"></i></i>Voltar</a>
        <br>
        <br>
        <p><?= $video->descricao; ?>!</p>
      </div>
    </div>

    <div class="row margin-top-10">
      <div class="col-md-12 ">
          <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?= $video->link;?>?autoplay=1" class="bg-pink" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>

    <div class="row margin-top-10">
     
      <div class="col-md-12">
        <a href="" class="bg-finepink pink padding-5 pull-left margin-right-10"><img src="<?= base_url('assets/images/make.gif')?>" alt="Conclusão" class="margin-right-5"> Concluir Atividade</a>
        <a href="" class="bg-finepink pink padding-5 pull-left"><img src="<?= base_url('assets/images/favoritos.gif')?>" alt="Favorito" class="margin-right-5"> Favoritar Vídeo</a>
        <a href="" class="bg-finepink pink padding-5 pull-right"><img src="<?= base_url('assets/images/sacola.gif')?>" alt="Ajuda" class="margin-right-5"> Preciso de Ajuda</a>
      </div>

    </div>

    <!-- ### Player de Vídeo ### -->
    
    <!-- Comentários -->
    
    <form action="">
    <div class="row margin-top-50">
      
      <div class="col-md-12">
        <img src="<?= base_url('assets/images/pencil_g.gif')?>" alt="Comentário" class="pull-left margin-right-10"> <span><b>Comente o Vídeo :)</b></span>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <textarea name="" id="" class="box-comentario bg-finepink pink padding-20 padding-top-10 margin-top-10" placeholder="fala aí, o que você achou dessa aula?"></textarea>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-12">
        <button class="bg-finepink pink padding-5 pull-right border-none padding-left-40 padding-right-40 margin-top-10">Comentar</button>
      </div>
    </div>
    </form>

    <?php $this->load->view('modulos/comentarios'); ?>
    <!-- ### Comentários ### -->



 </div>
 <!-- ### Centro ### -->

<?php $this->load->view('rodape'); ?>