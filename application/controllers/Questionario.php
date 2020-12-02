<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Questionario extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('questionario_model');
        $this->load->model('opcao_model');
        $this->load->library('form_validation');
        $this->load->helper('array');
    }
    public function index(){
			  if(($this->session->userdata('tipo_usuario') == 'servidoradm') || ($this->session->userdata('tipo_usuario') == 'servidor')){
				$dados["titulo"] = "Listar Questionarios";
        $dados["view"] = "questionario/consultar";
        $dados["questionario"] = $this->questionario_model->listar_questionarios();
        $this->load->view('template', $dados);
				}else{
					$dados['alert'] = "danger";
					$dados['mensagem'] = "Acesso negado";
					$this->session->set_flashdata('msg',$dados);
					redirect('menu');
			}
    }
    public function cadastrar(){
			$this->form_validation->set_rules('nm_questionario','Nome do Questionário:','trim|required|max_length[30]|is_unique[tb_questionario.nm_questionario]');
			$this->form_validation->set_rules('dt_datai','Data de Publicação:', 'trim|required');
			$this->form_validation->set_rules('dt_fim','Data do Fechamento:','trim|required');
			$this->form_validation->set_rules('id_pergunta','Pergunta:','trim');
			$this->form_validation->set_message('required','O Campo %s é obrigatório');
			$this->form_validation->set_message('is_unique','O Campo %s esta duplicado');
			$this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
			$this->form_validation->set_message('alpha','O Campo %s permite apenas letras');
			if($this->form_validation->run()==TRUE):
				$dados = elements(array('nm_questionario','dt_datai','dt_fim'), $this->input->post());
				$id_questionario = $this->questionario_model->do_insert($dados);
				$id_perguntas_banco = array();
				foreach ($this->input->post() as $key => $value) {
					if(strpos( $key , "id_pergunta") !== false){
						array_push($id_perguntas_banco, array("id_pergunta" => $value));
					}
				}
				$aux = 0;
				foreach ($id_perguntas_banco as $key => $value) {
					$id_opcoes = $this->questionario_model->pegar_opcao($id_perguntas_banco[$aux]['id_pergunta']);
					foreach ($id_opcoes as $key1 => $value1) {
						$this->db->set("id_opcao",$value1->id_opcao);
						$this->db->set("id_pergunta",$id_perguntas_banco[$aux]['id_pergunta']);
						$this->db->set("id_questionario",$id_questionario);
						$retorno = $this->db->insert("tb_questionario_pergunta_opcao");
					}

					$aux++;
				}
			  	if($retorno){
		            $dados['alert'] = "success";
		            $dados['mensagem'] = "Questionário cadastrado com sucesso!";
		            $this->session->set_flashdata('msg',$dados);
		        }else{
		            $dados['alert'] = "danger";
		            $dados['mensagem'] = "Erro ao cadastrar questionário!";
		            $this->session->set_flashdata('msg',$dados);
		        }
			  endif;
				$perguntas = $this->questionario_model->listar_perguntas_opcao();
				foreach ($perguntas as $key => $value) {
				$opcoes = $this->questionario_model->listar_opcao($value['id_pergunta']);
				$perguntas[$key]['opcoes'] = $opcoes;
			}
			$dados	["titulo"] = "Cadastrar Questionario";
			$dados["view"] = "questionario/cadastrar";
			$dados["perguntas"] = $perguntas;
			$this->load->view('template',$dados);
		}
		public function editar()
		{
				$id_questionario = $this->uri->segment(3);
						if($id_questionario==null) redirect('questionario');

				$questionario = $this->questionario_model->get_byid($id_questionario)->row();

				if(!$questionario):
						$dados['alert'] = "danger";
						$dados['mensagem'] = "Erro questionário não localizada!";
						$this->session->set_flashdata('msg',$dados);
						redirect("questionario");
				endif;
				$this->form_validation->set_rules('dt_datai','Data de Publicação:', 'trim|required');
				$this->form_validation->set_rules('dt_fim','Data do Fechamento:','trim|required');
				if($this->form_validation->run()==TRUE):
					$dados = elements(array('dt_datai','dt_fim'), $this->input->post());
					$id_questionario = $this->questionario_model->do_update($dados);
					$alterou = $this->questionario_model->do_update($dados, array('id_questionario' => $id_questionario));
					if($alterou){
							$dados['alert'] = "success";
							$dados['mensagem'] = "Registro alterado com sucesso!";
							$dados["questionario"]  = $questionario;
							$this->session->set_flashdata('msg',$dados);
					}else{
							$dados['alert'] = "danger";
							$dados['mensagem'] = "Erro ao alterado o registro!";
							$dados["questionario"]  = $questionario;
							$this->session->set_flashdata('msg',$dados);
					}
					redirect(current_url());
			endif;
				$dados["titulo"]   = "Editar Questionário";
				$dados["view"]     = "questionario/alterar";
				$dados["questionario"]  = $questionario;
				$this->load->view('template',$dados);
		}
  }
?>
