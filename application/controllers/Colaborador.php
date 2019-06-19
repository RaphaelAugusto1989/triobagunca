<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function AutenticaLogin()	{
		date_default_timezone_set('America/Sao_Paulo');

		$login = $this->input->post('login');
		$pass = md5($this->input->post('password'));

		$this->load->model('UserSystem_model');
	    $user = $this->UserSystem_model->OpenUser($login, $pass);

	    if(!empty($user)){
	    	$acesso = NULL;
	    	$idColab = $user[0]->id_colab;


	    	$this->load->model('Colaborador_model');
	    	$acesso = $this->Colaborador_model->VerAcessos($idColab);

	    	//echo '<pre>';
	    	//print_r($acesso); exit();

	    	if ($acesso == NULL) {
	    		$idColab = base64_encode($user[0]->id_colab);
	    		$nome = base64_encode($user[0]->nome_colab);
	    		redirect(base_url('Colaborador/AlterarSenhaPrimeiroAcesso?id='.$idColab.'&eman='.$nome));

	    	} else {
				$this->session->set_userdata('IdUser', $user[0]->id_colab);
	            $this->session->set_userdata('nome', $user[0]->nome_colab);
	            $this->session->set_userdata('sexouser', $user[0]->sexo_colab);
	            $this->session->set_userdata('foto', $user[0]->foto_colab);
	            
	            $IcColab = $user[0]->id_colab;
	            $NomeColab = $user[0]->nome_colab.' '.$user[0]->sobrenome_colab;
	            $IpOperadora = $_SERVER["REMOTE_ADDR"];
	            $NomeOperadora = gethostbyaddr($IpOperadora);
	            $DataAcesso = date('Y-m-d');
	            $HoraAcesso = date('H:i:s');

	            $acesso = array (
	            	'id_colab' => $IcColab,
	            	'nome_colab' => $NomeColab,
	            	'ip_acesso' => $IpOperadora,
	            	'nome_operadora' => $NomeOperadora,
	            	'data_acesso' => $DataAcesso,
	            	'hora_acesso' => $HoraAcesso,
	            );

	            $this->UserSystem_model->InsertAcesso($acesso);

	            redirect(base_url('Home'));
        	}//FIM VERIFICA PRIMEIRO ACESSO

		} else {
			$this->session->set_flashdata('msgErro', 'Usuário ou Senha Inválidos!');
			redirect(base_url('Login'));
		}	
	}

	public function AlterarSenhaPrimeiroAcesso() {
		$dados = array('titulo' => 'Meu Primeiro Acesso');

		$this->load->view('AlterarSenhaPrimeiroAcesso');
	}

	public function AlteraPrimeiroAcesso() {
		$SenhaAntiga = $this->input->post('antiga');
		$Senha1 = $this->input->post('senha1');
		$Senha2 = $this->input->post('senha2');

		$dados = array('titulo' => 'Meu Primeiro Acesso');

		$this->load->view('AlterarSenhaPrimeiroAcesso');
	}

	public function AcessosAoSistema() {
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->model('UserSystem_model');
		$lista = $this->UserSystem_model->MostraAcessos();

		$dados = array('titulo' => 'Acessos Ao Sistema', 'ColabAcesso' => $lista);

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('AcessosAoSistema', $dados);
		$this->load->view('footer');
	}

	public function DetalheAcessosColaborador() {
		$idColab = $this->uri->segment(3);

		$this->load->model('UserSystem_model');
		$lista = $this->UserSystem_model->MostraDetalhesAcessos($idColab);

		$dados = array('titulo' => "Detalhe dos Acessos", 'acessos' => $lista);

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('DetalheAcessosColaborador', $dados);
		$this->load->view('footer');
	}

	public function ColaboradorCadastro() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		$dados['msg'] = $msg;
		$dados['titulo'] = 'Cadastro do Colaborador';
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradorCadastro', $dados);
		$this->load->view('footer');
	}

	public function NovoColaborador() {
		$VerifyCPF = $this->input->post('cpf');
		$VerifyEmail = $this->input->post('email');
		$VerifyLogin = $this->input->post('login');

		$this->load->model('Colaborador_model');
		$Verification = $this->Colaborador_model->VerifyColaborador($VerifyCPF, $VerifyEmail, $VerifyLogin);

		foreach ($Verification as $key => $v) {

			if ($Verification[$key]->cpf_colab == $VerifyCPF) {
				$this->session->set_flashdata('Error', 'CPF já cadastrado!');
				redirect(base_url('ColaboradorCadastro'));
			}
			if ($Verification[$key]->email_colab == $VerifyEmail) {
				$this->session->set_flashdata('Error', 'E-mail já cadastrado!');
				redirect(base_url('ColaboradorCadastro'));
			}
			if ($Verification[$key]->login_colab == $VerifyLogin) {
				$this->session->set_flashdata('Error', 'Login já cadastrado!');
				redirect(base_url('ColaboradorCadastro'));
			}
		}
		
		$colaborador = array(
			'nome_colab' => $this->input->post('nome'),
			'sobrenome_colab' => $this->input->post('sobrenome'),  
			'funcao_colab' => $this->input->post('funcao'),
			'cpf_colab' => $this->input->post('cpf'),
			'nasc_colab' => date('Y-m-d', strtotime($this->input->post('nascimento'))),
			'sexo_colab' => $this->input->post('sexo'),
			'cep_colab' => $this->input->post('cep'),
			'rua_colab' => $this->input->post('rua'),
			'cidade_colab' => $this->input->post('cidade'),
			'bairro_colab' => $this->input->post('bairro'),
			'estado_colab' => $this->input->post('estado'),
			'complemento_colab' => $this->input->post('complemento'),
			'fixo_colab' => $this->input->post('fixo'),
			'cel_colab' => $this->input->post('cel'),
			'email_colab' => $this->input->post('email'),
			'login_colab' => $this->input->post('login'),
			'senha_colab' => md5($this->input->post('password')),
		);
		
		$this->load->model('Colaborador_model');
		$this->Colaborador_model->SaveColaborador($colaborador);

		if (!empty($colaborador)) {
			$Nome = $colaborador['nome_colab'].' '.$colaborador['sobrenome_colab'];
			$To = $colaborador['email_colab'];
			$Login = $colaborador['login_colab'];
			$senha = $this->input->post('password');
			$Subject = "Bem Vindo, você foi cadastrado ao sistema!";

			if ($this->input->post('sexo') == 'MASCULINO')
				$Cad = 'Cadastrado';
			else {
				$Cad = 'Cadastrada';
			}
			
			$Message= "<html charset='utf-8'>
						<center style='width: 100%; background-color: #F3F2F1; padding: 30px 0 30px 0;'> 
							<div style='width: 70%; margin: 0 auto; border: 0 solid; border:1px solid #007BFF; margin:5px; text-align: left; background-color: #FFFFFF;'>
								<div style='padding: 10px 10px 0 10px;'>
									<img src='http://admin.triobagunca.com.br/assets/img/logo_sistema_email.png' style='width: 150px; text-align: center; margin-top: 15px;'>
									<img src='http://admin.triobagunca.com.br/assets/img/logo-trio.png' style='width: 100px; text-align: center; float: right;'>
								</div>
								<p style='font-size: 22px; height: 25px; padding: 15px 0 15px 0; background-color:#007BFF; color: #ffffff; text-align: center; font-weight: bold;'>DADOS DE ACESSO</p>
								<p style='padding: 10px; font-size: 14px;'>
								Olá ".$Nome."! <br />
								Parabéns, você foi ".$Cad." no sistema, agora você pode verificar os eventos que vai participar!<br />
								<br />
								Abaixo segue seus dados de acesso:<br />
								<b>Login:</b> ".$Login." <b>ou</b> ".$To."<br />
								<b>Senha:</b> ".$senha."<br />
								<br />
								Link de acesso: <a href='http://admin.triobagunca.com.br/' target='_blank'> http://admin.triobagunca.com.br/ </a>
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
			$this->session->set_flashdata('Success', 'Colaborador Cadastrado com Sucesso');
			redirect(base_url('ColaboradorCadastro'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('ColaboradorCadastro'));
		}
	}

	public function AlterarColaborador() {
		$id = $this->input->post('id');
		$pass = $this->input->post('password');

		if (empty($pass)) {
			$colaborador = array(
				'nome_colab' => $this->input->post('nome'),
				'sobrenome_colab' => $this->input->post('sobrenome'),  
				'funcao_colab' => $this->input->post('funcao'),
				'cpf_colab' => $this->input->post('cpf'),
				'nasc_colab' => date('Y-m-d', strtotime($this->input->post('nascimento'))),
				'sexo_colab' => $this->input->post('sexo'),
				'cep_colab' => $this->input->post('cep'),
				'rua_colab' => $this->input->post('rua'),
				'cidade_colab' => $this->input->post('cidade'),
				'bairro_colab' => $this->input->post('bairro'),
				'estado_colab' => $this->input->post('estado'),
				'complemento_colab' => $this->input->post('complemento'),
				'fixo_colab' => $this->input->post('fixo'),
				'cel_colab' => $this->input->post('cel'),
				'email_colab' => $this->input->post('email'),
				'login_colab' => $this->input->post('login'),
			);
		} else {
			$colaborador = array(
				'nome_colab' => $this->input->post('nome'),
				'sobrenome_colab' => $this->input->post('sobrenome'),  
				'funcao_colab' => $this->input->post('funcao'),
				'cpf_colab' => $this->input->post('cpf'),
				'nasc_colab' => date('Y-m-d', strtotime($this->input->post('nascimento'))),
				'sexo_colab' => $this->input->post('sexo'),
				'cep_colab' => $this->input->post('cep'),
				'rua_colab' => $this->input->post('rua'),
				'cidade_colab' => $this->input->post('cidade'),
				'bairro_colab' => $this->input->post('bairro'),
				'estado_colab' => $this->input->post('estado'),
				'complemento_colab' => $this->input->post('complemento'),
				'fixo_colab' => $this->input->post('fixo'),
				'cel_colab' => $this->input->post('cel'),
				'email_colab' => $this->input->post('email'),
				'login_colab' => $this->input->post('login'),
				'senha_colab' => md5($this->input->post('password')),
			);
		}

		$this->load->model('Colaborador_model');
		$this->Colaborador_model->AlteraColaborador($id, $colaborador);

		if (!empty($colaborador)) {
			$this->session->set_flashdata('Success', 'Colaborador Alterado com Sucesso');
			redirect(base_url('Colaborador/DetalheColaborador/'.$id));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('Colaborador/DetalheColaborador/'.$id));
		}
	}

	public function ColaboradoresCadastrados()	{
		$dados['titulo'] = 'Colaboradores Cadastrados';

		$this->load->model('Colaborador_model');
		$ContColab = $this->Colaborador_model->MostraColaborador();

		$NumReg = 8; #QTD DE REGISTROS A SER MOSTRADO POR PÁGINA

		$pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
		$Inicial = ($pg * $NumReg) - $NumReg;

		$TotalReg = count($ContColab);

		$lista = $this->Colaborador_model->MostraQtdRegColaborador($Inicial, $NumReg);

		$Colaborador =  array('colaborador' => $lista, 'TotalReg' => $TotalReg, 'NumReg' => $NumReg, 'pg' => $pg, 'url' => 'ColaboradoresCadastrados');

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradoresCadastrados', $Colaborador);
		$this->load->view('pagination', $Colaborador);
		$this->load->view('footer');
	}

	public function ExcluirColaborador() {
		$id = $this->input->get('id');
		#$id = $this->uri->segment(3);
		$this->load->model('Colaborador_model');
		$true = $this->Colaborador_model->DeletaColaborador($id);

		if ($true == true) {
			echo "<script> alert ('COLABORADOR EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('ColaboradoresCadastrados')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR O CLIENTE, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('ColaboradoresCadastrados')</script>";
		}
	}

	public function DetalheColaborador() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$dados['titulo'] = 'Detalhe do Colaborador';

		$id = $this->uri->segment(3);
		$this->load->model('Colaborador_model');
		$idcolab = $this->Colaborador_model->RetornaIdColaborador($id);
		$clb = array('clb' => $idcolab);
		$clb['msg'] = $msg;
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradorAlterar', $clb);
		$this->load->view('footer');
	}

	public function MeusDados() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$dados['titulo'] = 'Meus Dados';

		$id = $this->session->userdata('IdUser');
		$this->load->model('Colaborador_model');
		$idcolab = $this->Colaborador_model->RetornaIdColaborador($id);
		$clb = array('clb' => $idcolab);
		$clb['msg'] = $msg;
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('MeusDados', $clb);
		$this->load->view('footer');
	}

	public function MeusEventos(){
		$idColab = $this->session->userdata('IdUser');
		$this->load->model('Colaborador_model');
		$ListaColab = $this->Colaborador_model->MostraAgendaColab($idColab);
		$ListaMenus = $this->menu->PermissaoMenus();
		
		$lista = array();

		foreach ($ListaColab as $indice => $ic) {
			#$idEvento = $ListaColab[$indice]->fk_id_evento;
			$idEvento = $ic->fk_id_evento;
			$this->load->model('Agenda_model');
			$dadosEveto = $this->Agenda_model->MostraEventoColab($idEvento);
			array_push($lista,$dadosEveto);	
		}

		$dados =  array('evento' => $lista, 'titulo' => 'Meus Eventos Disponiveis');

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('MeusEventos', $dados);
		$this->load->view('footer');
	}

	public function AlterarMeusDados () {
        $id = $this->input->post('id');
        $namefoto = $this->input->post('nome_foto');
        $pass = md5($this->input->post('password'));

        $config['allowed_types'] = "jpg|jpeg|png";
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        if (empty($namefoto)) {
            $caminhoCompleto = "assets/img/fotos_usuarios/".$_FILES["foto"]["name"];
            $tipoArquivo = pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
            $novo_nome = "user".$id."_".date("dmYhis").".".$tipoArquivo;
            $caminhoCompleto2 = "assets/img/fotos_usuarios/".$novo_nome;

            if(move_uploaded_file($_FILES["foto"]["tmp_name"],$caminhoCompleto)){
                rename($caminhoCompleto,  $caminhoCompleto2);
            }

        } else {
            $caminhoCompleto = "assets/img/fotos_usuarios/".$_FILES["foto"]["name"];
            $tipoArquivo = pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
            $novo_nome = $namefoto;
            $caminhoCompleto2 = "assets/img/fotos_usuarios/".$novo_nome;

            if(move_uploaded_file($_FILES["foto"]["tmp_name"],$caminhoCompleto)){
                rename($caminhoCompleto,  $caminhoCompleto2);
            }
        }
			if (empty($pass)) {
				$colaborador = array(
					'foto_colab' => $novo_nome,
					'cep_colab' => $this->input->post('cep'),
					'rua_colab' => $this->input->post('rua'),
					'cidade_colab' => $this->input->post('cidade'),
					'bairro_colab' => $this->input->post('bairro'),
					'estado_colab' => $this->input->post('estado'),
					'complemento_colab' => $this->input->post('complemento'),
					'fixo_colab' => $this->input->post('fixo'),
					'cel_colab' => $this->input->post('cel'),
					'email_colab' => $this->input->post('email'),
					'login_colab' => $this->input->post('login'),				
				);
			} else {
				$colaborador = array(
                    'foto_colab' => $novo_nome,
					'cep_colab' => $this->input->post('cep'),
					'rua_colab' => $this->input->post('rua'),
					'cidade_colab' => $this->input->post('cidade'),
					'bairro_colab' => $this->input->post('bairro'),
					'estado_colab' => $this->input->post('estado'),
					'complemento_colab' => $this->input->post('complemento'),
					'fixo_colab' => $this->input->post('fixo'),
					'cel_colab' => $this->input->post('cel'),
					'email_colab' => $this->input->post('email'),
					'login_colab' => $this->input->post('login'),
					'senha_colab' => $pass,
				);
			}

		$this->load->model('Colaborador_model');
		$this->Colaborador_model->AlteraColaborador($id, $colaborador);

		if (!empty($colaborador)) {
			$msg = $this->session->set_flashdata('Success', 'Alterado com Sucesso');
			redirect(base_url('Colaborador/MeusDados/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('MeusDados/'.$id));
		}
	}

	public function PermissaoColaborador () {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

	    $dados['dadospacote'] = array("id_user"=>$this->input->post('id_user'));
	    $this->load->model('Colaborador_model');
	    $ListaPermissao = $this->Colaborador_model->MostraPermissao();
	    $ListaMenus = $this->menu->PermissaoMenus();

	    $dados = array('perm' => $ListaPermissao, 'titulo' => 'Permissões de Usuário', 'msg' => $msg);

        $this->load->view('header', $dados);
	    $this->load->view('menu', $ListaMenus);
	    $this->load->view('ColaboradorPermissaoSistema', $dados);
	    $this->load->view('footer');
    }

    public function InsertPermissaoColaborador (){
    	$idColab = $this->input->post('idcolab');

        $permission = array (
        	'nome_colab' => $this->input->post('nome_colab'),
            'id_colab' => $idColab,
            'permission1' => $this->input->post('permission1'),
            'permission2' => $this->input->post('permission2'),
            'permission3' => $this->input->post('permission3'),
            'permission4' => $this->input->post('permission4'),
            'permission5' => $this->input->post('permission5'),
            'permission6' => $this->input->post('permission6'),
            'permission7' => $this->input->post('permission7'),
            'permission8' => $this->input->post('permission8'),
        );

        $this->load->model('Colaborador_model');
        $ColabId = $this->Colaborador_model->RetornaIdColabPermissao($idColab);

        //echo '<pre>'; print_r($ColabId); exit();
        if ($ColabId['id_colab'] == $idColab) {
        	$msg = $this->session->set_flashdata('Error', 'Este Colaborador já tem Permissão no sistema! ');
			redirect(base_url('ColaboradorPermissaoSistema'));
        }

        #AUTOCOMPLETE
        if(isset($_GET['term'])) {
            $this->load->model('Colaborador_model');
            $lista = $this->Colaborador_model->AutoCompleteColaborador($_GET['term']);
            $arr_lista = array();
            if (!empty($lista)) {
            	#echo'RESULTADO: <pre>';print_r($lista);exit;
                foreach ($lista as $nome) {
                    $resultado = array("label" => $nome->nome_colab.' '.$nome->sobrenome_colab,
                    "value" => $nome->nome_colab.' '.$nome->sobrenome_colab,
                    "id"=>$nome->id_colab);
                    array_push($arr_lista, $resultado);
                }
                echo  json_encode($arr_lista); exit;
            }
		}

        $this->load->model('Colaborador_model');
        $this->Colaborador_model->SavePermissionSystem($permission);

        if (!empty($permission)) {
			$msg = $this->session->set_flashdata('Success', 'Dado a permissão para o usuário com sucesso!');
			redirect(base_url('ColaboradorPermissaoSistema'));
			#redirect(base_url('Colaborador/PermissaoColaborador/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('ColaboradorPermissaoSistema'));
			#redirect(base_url('DetalheUser/'.$id));
		}
    }

    public function DetalhePermissao () {
    	$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

    	$idPermission = $this->uri->segment(3);

    	$this->load->model('Colaborador_model');
    	$lista = $this->Colaborador_model->MostraDetalhePermissao($idPermission);
    	$dados = array('titulo' => 'Permissões', 'perm' => $lista, 'msg' => $msg);
    	$ListaMenus = $this->menu->PermissaoMenus();

    	$this->load->view('header', $dados);
    	$this->load->view('menu', $ListaMenus);
    	$this->load->view('DetalhePermissao', $dados);
    	$this->load->view('footer');
    }

    public function AlterarPermissao () {
    	$idPermission = $this->input->post('idperm');
    	$permission = array (
            'permission1' => $this->input->post('permission1'),
            'permission2' => $this->input->post('permission2'),
            'permission3' => $this->input->post('permission3'),
            'permission4' => $this->input->post('permission4'),
            'permission5' => $this->input->post('permission5'),
            'permission6' => $this->input->post('permission6'),
            'permission7' => $this->input->post('permission7'),
            'permission8' => $this->input->post('permission8'),
        );

    	$this->load->model('Colaborador_model');
    	$lista = $this->Colaborador_model->AlteraPermissao($idPermission, $permission);

    	 if (!empty($permission)) {
			$msg = $this->session->set_flashdata('Success', 'Permissões do usuário alterada com sucesso!');
			redirect(base_url('Colaborador/DetalhePermissao/'.$idPermission));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalhePermissao/'.$idPermission));
		}
    }

    public function ExcluirPermissao() {
		$id = $this->input->get('id');
		#$id = $this->uri->segment(3);
		$this->load->model('Colaborador_model');
		$true = $this->Colaborador_model->DeletaPermissao($id);

		if ($true == true) {
			echo "<script> alert ('PERMISSÃO EXCLUÍDA COM SUCESSO!') </script>";
			echo "<script> location.href=('../ColaboradorPermissaoSistema')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR PERMISSÃO, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('../DetalhePermissao/'.$id)</script>";
		}
	}

    public function Indisponibilidade() {
    	$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$id = $this->session->userdata('IdUser');

		$this->load->model('Colaborador_model');
		$ColabInd = $this->Colaborador_model->MostraIndisponibilidade($id);
		$idcolab = $this->Colaborador_model->RetornaIdColaborador($id);
		$dados = array('titulo' => 'Indisponibilidades', 'msg' => $msg, 'ind' => $ColabInd, 'clb' => $idcolab);

		$ListaMenus = $this->menu->PermissaoMenus();

    	$this->load->view('header', $dados);
    	$this->load->view('menu', $ListaMenus);
    	$this->load->view('ColaboradorIndisponibilidade', $dados);
    	$this->load->view('footer');
    }

    public function InsertIndisponibilidade() {
		$idColab = $this->input->post('idcolab');
		$NomeColab = $this->input->post('nomecolab');
		$DataHoje = $this->input->post('datahoje');
		$DataInicial = $this->input->post('datainicial');
	    #$DataFinal = $this->input->post('datafinal');
	    $motivo = $this->input->post('motivo');

	    foreach ($DataInicial as $key => $date) {
			$Mes = date('m', strtotime($DataInicial[$key]));
	    	$Ano = date('Y', strtotime($DataInicial[$key]));
	    }
	    
		$SomaData = date('Y/m/d', strtotime($DataHoje. '+ 15 days'));

		$this->load->model('Colaborador_model');

		foreach($DataInicial as $indice => $inicio){
			$indisponibilidades = array (
	    		'id_colab' => $idColab,
	    		'nome_colab' => $NomeColab,
	    		'data_cadastrado' => $DataHoje,
	    		'data_inicial' => $DataInicial[$indice],
	    		#'data_final' => $DataFinal[$indice],
	    		'data_soma' => $SomaData,
	    		'mes_ind' => $Mes,
	    		'ano_ind' => $Ano,
	    		'motivo_ind' => $motivo[$indice],
    		);
    		$this->Colaborador_model->SaveIndisponibilidade($indisponibilidades);
		}

		$SomaData = str_replace("/","", $SomaData);
		$inicial  = str_replace("-","",  $DataInicial[0]); 

		if ($inicial <= $SomaData) {
				$msg = $this->session->set_flashdata('Error', 'AVISO: Você cadastrou sua indisponibilidade com 15 dias ou menos da data inicial, isso ocorrerá como falta!');
				redirect(base_url('ColaboradorIndisponibilidade/'.$id));
		} 
		
		if (!empty($indisponibilidades)) {
			$msg = $this->session->set_flashdata('Success', 'Indisponiblidade Cadastradas com Sucesso');
			redirect(base_url('ColaboradorIndisponibilidade/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('ColaboradorIndisponibilidade/'.$id));
		}
    }

    public function ExcluirIndisponibilidade() {
		$id = $this->input->get('id');
		#$id = $this->uri->segment(3);
		$this->load->model('Colaborador_model');
		$true = $this->Colaborador_model->DeletaIndisponibilidade($id);

		if ($true == true) {
			echo "<script> alert ('EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('Indisponibilidade')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('Indisponibilidade')</script>";
		}
	}

	public function ColaboradoresIndisponiveis()	{
		$MesAtual = date('m');
		$AnoAtual = date('Y');

		$this->load->model('Colaborador_model');
		$ContInd = $this->Colaborador_model->MostraTodasIndisponibilidades($MesAtual, $AnoAtual);

		$ColabDados = $this->Colaborador_model->MostraColaborador();

		$NumReg = 8; #QTD DE REGISTROS A SER MOSTRADO POR PÁGINA

		$pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
		$Inicial = ($pg * $NumReg) - $NumReg;

		$TotalReg = count($ContInd);

		$lista = $this->Colaborador_model->MostraQtdRegInd($MesAtual, $AnoAtual, $Inicial, $NumReg);

		$dados =  array('titulo' => 'Colaboradores Indisponiveis', 'colaborador' => $lista, 'dadoscolab' => $ColabDados, 'TotalReg' => $TotalReg, 'NumReg' => $NumReg, 'pg' => $pg, 'url' => 'ColaboradoresIndisponiveis');

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradoresIndisponiveis', $dados);
		$this->load->view('pagination', $dados);
		$this->load->view('footer');
	}

	public function ColaboradoresIndisponiveisPorMes()	{
		$Mes = $this->uri->segment(3);
		$MesAtual = date('m');
		$AnoAtual = date('Y');

		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->MostraTodasIndisponibilidadesPorMes($Mes, $AnoAtual);

		$ColabDados = $this->Colaborador_model->MostraColaborador();

		$dados =  array('titulo' => 'Colaboradores Indisponiveis', 'colaborador' => $lista, 'dadoscolab' => $ColabDados);

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradoresIndisponiveis', $dados);
		//$this->load->view('pagination', $dados);
		$this->load->view('footer');
	}

	public function DetalheIndisponibilidade() {
		$IdInd = $this->uri->segment(3);
		$this->load->model('Colaborador_model');
		$Lista = $this->Colaborador_model->MostraDetalheIndisponibilidade($IdInd);

		foreach ($Lista as $key => $idCol) {
			$id = $Lista[$key]['id_colab'];
		}

		$idcolab = $this->Colaborador_model->RetornaIdColaborador($id);

		$ListaMenus = $this->menu->PermissaoMenus();
		
		$dados = array('ind' => $Lista, 'titulo' => "Detalhe da Indisponibilidade", 'DadosColab' => $idcolab);

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('DetalheIndisponibilidade', $dados);
		$this->load->view('footer');
	}


	public function PesquisarColaborador() {
		$pesquisa = $this->input->post('pesquisa');

		$this->load->model('Colaborador_model');
		$Lista = $this->Colaborador_model->PesquisaColaborador($pesquisa);

		$ContColab = $this->Colaborador_model->MostraColaborador();
		$TotalReg = count($ContColab);

		$dados = array('titulo' => 'Colaborador Encontrado', 'colaborador' => $Lista, 'TotalReg' => $TotalReg);

		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradoresCadastrados', $dados);
		$this->load->view('footer');
	}
}
