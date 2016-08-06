<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $path = 'modulos/diretor/';

  $this->load->view('header');
  $this->load->view($path.'f-adicionar-trilha');
  $this->load->view($path.'tb-trilhas-admin'); 
  $this->load->view('rodape');
   
?>