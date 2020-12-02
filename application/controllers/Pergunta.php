<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pergunta extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('pergunta_model');
        $this->load->library('form_validation');
        $this->load->helper('array');
    }
    public function index(){
        if(($this->session->userdata('tipo_usuario') == 'servidoradm') || ($this->session->userdata('tipo_usuario') == 'servidor')){
            $dados["titulo"] = "Listar Pergunta";
            $dados["view"] = "pergunta/consultar";
            $dados["perguntas"] = $this->pergunta_model->listar_perguntas();
            $this->load->view('template', $dados);
					}else{
						$dados['alert'] = "danger";
						$dados['mensagem'] = "Acesso negado";
						$this->session->set_flashdata('msg',$dados);
						redirect('menu');
				}
    }
    public function cadastrar(){
        $this->form_validation->set_rules('pr_pergunta','Pergunta','trim|required|max_length[50]|is_unique[tb_pergunta.pr_pergunta]');
        $this->form_validation->set_rules('ds_pergunta','Descrição da Pergunta','trim|max_length[200]');
        $this->form_validation->set_rules('id_tipo','Tipo de Pergunta','trim');
        $this->form_validation->set_rules('id_opcao','Tipo de Opção');
        $this->form_validation->set_message('required','O Campo %s é obrigatório');
				$this->form_validation->set_message('is_unique','Essa %s já esta cadastrada');
				$this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
        if($this->form_validation->run()==TRUE):
            $dados = elements(array('pr_pergunta','ds_pergunta', 'id_tipo'), $this->input->post());
            $dados1 = elements(array('id_opcao'), $this->input->post());
            $insere	= $this->pergunta_model->do_insert($dados);
            $id_tipo = $this->pergunta_model->selecionartipo($insere);
						$id_resposta_dissertativa = 1;
            if(($id_tipo[0]->id_tipo)==1){
                $this->db->set("id_pergunta",$insere);
								$this->db->set("id_opcao",$id_resposta_dissertativa);
                $this->db->insert("tb_pergunta_opcao");
            }else{
            $count=0;
            for($a=0;$a<count($dados1['id_opcao']);$a++){
                $id_pergunta=$insere;
                $id_opcao=($dados1['id_opcao'][$a]);
                $this->db->set("id_opcao",$id_opcao);
                $this->db->set("id_pergunta",$id_pergunta);
                $this->db->insert("tb_pergunta_opcao");
                $count++;
                }
            }
            if($id_tipo){
                $dados['alert'] = "success";
                $dados['mensagem'] = "Pergunta cadastrada com sucesso!";
                $this->session->set_flashdata('msn',$dados);
            }else{
                $dados['alert'] = "danger";
                $dados['mensagem'] = "Erro ao cadastrar pergunta!";
                $this->session->set_flashdata('msn',$dados);
            }
        endif;
        $dados["opcao"] =$this->pergunta_model->buscatodosop();
        $dados["tb_perguntatipo"] =$this->pergunta_model->buscatodos();
        $dados["titulo"] = "Cadastrar Pergunta";
        $dados["view"] = "pergunta/cadastrar";
        $this->load->view('template',$dados);
    }
    public function editar(){
        $id_pergunta = $this->uri->segment(3);
            if($id_pergunta==null) redirect('pergunta');
        			$pergunta = $this->pergunta_model->get_byid($id_pergunta)->row();
        if(!$pergunta):
            $dados['alert'] = "danger";
            $dados['mensagem'] = "Erro pergunta não localizada!";
            $this->session->set_flashdata('msn',$dados);
            redirect("pergunta");
        endif;
        $this->form_validation->set_rules('pr_pergunta','Pergunta','trim|required|max_length[50]');
        $this->form_validation->set_rules('ds_pergunta','Descrição da pergunta','trim|max_length[200]');
        $this->form_validation->set_message('required','O Campo %s é obrigatório');
				$this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
        if($this->form_validation->run()==TRUE):
            $dados = elements(array('pr_pergunta', 'ds_pergunta'), $this->input->post());
            $id_pergunta = $this->input->post('id_pergunta');
            $alterou = $this->pergunta_model->do_update($dados, array('id_pergunta' => $id_pergunta));
            if($alterou){
                $dados['alert'] = "success";
                $dados['mensagem'] = "Registro alterado com sucesso!";
                $dados["pergunta"]  = $pergunta;
                $this->session->set_flashdata('msg',$dados);
            }else{
                $dados['alert'] = "danger";
                $dados['mensagem'] = "Erro ao alterado o registro!";
                $dados["pergunta"]  = $pergunta;
                $this->session->set_flashdata('msg',$dados);
            }
            redirect(current_url());
        endif;
        $dados["titulo"]   = "Editar Pergunta";
        $dados["view"]     = "pergunta/alterar";
        $dados["pergunta"]  = $pergunta;
        $this->load->view('template',$dados);
    }
}
?>
