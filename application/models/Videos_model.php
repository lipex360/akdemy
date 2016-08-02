<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Videos_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}

		public function videos($id){
			$this->db->from('videos');
			$this->db->where('id', $id);
			return $this->db->get();
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

	}
