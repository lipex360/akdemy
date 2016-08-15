<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_trilhas extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario'])){
			redirect('home');
		}
		$this->load->model('Usuario_model', 'usuario');
		$this->load->model('Videos_model', 'videos');
		$this->load->model('Trilha_model', 'trilhas');
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}
	
	public function trilhas()
	{
		$usuario_id = $_SESSION['usuario']['id'];


		// TRILHAS ATIVAS
		$view['trilhas'] = $this->trilhas->getTrilhasAtivas($usuario_id);

		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'tb-trilhas-configuradas';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-trilhas', $view);
	}

	public function adicionar(){
		$usuario_id = $_SESSION['usuario']['id'];
		$hash = $_SESSION['usuario']['hash'];

		$action = $this->input->post('action');

		if($action === "adicionar"){
			$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required');
			$this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'trim|required');

			if($this->form_validation->run()){

				$this->load->library('upload');


				$data['titulo'] = $action = $this->input->post('titulo', true);
				$data['descricao'] = $action = $this->input->post('descricao', true);
				$data['tutor_id'] = $usuario_id;

				$setTrilha = $this->trilhas->cadastrar($data);

				$files = $_FILES['data'];

				if($files['name'][0] != ""){

					$ext = array("pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "rar", "zip", "txt");
					$path = "./upload/{$hash}/";

					$this->uploadFiles($files, $ext, $path, $setTrilha);
				}


				if($setTrilha){
					$alerta['mensagem'] = "Trilha <b>{$data['titulo']}</b> cadastrada com sucesso! <b><a href='editar/$setTrilha'>Clique Aqui</a></b> para configurá-la";
					$alerta['classe'] = 'success';
				}else{
					$alerta['mensagem'] = "Erro ao cadastrar a trilha";
					$alerta['classe'] = 'danger';
				}
			}
		}
		
		if(isset($alerta)){$view['alerta'] = $alerta;}

		// TRILHAS ATIVAS
		$view['trilhas'] = $this->trilhas->getTrilhasAtivas($usuario_id);

		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'adm-trilha-adicionar';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-trilhas', $view);
	}



	public function editar($trilha_id){
		$view['menu'] = $this->getMenu();
		$usuario_id = $_SESSION['usuario']['id'];

		if($this->input->post('action') == 'set_trilha'){

			$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required');
			$this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'trim|required');

			if($this->form_validation->run()){
				$data['titulo'] = $action = $this->input->post('titulo', true);
				$data['descricao'] = $action = $this->input->post('descricao', true);
				$data['tutor_id'] = $usuario_id;

				$setTrilha = $this->trilhas->alterar($trilha_id, $data);

				if($setTrilha){
					$alerta['mensagem'] = "Trilha <b>{$data['titulo']}</b> Alterada com sucesso!";
					$alerta['classe'] = 'success';
				}else{
					$alerta['mensagem'] = "Erro ao Alterar a Trilha";
					$alerta['classe'] = 'danger';
				}
			}

		}

		if(isset($alerta)){$view['alerta'] = $alerta;}

		$trilhas = $this->trilhas->trilhas($trilha_id);
		$qTrilha = $trilhas->result();
		
		// DADOS DA TRILHA
		$view['trilha'] = array(
			'id' => $qTrilha[0]->id,
			'titulo' => $qTrilha[0]->titulo,
			'descricao' => $qTrilha[0]->descricao,
			'status' => $qTrilha[0]->status
		);

		// ARQUIVOS DA TRILHA
		$arquivos = $this->trilhas->trilhas_arquivos($usuario_id, $usuario_id);
		$rFiles = $arquivos->result();
		$view['arquivos'] = $rFiles;
		
		// MÓDULOS DA PÁGINA
		$view['modulos'][] = 'adm-trilha-editar';
		$view['modulos'][] = 'tb-trilhas-arquivos';
		$this->load->view('adm-trilhas', $view);
	}

	public function uploadFiles($files, $ext, $path, $id){
		$tutor_id = $_SESSION['usuario']['id'];
		$uploads = upload($files, $ext, $path);

		foreach ($uploads as $file) {
			$file['tutor_id'] = $tutor_id;
			$file['trilha_id'] = $id ;
			$this->trilhas->upFiles($file);
		}
	}

}
