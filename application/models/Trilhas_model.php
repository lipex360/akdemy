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

		public function usuarios_trilhas($usuario_id, $tutor_id){
			$this->db->from('usuarios_trilhas');
			$this->db->where('usuario_id', $usuario_id);
			$this->db->where('tutor_id', $tutor_id);
			return $this->db->get();
		}
	}
 ?>