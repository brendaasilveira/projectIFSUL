<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function index(){
		if(($this->session->userdata('tipo_usuario') == 'servidoradm') || ($this->session->userdata('tipo_usuario') == 'servidor') || ($this->session->userdata('tipo_usuario') == 'aluno') ){
		$dados["titulo"] = "Menu";
		$dados["view"] = "usuarios/menu";
		$this->load->view('template', $dados);
		}else{
			$dados['alert'] = "danger";
			$dados['mensagem'] = " Você deve se logar";
			$this->session->set_flashdata('msg',$dados);
			redirect('login');
	}
	}
}
?>
