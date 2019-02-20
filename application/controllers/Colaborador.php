<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
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
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ColaboradorCadastro', $dados);
		$this->load->view('footer');
	}
	
	public function NovoColaborador()	{
		$colaborador = array(
			'nome_colab' => $this->input->post('nome'),
			'sobrenome_colab' => $this->input->post('sobrenome'),  
			'funcao_colab' => $this->input->post('funcao'),
			'cpf_colab' => $this->input->post('cpf'),
			'nasc_colab' => $this->input->post('nascimento'),
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
				'nasc_colab' => $this->input->post('nascimento'),
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
				'nasc_colab' => $this->input->post('nascimento'),
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
		$this->Colaborador_model->SaveColaborador($colaborador);

		if (!empty($colaborador)) {
			$this->session->set_flashdata('Success', 'Colaborador Cadastrado com Sucesso');
			redirect(base_url('ColaboradorCadastro'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('ColaboradorCadastro'));
		}
	}

	public function ColaboradoresCadastrados()	{
		$dados['titulo'] = 'Colaboradores Cadastros';
		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->MostraColaborador();
		$Colaborador =  array('colaborador' => $lista);

		$TotalColab = count($lista);
		$Colaborador["total"] = $TotalColab;

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ColaboradoresCadastrados', $Colaborador);
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
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ColaboradorAlterar', $clb);
		$this->load->view('footer');
	}

	public function AutenticaLogin()	{
		$this->load->model('Colaborador_model');
		$login = $this->input->post('login');
		$pass = md5($this->input->post('password'));
		$user = $this->Colaborador_model->OpenUser($login, $pass);

		if(!empty($user)){
			$this->session->set_userdata('IdUser', $user[0]->id_colab);
            $this->session->set_userdata('nome', $user[0]->nome_colab);
            $this->session->set_userdata('sexouser', $user[0]->sexo_colab);
            $this->session->set_userdata('foto', $user[0]->foto_colab);

//            $SessaoUser = array(
//                'IdUser'   => $user['id_usuario'],
//                'nome'     => $user['nome_usuario'],
//                'sexouser' => $user['sexo_usuario'],
//                'foto'     => $user['foto_usuario']
//            );
            redirect(base_url('Home'));
		} else {
			$this->session->set_flashdata('msgErro', 'Usuário ou Senha Inválidos!');
			redirect(base_url('Login'));
		}	
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
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('MeusDados', $clb);
		$this->load->view('footer');
	}

	public function AlterarMeusDados () {
        $id = $this->input->post('id');
        $namefoto = $this->input->post('nome_foto');
        $pass = $this->input->post('password');


        $config['allowed_types'] = "jpg|jpeg|png";
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        #$this->load->library('upload', $config);

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
					'senha_colab' => $this->input->post('senha'),
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

	    $dados['titulo'] = "Permissões de Usuário";
	    $dados['dadospacote'] = array("id_user"=>$this->input->post('id_user'));

        $this->load->view('header', $dados);
	    $this->load->view('menu');
	    $this->load->view('ColaboradorPermissaoSistema');
	    $this->load->view('footer');
    }

    public function InsertPermissaoColaborador (){
        $permission = array (
        	'nome_colab' => $this->input->post('nome_colab'),
            'id_colab' => $this->input->post('idcolab'),
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
        $this->Colaborador_model->SavePermissionSystem($permission);

        if (!empty($user)) {
			$msg = $this->session->set_flashdata('Success', 'Dado a permissão para o usuário com sucesso!');
			redirect(base_url('PermissaoColaborador'));
			#redirect(base_url('Colaborador/PermissaoColaborador/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('PermissaoColaborador'));
			#redirect(base_url('DetalheUser/'.$id));
		}
    }
}
