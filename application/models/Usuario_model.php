<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function getUsuario($id, $status = NULL){
		$this->db->from('usuarios');
		$this->db->where('id', $id);
		if(!is_null($status)) { $this->db->where('status', 1); }
		return $this->db->get();
	}

	public function check_usuario($email, $senha){
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		return $this->db->get();
	}

	public function check_hash($hash){
		$this->db->from('usuarios');
		$this->db->where('hash', $hash);
		$this->db->where('status', 0);
		return $this->db->get();
	}

	public function ativa_conta($hash, $data){
		$this->db->where('hash', $hash);
		$ativa_conta = $this->db->update('usuarios', $data);
		return $ativa_conta;
	}

	public function base_consultores($tutor_id, $email = NULL, $status = NULL){
		$this->db->from('usuarios');
		$this->db->where('tutor_id', $tutor_id);
		if(!is_null($email)){ $this->db->where('email', $email); }
		if(!is_null($status)){ $this->db->where('status', $status); }
		$this->db->order_by('nome');
		return $this->db->get();
	}

	public function nova_consultora(array $data){
		$this->db->insert('usuarios', $data);
		return $this->db->insert_id();
	}


	public function menu($nivel){
		$this->db->from('niveis_menu');
		$this->db->where('nivel_id', $nivel);
		$this->db->order_by('ordem');
		$query = $this->db->get();
		$query = $query->result();

		if($query){
			foreach ($query as $data) {
				$menu_id = $data->menu_id;

				$this->db->from('sis_menu');
				$this->db->where('id', $menu_id);
				$query = $this->db->get();
				$query = $query->result();

				$dados[] = $query[0];
			}
			return $dados;
		}
	}

	public function getNivelDiretorio($nivel_id){
		$this->db->from('sis_niveis');
		$this->db->where('id', $nivel_id);
		$query = $this->db->get();
		$query = $query->result();

		return $query[0]->diretorio;
	}

	public function getAcesso($usuario_id){
		$this->db->from('usuarios');
		$this->db->where('id', $usuario_id);
		$query = $this->db->get();
		$query = $query->result();

		return $query[0]->acesso;
	}
	public function setAcesso($usuario_id){
		$data['acesso'] = date('Y-m-d H:i:s');
		$this->db->where('id', $usuario_id);
		$this->db->update('usuarios', $data);
	}

	public function alerta($gatilho){
		$this->db->from('alertas');
		$this->db->where('gatilho', $gatilho);
		$query = $this->db->get();
		return $query->result();
	}


}

