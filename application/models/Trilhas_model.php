<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Trilhas_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}

		public function trilhas($id){
			$this->db->from('trilhas');
			$this->db->where('id', $id);
			return $this->db->get();
		}
		public function adm_trilhas($id, $tutor_id){
			$this->db->from('trilhas');
			$this->db->where('tutor_id', $tutor_id);
			$this->db->where('id', $id);
			return $this->db->get();
		}
		
		public function trilhas_arquivos($trilha_id, $tutor_id, $status = NULL){
			$this->db->from('trilhas_arquivos');
			$this->db->where('trilha_id', $trilha_id);
			$this->db->where('tutor_id', $tutor_id);
			if(!is_null($status)){$this->db->where('status', $status);}
			return $this->db->get();
		}

		public function tutor_trilhas($tutor_id, $trilha_id = NULL, $status = NULL){
			$this->db->from('trilhas');
			$this->db->where('tutor_id', $tutor_id);
			if(!is_null($trilha_id)){
				$this->db->where('id =', $trilha_id);
			}
			if(!is_null($status)){
				$this->db->where('status', $status);	
			}
			return $this->db->get();
		}

		public function tutor_trilhas_edit($tutor_id, $trilha_id){
			$this->db->from('trilhas');
			$this->db->where('tutor_id', $tutor_id);
			$this->db->where('id !=', $trilha_id);
			$this->db->where('status', 1);
			
			return $this->db->get();
		}

		public function cadastrar(array $data){
			$this->db->insert('trilhas', $data);
			return $this->db->insert_id();
		}

		public function upFiles(array $data){
			$this->db->insert('trilhas_arquivos', $data);
			return $this->db->insert_id();
		}

		public function alterar($trilha_id, array $data){
			$this->db->where('id', $trilha_id);
			if($this->db->update('trilhas', $data)){
				return $trilha_id;
			}else{
				return false;
			}
		}

		public function usuarios_trilhas($usuario_id, $tutor_id){
			$this->db->from('usuarios_trilhas');
			$this->db->where('usuario_id', $usuario_id);
			$this->db->where('tutor_id', $tutor_id);
			return $this->db->get();
		}


		public function getTrilhasAtivas($tutor_id){
			$this->db->from('trilhas');
			$this->db->where('tutor_id', $tutor_id);
			$this->db->where('status !=', 0);

			$query = $this->db->get();
			$rTrilhas = $query->result();
			$nTrilhas = $query->num_rows();
			
			if($nTrilhas){
				
				foreach ($rTrilhas as $trilhas) {
					$qVideos = $this->videos->videos_trilha($trilhas->id);
					$nVideos = $qVideos->num_rows();
					$data[] = array(
						'id' => $trilhas->id,
						'titulo' => $trilhas->titulo,
						'descricao' => $trilhas->descricao,
						'nVideos' => $nVideos
						);
					
				}
				return $data;
			}else{
				return null;
			}
		}
	

	}
 ?>