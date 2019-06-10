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

		//echo '<pre>';
		//print_r($lista); exit();

		if ($lista == NULL) {
		 	$this->session->set_flashdata('Error', 'SEUS DADOS NÃO FORAM ENCONTRADOS, VERIFIQUE E TENTE NOVAMENTE!');

			redirect(base_url('EsqueciSenha'));
		} else {
			foreach ($lista as $key => $l) {
				$Nome = $lista[$key]['nome_colab'].' '.$lista[$key]['sobrenome_colab'];
				$To = $lista[$key]['email_colab'];
				$id = base64_encode($lista[$key]['id_colab']);
				$NameUrl = base64_encode($lista[$key]['nome_colab']);
				$Subject = "Solicitação de troca de senha.";
				
				$Message= "<html charset='utf-8'> 
							<div style='width: 90%; margin: 0 auto; border: 0 solid; border:1px solid #007BFF; margin:5px;'>
								<div style='padding: 10px 10px 0 10px;'>
									<img src='http://admin.triobagunca.com.br/assets/img/logo_sistema_email.png' style='width: 150px; text-align: center; margin-top: 15px;'>
									<img src='http://admin.triobagunca.com.br/assets/img/logo-trio.png' style='width: 100px; text-align: center; float: right;'>
								</div>
								<p style='font-size: 22px; height: 25px; padding: 15px 0 15px 0; background-color:#007BFF; color: #ffffff; text-align: center; font-weight: bold;'>Solicitação de Redefinição de Senha</p>
								<p style='padding: 10px; font-size: 14px;'>
								Olá ".$lista[$key]['nome_colab']."! <br />
								Registramos um pedido de redefinição de senha. Caso você não tenha feito essa solicitação, por favor, desconsiderar este e-mail. Caso tenha solicitado a redefinição, clique no botão a baixo ou copie e cole o link em seu navegador.
								<br />
								<br />
								Link de acesso: <a href='http://admin.triobagunca.com.br/AlterarMinhaSenha?eman=".$NameUrl."&id=".$id."'> Alterar Senha </a>
								</p>
							</div>
						</html>";

				//$Message = $html;
				
				//É necessário indicar que o formato do e-mail é html
				$Headers  = 'MIME-Version: 1.0' . "\r\n";
			    $Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			    $Headers .= 'From: '."Trio Bagunça <noreply@triobagunca.com.br>";
			   	//$Headers .= "Bcc: $EmailPadrao\r\n";
					
				$Enviado = mail($To, $Subject, $Message, $Headers);

				if ($Enviado) {
					$this->session->set_flashdata('Success', 'Solicitação de nova senha enviada com sucesso! <br />Caso o e-mail não esteja em sua caixa de entrada, verifique no <b>lixo eletronico</b> ou no <b>spam</b>!');
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
