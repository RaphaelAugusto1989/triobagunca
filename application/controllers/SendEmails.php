<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmails extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
		//$this->load->library('email');
	}

	public function EsqueciSenha()	{
		$msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('titulo' => 'Esqueci Senha', 'msg' => $msg);
		$this->load->view('EsqueciSenha', $dados);
	}

	public function EnviaLinkSenha() {
		$lista = NULL;
		$Email = $this->input->post('email');
		$cpf = $this->input->post('cpf');

		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->EsqueciSenha($cpf, $Email);

		if ($lista == NULL) {
		 	$this->session->set_flashdata('Error', 'SEUS DADOS NÃO FORAM ENCONTRADOS, VERIFIQUE E TENTE NOVAMENTE!');

			redirect(base_url('EsqueciSenha'));
		} else {
			foreach ($lista as $key => $l) {
				$Nome = $lista[$key]['nome_colab'].' '.$lista[$key]['sobrenome_colab'];
				$Email = $lista[$key]['email_colab'];

				

				$this->load->library('email');

				$this->email->from('raphael1989@gmail.com', 'Trio Bagunça');
				$this->email->to('raphael.a.a.p@gmail.com');
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');

				$enviado = $this->email->send();

				//$this->load->library('email');
				//$this->email->initialize($config);
				//$this->email->from('raphael1989@gmail.com', 'Trio Bagunça'); //DE:
				//$this->email->to($Email); #Para:
				//$this->email->subject('Teste envio de E-mail'); #Assunto:
				//$this->email->message('E-mail enviado com sucesso!'); #Corpo do e-mail

				//$enviado = $this->email->send();

				if ($enviado == true) {
					$this->session->set_flashdata('Success', 'Link para resetar a senha enviado com sucesso!');
					redirect(base_url('EsqueciSenha'));
				} else {
					$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
					redirect(base_url('EsqueciSenha'));
				}
			}//FIM FOREACH

		}//FIM IF $LISTA

	}	
}
