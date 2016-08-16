<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_videos extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_id'] != 1){
			redirect('home');
		}
		$this->load->model('Usuario_model', 'usuario');
		$this->load->model('Videos_model', 'videos');
		$this->load->model('Trilhas_model', 'trilhas');
	}

	public function getMenu(){
		extract($_SESSION['usuario']);
		return $menu = $this->usuario->menu($nivel_id);
	}
	
	public function videos()
	{
		$usuario_id = $_SESSION['usuario']['id'];
		
		// MÓDULOS DA PÁGINA
		
		// TB VIDEOS CONFIGURADOS
		$view['videosConfigurados'] = $this->getVideosConfigurados($usuario_id);
		$view['modulos'][] = 'tb-videos-configurados';


		$view['menu'] = $this->getMenu();
		$this->load->view('adm-videos', $view);
	}

	public function adicionar(){
		$usuario_id = $_SESSION['usuario']['id'];
		$hash = $_SESSION['usuario']['hash'];
		
		// TRILHAS DISPONÍVEIS
		$trilhas = $this->trilhas->tutor_trilhas($usuario_id);
		$qTrilhas = $trilhas->result();
		$view['trilhas'] = $qTrilhas;

		// CADASTRAR NOVO VÍDEO
		$action = $this->input->post('action');
		if($action === "cad_video"){
			$form = $this->input->post();
			unset($form['action']);
			$form['tutor_id'] = $usuario_id;
			$data = $form['data'];
			if(!empty($data)){
				$data = explode('/', $data);
				$form['data'] = $data[2].'-'.$data[1].'-'.$data[0];
			}
			
			$setVideo = $this->videos->inserir($form);

			if($setVideo){

				$files = $_FILES['data'];

				if($files['name'][0] != ""){
					$path = "./upload/{$hash}/videos/";
					$this->uploadFiles($files, $path, $setVideo);
				}

				$alerta['mensagem'] = "Vídeo <b>{$form['titulo']}</b> cadastrada com sucesso!";
				$alerta['classe'] = 'success';
			}else{
				$alerta['mensagem'] = "Erro ao cadastrar o Vídeo! Uma mensagem automática foi enviada ao desenvolvedor!";
				$alerta['classe'] = 'danger';
			}
		}
		if(isset($alerta)){$view['alerta'] = $alerta;}

		$view['modulos'][] = 'adm-video-adicionar';
		$view['menu'] = $this->getMenu();
		$this->load->view('adm-videos', $view);
	}

	public function editar($video_id){
		$usuario_id = $_SESSION['usuario']['id'];
		$hash = $_SESSION['usuario']['hash'];

		if($this->input->post('action')==="editar"){
			$form = $this->input->post();
			unset($form['action']);
			$form['tutor_id'] = $usuario_id;

			$data = $form['data'];
			if(!empty($data)){
				$data = explode('/', $data);
				$form['data'] = $data[2].'-'.$data[1].'-'.$data[0];
			}

			$setVideo = $this->videos->editar($video_id, $form);
			if($setVideo){
				$files = $_FILES['data'];

				if($files['name'][0] != ""){
					$path = "./upload/{$hash}/videos/";
					$this->uploadFiles($files, $path, $setVideo);
				}

				$alerta['mensagem'] = "Vídeo <b>{$form['titulo']}</b> alterado com sucesso!";
				$alerta['classe'] = 'success';
			}else{
				$alerta['mensagem'] = "Erro ao cadastrar o Vídeo! Uma mensagem automática foi enviada ao desenvolvedor!";
				$alerta['classe'] = 'danger';
			}
		}

		if(isset($alerta)){$view['alerta'] = $alerta;}
		$view['video_editar'] = $this->videos->getVideo($video_id);

		// TRILHA CONFIGURADA
		$trilhas = $this->trilhas->tutor_trilhas($usuario_id, $view['video_editar']->trilha_id);
		$qTrilhas = $trilhas->result();
		$view['trilha_configurada'] = $qTrilhas;

		// TRILHAS DISPONÍVEIS
		$trilhas = $this->trilhas->tutor_trilhas_edit($usuario_id, $view['video_editar']->trilha_id);
		$qTrilhas = $trilhas->result();
		$view['trilhas'] = $qTrilhas;

		// ARQUIVOS DA TRILHA
		$arquivos = $this->videos->videos_arquivos($video_id, $usuario_id);
		$rFiles = $arquivos->result();
		$view['arquivos'] = $rFiles;


		// MÓDULOS DA PÁGINA
		if(isset($alerta)){$view['alerta'] = $alerta;}
		$view['modulos'][] = 'adm-video-editar';

		$view['menu'] = $this->getMenu();
		$this->load->view('adm-videos', $view);
	}


	public function uploadFiles($files, $path, $id){

		$tutor_id = $_SESSION['usuario']['id'];
		$ext = array("pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "rar", "zip", "txt", "jpg", "png", "gif", "jpeg");
		
		$uploads = upload($files, $ext, $path);

		foreach ($uploads as $file) {
			if($file['error'] == 0){
				$file['tutor_id'] = $tutor_id;
				$file['video_id'] = $id ;
				$this->videos->upFiles($file);
			}
		}
	}


	public function getVideosConfigurados($tutor_id){
		$videos = $this->videos->getVideosConfigurados($tutor_id, 1);
		return $videos;
	}

}
