<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $path = 'modulos/diretor/';

  $this->load->view('header');
?>
<div class="container shadow-grey bg-white border-radius padding-top-20 padding-bottom-20">
	<div class="row">
		<div class="col-md-12">
			<i class="fa fa-pencil-square-o tableTitle" aria-hidden="true"></i></i> <span><b>Editor de Trilhas</b></span>
			<a href="javascript:history.back()" class="pull-right pink"><i class="fa fa-chevron-left margin-right-5" aria-hidden="true"></i></i>Voltar</a>
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