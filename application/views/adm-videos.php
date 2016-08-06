<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $path = 'modulos/diretor/';

  $this->load->view('header');
?>
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-20">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-pencil-square-o tableTitle" aria-hidden="true"></i></i> <span><b>Editor de Vídeos</b></span>
      <?php 
        if($this->uri->segment(2) != 'videos' && $this->uri->segment(2) != 'cadastrar'){ 
      ?>
			<a href="<?= base_url('adm_trilha/trilhas')?>" class="pull-right pink"><i class="fa fa-list-ul margin-right-5" aria-hidden="true"></i></i>Visualizar os Vídeos</a>
      <?php } ?>
		</div>
	</div>
</div>

<?php
  foreach ($modulos as $modulo) {
    $modulo = $path.$modulo;
    $this->load->view($modulo);;
  }
    
  $this->load->view('rodape');

?>