<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opcao_model extends CI_Model{
    public function do_insert($id_opcoes_banco=null)
	{
        if ($id_opcoes_banco):
            $this->db->insert_batch('tb_opcao',$id_opcoes_banco);
            $id_opcao1 = $this->db->insert_id();
            $id_opcao2 = ($id_opcao1+count($id_opcoes_banco)-1);
            $this->db->select('id_opcao,ds_opcao');
            $this->db->where('id_opcao >=', $id_opcao1);
            $this->db->where('id_opcao <=', $id_opcao2);
            return $this->db->get('tb_opcao')->result();
        endif;
    }
    public function do_insert1($dados=null){
		if ($dados!=null):
			return $this->db->insert('tb_opcao',$dados);
		endif;
    }
    public function do_update($dados=null, $condicao=null)
	{
		if ($dados!=null && $condicao!=null):
			return $this->db->update('tb_opcao',$dados,$condicao);
		endif;
    }
    public function get_byid($id_opcao=null)
	{
		if ($id_opcao!=null):
			$this->db->where('id_opcao',$id_opcao);
			return $this->db->get('tb_opcao');
		else:
			return false;
		endif;
	}
      public function listar_opcao(){
		return $this->db->get('tb_opcao')->result();
	}
}
?>
