<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model {
		public function login($lg_usuario=NULL, $ds_senha=NULL)
		{
			if ($lg_usuario && $ds_senha) {
				$this->db->where(['lg_usuario' => $lg_usuario, 'ds_senha' => $ds_senha]);
				$this->db->limit(1);
				$query = $this->db->get('tb_usuario');
				if ($query->num_rows() == 1) {
					return $query->row();
				}else{
					$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Você não tem acesso ao sistema</div>');
					return FALSE;
				}
				}else{
					$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert"> Você não tem acesso ao sistema</div>');
				return FALSE;
			}
		}
		public function getUsuariosId($id=NULL)
		{
			if ($id) {
				$this->db->where('id_usuario', $id);
				$this->db->limit(1);
				return $this->db->get('tb_usuario')->row();
		}
	}
		public function doUpdate($dados=NULL, $condicao=NULL)
	{
		if (is_array($dados) && $condicao) {

			$this->db->update('usuarios', $dados, $condicao);
		}
	}
		public function getUsuarios()
		{
			return $this->db->get('usuarios')->result();
		}
		public function doDelete($condicao=NULL)
		{
			if ($condicao) {
				$this->db->delete('usuarios', $condicao);
				return true;
			}else{
				return false;
			}
		}
}
