<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{	
		$data['embed'] = "";
		if($this->input->post('link')){
			$link = $this->input->post('link');

			$arEmbed = explode('/', $link);
			$arLink = explode('?', $arEmbed[3]);
			$arLinkv = explode('=', $arLink[1]);
			$data['embed'] = $embed = $arLinkv[1];
		}
		

		$this->load->view('youtube', $data);
	}



}
