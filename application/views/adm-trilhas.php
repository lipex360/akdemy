<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $path = 'modulos/diretor/';

  $this->load->view('header');
?>
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-20">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-pencil-square-o tableTitle" aria-hidden="true"></i></i> <span><b>Editor de Trilhas</b></span>
      <?php 
        if($this->uri->segment(2) != 'trilhas' && $this->uri->segment(2) != 'cadastrar'){ 
      ?>
			  <a href="<?= base_url('adm_trilhas/trilhas')?>" class="pull-right pink"><i class="fa fa-list-ul margin-right-5" aria-hidden="true"></i></i>Visualizar Trilhas Configuradas</a>
      <?php } else {?>
        <a href="<?= base_url('adm_trilhas/adicionar')?>" class="pull-right pink"><i class="fa fa-plus margin-right-5" aria-hidden="true"></i></i>Adicionar Nova Trilha</a>
      <?php }?>
		</div>
	</div>
</div>
<form action="http://localhost/ci/akdemy/adm_trilhas/editar/1" class="consultores" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<?php
  foreach ($modulos as $modulo) {
    $modulo = $path.$modulo;
    $this->load->view($modulo);
  }
?>
</form>

<?php $this->load->view('rodape'); ?>