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

	public function upload(){
		$this->load->view('upload', array('error' => ' ' ));
	}
	  public function do_upload()
        {
                // $config['upload_path']          = "";
                // $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload');

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        var_dump($data);
                }
        }



}
