<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Videos_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}

		public function videos($id, $status = NULL){
			$this->db->from('videos');
			if($status != NULL){
				$this->db->where('status', $status);
			}
			$this->db->where('id', $id);
			return $this->db->get();
		}

		public function videos_arquivos($video_id, $tutor_id, $status = NULL){
			$this->db->from('videos_arquivos');
			$this->db->where('video_id', $video_id);
			$this->db->where('tutor_id', $tutor_id);
			if(!is_null($status)){$this->db->where('status', $status);}
			return $this->db->get();
		}


		public function editar($id, array $data){
			$this->db->where('id', $id);
			if($this->db->update('videos', $data)){
				return $id;
			}else{
				return false;
			}
		}

		public function inserir(array $input){
			$this->db->insert('videos', $input);
			return $this->db->insert_id();
		}

		public function upFiles(array $data){
			$this->db->insert('videos_arquivos', $data);
			return $this->db->insert_id();
		}

		public function videos_trilha($trilha_id){
			$this->db->from('videos');
			$this->db->where('trilha_id', $trilha_id);
			$this->db->where('status', 1);
			return $this->db->get();
		}


		public function getFavicon($id){
		
			$this->db->from('usuarios_favoritos');
			$this->db->where('video_id', $id);
			$this->db->where('usuario_id', $_SESSION['usuario']['id']);

			$query = $this->db->get();
			return $query->num_rows();

		}

		public function setFavorito($id){
			if($this->getFavicon($id)==0){
				$data['usuario_id']=$_SESSION['usuario']['id'];
				$data['video_id'] = $id;
				$this->db->insert('usuarios_favoritos', $data);
				return $this->db->insert_id();
			}else{
				$this->db->where('video_id', $id);
				$this->db->where('usuario_id', $_SESSION['usuario']['id']);
				$query = $this->db->delete('usuarios_favoritos');
				if($query){
					return true;
				}else{
					return false;
				}
			}
		}

		// ADM VIDEO EDITAR
		public function getVideo($id){
			$this->db->from('videos');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$result = $query->result();
			$video = $result[0];

			$arEmbed = explode('/', $video->link);
			$arLink = explode('?', $arEmbed[3]);
			$arLinkv = explode('=', $arLink[1]);
			$video->stream = $embed = $arLinkv[1];

			return $video;
		}

		public function getVideosConfigurados($tutor_id, $status = NULL){
			$this->db->from('videos');
			if($status != NULL){
				$this->db->where('status', $status);
			}
			$this->db->where('tutor_id', $tutor_id);
			$query = $this->db->get();
			$nVideos = $query->num_rows();
			$rVideos = $query->result();

			$data = array();
			foreach ($rVideos as $videos) {
				$trilhas = $this->trilhas->trilhas($videos->trilha_id);
				$qTrilhas = $trilhas->result();

				$data[] = array(
					'id' => $videos->id,
					'titulo' => $videos->titulo,
					'resumo' => $videos->descricao,
					'trilha' => $qTrilhas[0]->titulo,
					'duracao' => $videos->duracao,
					'mh' => $videos->mh
				);
			}

			return $data;
		}

		public function getFavoritos($usuario_id, $video_id){
			$this->db->from('usuarios_favoritos');
			$this->db->where('usuario_id', $usuario_id);
			$this->db->where('video_id', $video_id);
			return $this->db->get();
		}

		public function getViews($usuario_id, $video_id){
			$this->db->from('usuarios_videos');
			$this->db->where('usuario_id', $usuario_id);
			$this->db->where('video_id', $video_id);
			return $this->db->get();
		}

		public function getStatus($usuario_id, $video_id, $status = NULL){
			$this->db->from('usuarios_videos');
			$this->db->where('usuario_id', $usuario_id);
			$this->db->where('video_id', $video_id);
			if($status){
				$this->db->where('status', $status);
			}
			return $this->db->get();
		}



		public function setViews($usuario_id, $video_id, $new = NULL){
			if($new != NULL){
				$data['views'] = $new + 1;
				$this->db->where('usuario_id', $usuario_id);
				$this->db->where('video_id', $video_id);
				$this->db->update('usuarios_videos', $data);
			}else{
				$data['views'] = 1;
				$data['usuario_id'] = $usuario_id;
				$data['video_id'] = $video_id;
				$this->db->insert('usuarios_videos', $data);
			}
		}

	}
