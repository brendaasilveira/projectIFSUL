<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Opcao extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('opcao_model');
        $this->load->library('form_validation');
        $this->load->helper('array');
    }
    public function index(){
        if(($this->session->userdata('tipo_usuario') == 'servidoradm') || ($this->session->userdata('tipo_usuario') == 'servidor')){
            $dados["titulo"] = "Listar Opcao";
            $dados["view"] = "opcao/consultar";
            $dados["opcao"] = $this->opcao_model->listar_opcao();
            $this->load->view('template', $dados);
					}else{
						$dados['alert'] = "danger";
						$dados['mensagem'] = "Acesso negado";
						$this->session->set_flashdata('msg',$dados);
						redirect('menu');
				}
    }
    public function cadastrar(){
        $this->form_validation->set_rules('ds_opcao','Descrição da Opção','trim|max_length[200]|required|is_unique[tb_opcao.ds_opcao]');
        $this->form_validation->set_message('required','O Campo %s é obrigatório');
        $this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
				$this->form_validation->set_message('is_unique','A opção %s já existe ');
        if($this->form_validation->run()==TRUE):
            $dados = elements(array('ds_opcao'), $this->input->post());
            if($this->opcao_model->do_insert1($dados)){
                $dados['alert'] = "success";
                $dados['mensagem'] = "Opção cadastrada com sucesso!";
                $this->session->set_flashdata('msn',$dados);
            }else{
                $dados['alert'] = "danger";
                $dados['mensagem'] = "Erro ao cadastrar opção!";
                $this->session->set_flashdata('msn',$dados);
            }
        endif;
        $dados["titulo"] = "Cadastrar Opção";
        $dados["view"] = "opcao/cadastrar";
        $this->load->view('template',$dados);
    }
    public function editar(){
        $id_opcao = $this->uri->segment(3);
            if($id_opcao==null) redirect('opcao');
        			$opcao = $this->opcao_model->get_byid($id_opcao)->row();
        if(!$opcao):
            $dados['alert'] = "danger";
            $dados['mensagem'] = "Erro opção não localizada!";
            $this->session->set_flashdata('msn',$dados);
            redirect("opcao");
        endif;
        $this->form_validation->set_rules('ds_opcao','Opção','trim|required|max_length[50]');
        $this->form_validation->set_message('required','O Campo %s é obrigatório');
        $this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
        if($this->form_validation->run()==TRUE):
            $dados = elements(array('ds_opcao'), $this->input->post());
            $id_opcao = $this->input->post('id_opcao');
            $alterou = $this->opcao_model->do_update($dados, array('id_opcao' => $id_opcao));
            if($alterou){
                $dados['alert'] = "success";
                $dados['mensagem'] = "Registro alterado com sucesso!";
                $dados["opcao"]  = $opcao;
                $this->session->set_flashdata('msg',$dados);
            }else{
                $dados['alert'] = "danger";
                $dados['mensagem'] = "Erro ao alterado o registro!";
                $dados["opcao"]  = $opcao;
                $this->session->set_flashdata('msg',$dados);
            }
            redirect(current_url());
        endif;
        $dados["titulo"]   = "Editar Opção";
        $dados["view"]     = "opcao/alterar";
        $dados["opcao"]  = $opcao;
        $this->load->view('template',$dados);
    }
}
?>
