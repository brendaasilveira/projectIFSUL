<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Responder extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('responder_model');
        $this->load->library('form_validation');
        $this->load->helper('array');
    }
    public function index(){
				if(($this->session->userdata('tipo_usuario') == 'aluno')){
				$dados["titulo"] = "Listar Questionarios";
				$dados["view"] = "responder/consultar";
				date_default_timezone_set('America/Sao_Paulo');
				$data=date('Y-m-d');
				$dados["questionario"] = $this->responder_model->listar_questionarios($data);
				$this->load->view('template', $dados);
				}else{
					$dados['alert'] = "danger";
					$dados['mensagem'] = "Acesso negado";
					$this->session->set_flashdata('msg',$dados);
					redirect('menu');
			}
		}
    public function responder($id_questionario){
				$dados["titulo"] = "Responder Questionarios";
				$dados["view"] = "responder/responder";
				$dados["questionario"] = $this->responder_model->questionario_responder($id_questionario);
				$dados["pergunta"] = $this->responder_model->id_pergunta($id_questionario);
        $this->load->view('template', $dados);
}
	public function respostas(){
				$usuario = $_POST['id_usuario'];
				$questionario = $_POST['id_questionario'];
				$resposta = $_POST['resposta'];
				$id_qpo_2 = $_POST['id_qpo'];
				// echo "<pre>";
				// print_r($id_qpo);
				// echo "</pre>";
				// die();
				$id_perguntas = array();
				$id_perguntas_banco = array();
				foreach ($this->input->post() as $key => $value) {
						if(strpos( $key , "pr_pergunta_") !== false){
							array_push($id_perguntas, array($key => $value));
							array_push($id_perguntas_banco, array("id_pergunta" => $value));
					}
				}
				$id_qpo_banco = array();
				foreach ($this->input->post() as $key => $value) {
						if(strpos($key, "ds_opcao_") !== false){
							if(is_array($value)){
								array_push($id_qpo_banco, array("id_qpo" => $value));
							}else{
								array_push($id_qpo_banco, array("id_qpo" => array($value)));
							}
						}
					}
					$aux = 0;
					$id_tipo = array();
					foreach ($id_perguntas_banco as $p => $value) {
						$seleciona_tipo = $this->responder_model->seleciona_tipo($id_perguntas_banco[$aux]['id_pergunta']);
						array($seleciona_tipo);
						$aux++;
								for($b=0;$b<count($id_qpo_banco);$b++){
									for($a=0;$a<count($id_qpo_banco[$b]["id_qpo"]);$a++){
										 $id_qpo=($id_qpo_banco[$b]["id_qpo"][$a]);
										 $this->db->set("id_qpo",$id_qpo);
										 $this->db->set("id_usuario",$usuario);
										 $this->db->insert("tb_respostas");
									}
								}
								$this->db->set("id_usuario",$usuario);
								$this->db->set("id_qpo",$id_qpo_2);
								$this->db->set("respostas",$resposta);
								$insere = $this->db->insert("tb_respostas");
								break;
					}
					if($insere){
						$dados['alert'] = "success";
						$dados['mensagem'] = "Questionário respondido com sucesso!";
						$this->session->set_flashdata('msg',$dados);
				}else{
						$dados['alert'] = "danger";
						$dados['mensagem'] = "Erro ao responder questionário!";
						$this->session->set_flashdata('msg',$dados);
				}redirect("menu");
					}
	public function respostas_view(){
			if(($this->session->userdata('tipo_usuario') == 'servidoradm') || ($this->session->userdata('tipo_usuario') == 'servidor')){
			$dados["titulo"] = "Listar Respostas";
			$dados["view"] = "responder/respostas";
			$dados["questionario"] = $this->responder_model->listar_questionario();
			$this->load->view('template', $dados);
			}else{
				$dados['alert'] = "danger";
				$dados['mensagem'] = "Acesso negado";
				$this->session->set_flashdata('msg',$dados);
				redirect('menu');
			}
		}
		public function selecionar(){
				$dados["tb_questionario"] =$this->responder_model->buscatodos();
				$dados["titulo"] = "Respostas Questionário";
				$dados["view"] = "responder/selecionar";
        $this->load->view('template', $dados);
				 }
		public function selecionar_pergunta(){
			$id_questionario = elements(array('id_questionario'), $this->input->post());
			if($id_questionario){
				$dados["tb_pergunta"] =$this->responder_model->perguntas($id_questionario['id_questionario']);
			}
				$dados["titulo"] = "Respostas Questionário";
				$dados["view"] = "responder/selecionar_pergunta";
        $this->load->view('template', $dados);
			}
			public function selecionar_opcao(){
				$id_pergunta = elements(array('id_pergunta'), $this->input->post());
				if($id_pergunta){
					$dados["tb_opcao"] =$this->responder_model->opcao($id_pergunta['id_pergunta']);
				}
					$dados["titulo"] = "Respostas Questionário";
					$dados["view"] = "responder/selecionar_opcao";
	        $this->load->view('template', $dados);
}
		public function usuarios(){
				$id_opcao = elements(array('id_opcao'), $this->input->post());
			if($id_opcao){
				$dados["tb_usuario"] =$this->responder_model->usuarios($id_opcao['id_opcao']);
			}
				$dados["titulo"] = "Respostas Questionário";
				$dados["view"] = "responder/usuarios";
				$this->load->view('template', $dados);
		}
}
