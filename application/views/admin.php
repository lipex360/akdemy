<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $path = 'modulos/diretor/';

  $this->load->view('header');

  foreach ($modulos as $modulo) {
    $modulo = $path.$modulo;
    $this->load->view($modulo);;
  }
    
  $this->load->view('rodape');

?>