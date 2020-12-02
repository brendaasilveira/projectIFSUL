<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pergunta_model extends CI_Model{
	public function do_insert($dados=null){
		if ($dados!=null):
			$this->db->insert('tb_pergunta',$dados);
			$id_pergunta = $this->db->insert_id();
			return $id_pergunta;
		endif;
	}
	public function listar_perguntas(){
		return $this->db->get('tb_pergunta')->result();
	}
	public function selecionartipo($b){
		$this->db->select('id_tipo');
		$this->db->where('id_pergunta',$b);
		return $this->db->get('tb_pergunta')->result();
	}
	public function do_delete($condicao=null){
		if ($condicao!=null):
			return $this->db->delete('tb_pergunta',$condicao);
		endif;
	}
	public function do_delete1($condicao=null){
		if ($condicao!=null):
			return $this->db->delete('tb_questionario_pergunta_opcao',$condicao);
		endif;
	}
	public function do_delete2($condicao=null){
		if ($condicao!=null):
			return $this->db->delete('tb_respostas',$condicao);
		endif;
	}
	public function do_update($dados=null, $condicao=null)
	{
		if ($dados!=null && $condicao!=null):
			return $this->db->update('tb_pergunta',$dados,$condicao);
		endif;
	}
	public function get_byid($id_pergunta=null)
	{
		if ($id_pergunta!=null):
			$this->db->where('id_pergunta',$id_pergunta);
			return $this->db->get('tb_pergunta');
		else:
			return false;
		endif;
	}
	public function buscatodos(){
		return $this->db->get('tb_perguntatipo')->result();
	  }
	  public function buscatodosop(){
		return $this->db->get('tb_opcao')->result();
	  }
}
