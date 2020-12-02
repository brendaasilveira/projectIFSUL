<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responder_model extends CI_Model{
	public function listar_questionarios($data){
		$this->db->select('id_questionario, nm_questionario');
		$this->db->from('tb_questionario');
		$this->db->where('dt_fim >=', $data);
		$query=$this->db->get();
		return $query->result();
	}
	public function buscatodos(){
		$this->db->select('*');
		$this->db->from('tb_questionario');
		$query = $this->db->get();
		return $query->result();
	}
	public function perguntas($id_questionario){
		$this->db->select('id_pergunta,pr_pergunta');
		$this->db->where('id_questionario', $id_questionario);
		$this->db->distinct('pr_pergunta');
		$this->db->from('dados_resposta');
		$query = $this->db->get();
		return $query->result();
	}
	public function opcao($id_pergunta){
		$this->db->select('id_opcao,ds_opcao');
		$this->db->where('id_pergunta', $id_pergunta);
		$this->db->distinct('ds_opcao');
		$this->db->from('dados_resposta');
		$query = $this->db->get();
		return $query->result();
	}
	public function usuarios($id_opcao){
		$this->db->select('id_usuario,nm_usuario,lg_usuario,ds_email, respostas');
		$this->db->where('id_opcao', $id_opcao);
		$this->db->distinct('nm_usuario');
		$this->db->from('dados_resposta');
		$query = $this->db->get();
		return $query->result();
	}
	public function seleciona_tipo($id_perguntas_banco){
			$this->db->select('id_tipo');
			$this->db->where('id_pergunta', $id_perguntas_banco);
			$this->db->limit(1);
			return $this->db->get('dados_questionario')->result();
	}
  public function listar_tudo(){
		return $this->db->get('tb_questionario_pergunta_opcao')->result();
	}
	public function do_insert($dados1){
		$this->db->insert_batch('tb_respostas',$dados1);
	}
	public function questionario_responder($id_questionario){
			$this->db->select('*');
			$this->db->where('id_questionario', $id_questionario);
			return $this->db->get('dados_questionario')->result();
	}
	public function id_pergunta($id_questionario){
		$this->db->select('*');
		$this->db->where('id_questionario', $id_questionario);
		$this->db->group_by('pr_pergunta');
		return $this->db->get('dados_questionario')->result();
	}

	public function pergunta_responder($id_questionario){
			$this->db->select('*');
			$this->db->where('id_questionario', $id_questionario);
			return $this->db->get('dados_questionario')->result();
	}
	public function opcao_responder($id_questionario){
			$this->db->select('ds_opcao');
			$this->db->where('id_questionario', $id_questionario);
			return $this->db->get('dados_questionario')->row();
	}
	public function listar_questionario(){
		$this->db->select('*');
		return $this->db->get('dados_resposta')->result();
  }
	public function do_insertqpo($opcao_pergunta_questionario=null){
		if ($opcao_pergunta_questionario):
			$this->db->insert_batch('tb_respostas',$opcao_pergunta_questionario);
		endif;
	}
}
