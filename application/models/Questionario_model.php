<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionario_model extends CI_Model{
	public function do_insert($dados=null)
	{
		if ($dados):
			$this->db->insert('tb_questionario',$dados);
			return $id_questionario=$this->db->insert_id();
		endif;
	}
	public function pegar_opcao($id_pergunta)
	{	$this->db->select('id_opcao');
		$this->db->where('id_pergunta', $id_pergunta);
		return $this->db->get('tb_pergunta_opcao')->result();
	}
	public function do_insertqpo($opcao_pergunta_questionario=null){
		if ($opcao_pergunta_questionario):
			$this->db->insert_batch('tb_questionario_pergunta_opcao',$opcao_pergunta_questionario);
		endif;
	}
	public function listar_questionarios()
	{
		return $this->db->get('tb_questionario')->result();
	}
	public function listar_perguntas_opcao(){
		$this->db->select('id_pergunta,pr_pergunta, ds_pergunta');
		$this->db->distinct('pr_pergunta');
		return $this->db->get('dados_pergunta_opcao')->result_array();
	}
	public function listar_opcao($id_pergunta)
	{	$this->db->select('id_opcao , ds_opcao');
		$this->db->where('id_pergunta', $id_pergunta);
		return $this->db->get('dados_pergunta_opcao')->result();
	}
	public function do_update($dados)
	{
		if ($dados!=null):
			return $this->db->update('tb_questionario',$dados,$condicao);
		endif;
	}
	public function do_update_qpo($opcao_pergunta_questionario=null){
		if ($opcao_pergunta_questionario):
			$this->db->update_batch('tb_questionario_pergunta_opcao',$opcao_pergunta_questionario);
		endif;
	}
	public function get_byid($id=null)
	{
		if ($id!=null):
			$this->db->where('id_questionario',$id);
			return $this->db->get('tb_questionario');
		else:
			return false;
		endif;
	}
	public function buscatodosquest($b){
    $this->db->select ('dt_fim, nm_questionario, id_questionario');
    $this->db->from('tb_questionario');
    $this->db->where('dt_fim <', $b);
    $query=$this->db->get();
    return $query->result();
  }
	public function listar_questionarios_responder($b){
		$this->db->select('id_questionario, nm_questionario');
		$this->db->from('tb_questionario');
		$this->db->where('dt_fim >=', $b);
		$query=$this->db->get();
		return $query->result();
	}
}
