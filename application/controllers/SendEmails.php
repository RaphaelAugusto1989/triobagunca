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
							<center style='width: 100%; background-color: #F3F2F1; padding: 30px 0 30px 0;'> 
								<div style='width: 70%; margin: 0 auto; border: 0 solid; border:1px solid #007BFF; margin:5px; text-align: left; background-color: #FFFFFF;'>
									<div style='padding: 10px 10px 0 10px;'>
										<img src='http://admin.triobagunca.com.br/assets/img/logo_sistema_email.png' style='width: 150px; text-align: center; margin-top: 15px;'>
										<img src='http://admin.triobagunca.com.br/assets/img/logo-trio.png' style='width: 100px; text-align: center; float: right;'>
									</div>
									<p style='font-size: 22px; height: 25px; padding: 15px 0 15px 0; background-color:#007BFF; color: #ffffff; text-align: center; font-weight: bold;'>SOLICITAÇÃO DE REDEFINIÇÃO DE SENHA</p>
									<p style='padding: 10px; font-size: 14px;'>
									Olá ".$lista[$key]['nome_colab']."! <br />
									Registramos um pedido de redefinição de senha. Caso você não tenha feito essa solicitação, por favor, desconsiderar este e-mail. Caso tenha solicitado a redefinição, clique no botão a baixo ou copie e cole o link em seu navegador.
									<br />
									<br />
									Link de acesso: <a href='http://admin.triobagunca.com.br/AlterarMinhaSenha?eman=".$NameUrl."&id=".$id."'> Alterar Senha </a>
									</p>
								</div>
							</center>
						</html>";
			
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

	public function EnviarSenhas() {
		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->MostraColaborador();

		$total = count($lista);
		echo 'Total de Colaboradores: <b>' .$total. '</b><br /><br />';
		foreach ($lista as $key => $lt) {
			$alter = 'ALTERADOOOOOOOOOOOO!';

			$teste = array(
					'foto_colab' => $alter,
			);

			$this->Colaborador_model->TesteColaborador($teste);
			echo '<ol>';
			while ($teste == TRUE) { 
				echo '<li><b> '.$lista[$key]['nome_colab']. '</b> - <b style="color: #00c409;">Alterado com sucesso</b></li>';
				//echo $lista[$key]['email_colab']. '<br />';
				break;
			}
			echo '</ol>';

		}
	}

}
