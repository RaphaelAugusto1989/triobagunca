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
				$To = $lista[$key]['email_colab'];
				$Subject = "Solicitação de troca de senha.";
				$Message = "TESTE ENVIADO COM SUCESSO!";
				
				//É necessário indicar que o formato do e-mail é html
				$Headers  = 'MIME-Version: 1.0' . "\r\n";
			    $Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			    $Headers .= 'From: '."Trio Bagunça <noreply@triobagunca.com.br>";
			   	//$Headers .= "Bcc: $EmailPadrao\r\n";
					
				$Enviado = mail($To, $Subject, $Message, $Headers);

				if ($Enviado) {
					$this->session->set_flashdata('Success', 'Solicitação de nova senha enviada com sucesso!');
					redirect(base_url('EsqueciSenha'));
				} else {
					$this->session->set_flashdata('Error', 'Erro na solicitação, verifique seus dados e tente novamente!');
					redirect(base_url('EsqueciSenha'));
				}
			}//FIM FOREACH

		}//FIM IF $LISTA

	}

	/*public function EnviaLinkSenha() {
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


				$this->email->from("raphael1989@gmail.com", 'Trio Bagunça');
				$this->email->subject("Teste envio de E-mail");
				//$this->email->reply_to("email_de_resposta@dominio.com");
				$this->email->to($Email); 
				//$this->email->cc('email_copia@dominio.com');
				//$this->email->bcc('email_copia_oculta@dominio.com');
				$this->email->message("E-mail teste enviado com sucesso!");
				
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
					$this->session->set_flashdata('Error', $this->email->print_debugger());
					redirect(base_url('EsqueciSenha'));
				}
			}//FIM FOREACH

		}//FIM IF $LISTA

	}*/	
}
