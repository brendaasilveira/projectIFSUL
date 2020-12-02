<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->library('form_validation');
        $this->load->helper('array');
				$this->load->helper('security');
    }
    public function index(){
				if(($this->session->userdata('tipo_usuario') == 'servidoradm')){
				$dados["titulo"] = "Habilitar Usuário";
				$dados["view"] = "servidoradm/habilitar";
				$dados["usuarios"] = $this->usuarios_model->listar_usuarios();
				$this->load->view('template', $dados);
				}else{
				$dados['alert'] = "danger";
				$dados['mensagem'] = "Acesso negado";
				$this->session->set_flashdata('msg',$dados);
				redirect('menu');
			}
		}
    public function cadastrar(){
        $this->form_validation->set_rules('lg_usuario','Usuário','trim|required|max_length[17]|is_unique[tb_usuario.lg_usuario]');
        $this->form_validation->set_rules('nm_usuario','Nome:','trim|required|max_length[200]|alpha_numeric_spaces');
        $this->form_validation->set_rules('dt_nascimento','Data de nascimento','trim|required');
        $this->form_validation->set_rules('ds_senha','Senha:','trim|max_length[11]|alpha_numeric|matches[ds_senha1]');
        $this->form_validation->set_rules('ds_senha1','Confirmar senha:','trim|max_length[11]|alpha_numeric|matches[ds_senha]');
        $this->form_validation->set_rules('ds_email','Email:','trim|required|max_length[200]|valid_email');
        $this->form_validation->set_rules('us_codt','Tipo de usuario:','trim|required');
        $this->form_validation->set_message('required','O Campo %s é obrigatório');
				$this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
        $this->form_validation->set_message('alpha_numeric','O Campo %s é exige números e letras');
        $this->form_validation->set_message('matches','Os Campos %s precisam ser iguais');
				$this->form_validation->set_message('valid_email','O Campo %s é inválido');
				$this->form_validation->set_message('is_unique','O nome de usuário %s já existe ');
        if($this->form_validation->run()==TRUE):
						$dados = elements(array('lg_usuario','nm_usuario', 'dt_nascimento', 'ds_senha', 'ds_email', 'us_codt'), $this->input->post());
            if($this->usuarios_model->do_insert($dados)){
                $dados['alert'] = "success";
                $dados['mensagem'] = "Usuário cadastrado com sucesso!";
                $this->session->set_flashdata('msg',$dados);
            }else{
                $dados['alert'] = "danger";
                $dados['mensagem'] = "Erro ao cadastrar o usuario!";
                $this->session->set_flashdata('msg',$dados);
            }
        endif;
						$dados["tb_usuariotipo"] =$this->usuarios_model->buscatodos();
        		$dados["titulo"] = "Cadastro";
        		$dados["view"] = "usuarios/cadastrar";
        		$this->load->view('template',$dados);
    }

	public function editar(){
			$id_usuario = $this->session->userdata('id_usuario');
			if($id_usuario==null) redirect('login');
			$usuarios = $this->usuarios_model->get_byid($id_usuario)->row();

			if(!$usuarios):
				$dados['alert'] = "danger";
				$dados['mensagem'] = "Erro usuário não localizado!";
				$this->session->set_flashdata('msg',$dados);
			endif;

				$this->form_validation->set_rules('lg_usuario','Usuário','trim|required|max_length[17]|is_unique[tb_usuario.lg_usuario]');
				$this->form_validation->set_rules('nm_usuario','Nome:','trim|required|max_length[200]|alpha_numeric_spaces');
				$this->form_validation->set_rules('dt_nascimento','Data de nascimento','trim|required');
				$this->form_validation->set_rules('ds_senha','Senha:','trim|max_length[11]|alpha_numeric|matches[ds_senha1]');
				$this->form_validation->set_rules('ds_senha1','Confirmar senha:','trim|max_length[11]|alpha_numeric|matches[ds_senha]');
				$this->form_validation->set_rules('ds_email','Email:','trim|required|max_length[200]|valid_email');
				$this->form_validation->set_rules('us_codt','Tipo de usuario:','trim|required');
				$this->form_validation->set_message('required','O Campo %s é obrigatório');
				$this->form_validation->set_message('max_length','O Campo %s ultrapassou o limite de caracteres');
				$this->form_validation->set_message('alpha_numeric','O Campo %s é exige números e letras');
				$this->form_validation->set_message('matches','Os Campos %s precisam ser iguais');
				$this->form_validation->set_message('valid_email','O Campo %s é inválido');
				$this->form_validation->set_message('is_unique','O nome de usuário %s já existe ');
				if($this->form_validation->run()==TRUE):
						$dados = elements(array('lg_usuario','nm_usuario', 'dt_nascimento', 'ds_senha', 'ds_email', 'us_codt', 'us_cods'), $this->input->post());
						$id_usuario = $this->input->post('id_usuario');
						$alterou = $this->usuarios_model->do_update($dados, array('id_usuario' => $id_usuario));
						if($alterou){
								$dados['alert'] = "success";
								$dados['mensagem'] = "Registro alterado com sucesso!";
								$dados["usuarios"]  = $usuarios;
								$this->session->set_flashdata('msg',$dados);
						}else{
								$dados['alert'] = "danger";
								$dados['mensagem'] = "Erro ao alterado o registro!";
								$dados["usuarios"]  = $usuarios;
								$this->session->set_flashdata('msg',$dados);
						}
				endif;
				$dados["titulo"]  = "Editar Usuario";
				$dados["view"]    = "usuarios/alterar";
				$dados["usuarios"]  = $usuarios;
				$dados["tb_usuariotipo"] =$this->usuarios_model->buscatodos();
				$this->load->view('template',$dados);
		}
		public function ativo($id_usuario=NULL)
		{
			if (!$id_usuario) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário. </div>');
				redirect('usuarios');
			}
				$query = $this->usuarios_model->getUsuariosId($id_usuario);
				if (!$query) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não foi localizado, tente de novo. </div>');
				redirect('usuarios');
				}
				if ($query->lg_usuario == $this->session->userdata('lg_usuario')) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, nâo é permitido mudar status de usuário logado no sistema. </div>');
				redirect('usuarios');
				}
				$dados['us_cods'] = 1;
				$this->usuarios_model->do_update_situacao($dados, ['id_usuario' => $query->id_usuario]);
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuario foi ativado com sucesso. </div>');
				redirect('usuarios');
		}
		public function inativo($id_usuario=NULL){
			if (!$id_usuario) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário. </div>');
				redirect('usuarios');
			}
				$query = $this->usuarios_model->getUsuariosId($id_usuario);
				if (!$query) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não foi localizado, tente de novo. </div>');
				redirect('usuarios');
			}
				if ($query->lg_usuario == $this->session->userdata('lg_usuario')) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, nâo é permitido mudar status de usuário logado no sistema. </div>');
				redirect('usuarios');
				}
				$dados['us_cods'] = 2;
				$this->usuarios_model->do_update_situacao($dados, ['id_usuario' => $query->id_usuario]);
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuario foi desativado com sucesso. </div>');
				redirect('usuarios');
		}

}
?>
