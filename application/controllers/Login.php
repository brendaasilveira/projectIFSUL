<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
		$this->load->helper('security');
	}
	public function index(){
		$data['titulo'] = 'Login';
		$this->load->view('usuarios/login',$data);
	}
	public function login(){
		$this->form_validation->set_rules('lg_usuario','Usuário','trim|required|max_length[16]');
		$this->form_validation->set_rules('ds_senha','Senha','trim|required|max_length[11]');
		if ($this->form_validation->run() == TRUE) {
			$lg_usuario = $this->input->post('lg_usuario');
			$ds_senha = $this->input->post('ds_senha');
			$login = $this->login_model->login($lg_usuario, $ds_senha);
			$tipo = '';
			if($login){
				if ($login->us_cods == 2) {
					$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert"> Você não tem acesso ao sistema</div>');
					redirect('login');
				}
				if ($login->us_codt == 1) {
					$tipo = 'aluno';
				}
				if ($login->us_codt == 2) {
					$tipo = 'servidor';
				}
				if ($login->us_codt == 3) {
					$tipo = 'servidoradm';
				}
				$dadosAcesso = [
					'logado' => TRUE,
					'id_usuario'=>$login->id_usuario,
					'nm_usuario' => $login->nm_usuario,
					'lg_usuario' => $login->lg_usuario,
					'tipo_usuario'=> $tipo
				];
				$this->session->set_userdata($dadosAcesso);
				if($this->session->userdata('logado')){
					$this->session->set_flashdata('msg_login', '<div class="alert alert-success" role="alert"> Seja Bem-Vindo, <strong>'.$this->session->userdata('nome'). '</strong> </div>');
					redirect('menu');
				}else{
					$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert"> Erro ao logar no sistema</div>');
					redirect('login');
				}
			}
			redirect('login');
		}
	}
	public function sair(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>
