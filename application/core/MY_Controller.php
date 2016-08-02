<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Parent extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION['usuario'])){
			redirect('home');
		}

		ultimo_acesso();
    }


	public function sendmail(){
		$this->load->library('email');

		$this->email->from('felipe@minimaweb.com.br', 'Felipe');
		$this->email->to('lipex360@gmail.com');

		$this->email->subject('Teste de Email');
		$this->email->message('Testando a classe de email.');

		$this->email->send();

	}

}
