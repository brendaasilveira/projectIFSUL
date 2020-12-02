<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Usuarios_model extends CI_Model{
  public function __construct(){
    parent::__construct();
	}
	public function do_insert($dados=null){
		if ($dados!=null):
			return $this->db->insert('tb_usuario',$dados);
		endif;
	}
  public function listar_usuarios(){
    return $this->db->get('dados_usuario')->result();
  }
	public function buscatodos(){
    $this->db->select('*');
    $this->db->from('tb_usuariotipo');
		$query = $this->db->get();
		return $query->result();
  }
  public function buscatodosus(){
		return $this->db->get('tb_usuariotipo')->result();
  }
  public function do_update($dados=null, $condicao=null)
	{
		if ($dados!=null && $condicao!=null):
			// Retorna true quando realiza alteração ou false em caso de erro
			return $this->db->update('tb_usuario',$dados,$condicao);
		endif;
	}
	public function get_byid($id_usuario)
	{
		if ($id_usuario!=null):
			$this->db->where('id_usuario',$id_usuario);
			return $this->db->get('tb_usuario');
		else:
			return false;
		endif;
	}
public function do_update_situacao($dados=NULL, $condicao=NULL){
if (is_array($dados) && $condicao) {
  $this->db->update('tb_usuario', $dados, $condicao);
	}
}
public function getUsuariosId($id_usuario=NULL){
  if ($id_usuario) {
    $this->db->where('id_usuario', $id_usuario);
    $this->db->limit(1);
    return $this->db->get('tb_usuario')->row();
		}
	}
}
 ?>
