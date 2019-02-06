<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSystem extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function UsuarioNovo(){
		$msg = null;
		if ($this->session->flashdata('Sucess') !="") {
			$msg = $this->session->flashdata('Sucess');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		$dados['titulo'] = 'Novo Usuário';
		$dados['msg'] = $msg;		
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('UsuarioNovo', $dados);
		$this->load->view('footer');
	}

	public function NewUser()	{
		$user = array(
			'nome_usuario' => $this->input->post('nome'),
            'sobrenome_usuario' => $this->input->post('sobrenome'),
            'sexo_usuario' => $this->input->post('sexo'),
			'email_usuario' => $this->input->post('email'),
			'cpf_usuario' => $this->input->post('cpf'),
			'nascimento_usuario' => $this->input->post('nascimento'),
			'login_usuario' => $this->input->post('user'),
			'senha_usuario' => md5($this->input->post('password')),
		);
		
		$this->load->model('UserSystem_model');
		$this->UserSystem_model->SaveUser($user);

		if (!empty($user)) {
			$this->session->set_flashdata('Sucess', 'Usuário Cadastrado com Sucesso');
			redirect(base_url('UsuarioNovo'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('UsuarioNovo'));
		}
	}

	public function AlterarUser () {
		$id = $this->input->post('id');
		$pass = $this->input->post('password');

			if (empty($pass)) {
				$user = array(
					'nome_usuario' => $this->input->post('nome'),
                    'sobrenome_usuario' => $this->input->post('sobrenome'),
                    'sexo_usuario' => $this->input->post('sexo'),
                    'email_usuario' => $this->input->post('email'),
					'cpf_usuario' => $this->input->post('cpf'),
					'nascimento_usuario' => $this->input->post('nascimento'),
					'login_usuario' => $this->input->post('user'),
				);
			} else {
				$user = array(
					'nome_usuario' => $this->input->post('nome'),
                    'sobrenome_usuario' => $this->input->post('sobrenome'),
                    'sexo_usuario' => $this->input->post('sexo'),
					'email_usuario' => $this->input->post('email'),
					'cpf_usuario' => $this->input->post('cpf'),
					'nascimento_usuario' => $this->input->post('nascimento'),
					'login_usuario' => $this->input->post('user'),
					'senha_usuario' => md5($this->input->post('password')),
				);

			}
		
		$this->load->model('UserSystem_model');
		$this->UserSystem_model->AlteraUser($id, $user);

		if (!empty($user)) {
			$msg = $this->session->set_flashdata('Success', 'Usuário Alterado com Sucesso');
			redirect(base_url('UserSystem/DetalheUser/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalheUser/'.$id));
		}
	}

	public function ExcluirUser() {
		$id = $this->input->get('id');
		$this->load->model('UserSystem_model');
		$true = $this->UserSystem_model->DeletaUser($id);

		if ($true == true) {
			echo "<script> alert ('USUÁRIO EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('../UsuariosCadastrados')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR O USUÁRIO, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('../UsuariosCadastrados')</script>";
		}
	}

	public function UserCadastrados() {
		$dados['titulo'] = 'Usuários Cadastrados';
		$this->load->model('UserSystem_model');
		$lista = $this->UserSystem_model->MostraUser();
		$user =  array('usuario' => $lista);
		$TotalUser = count($lista);
		$user["total"] = $TotalUser;


		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('UsuariosCadastrados', $user);
		$this->load->view('footer');
	}

	public function DetalheUser() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$dados['titulo'] = 'Usuário Cadastrado';

		$id = $this->uri->segment(3);
		$this->load->model('UserSystem_model');
		$iduser = $this->UserSystem_model->RetornaIdUser($id);
		$user = array('user' => $iduser);
		$user['msg'] = $msg;

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('UsuarioAlterar', $user);
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
		$this->load->model('UserSystem_model');
		$iduser = $this->UserSystem_model->RetornaIdUser($id);
		$user = array('user' => $iduser);
		$user['msg'] = $msg;

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('MeusDados', $user);
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
				$user = array(
				    'foto_usuario' => $novo_nome,
					'email_usuario' => $this->input->post('email'),
					'nascimento_usuario' => $this->input->post('nascimento'),
					'login_usuario' => $this->input->post('user'),
				);
			} else {
				$user = array(
                    'foto_usuario' => $novo_nome,
					'email_usuario' => $this->input->post('email'),
					'nascimento_usuario' => $this->input->post('nascimento'),
					'login_usuario' => $this->input->post('user'),
					'senha_usuario' => md5($this->input->post('password')),
				);

			}

		$this->load->model('UserSystem_model');
		$this->UserSystem_model->AlteraUser($id, $user);

		if (!empty($user)) {
			$msg = $this->session->set_flashdata('Success', 'Alterado com Sucesso');
			redirect(base_url('UserSystem/MeusDados/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('MeusDados/'.$id));
		}
	}

    public function PermissionUser () {
	    $dados['titulo'] = "Permissões de Usuário";
	    $dados['dadospacote'] = array("id_user"=>$this->input->post('id_user'));

        $this->load->view('header', $dados);
	    $this->load->view('menu');
	    $this->load->view('UsuarioPermissao');
	    $this->load->view('footer');
    }

    public function PermissionUserCadastro (){
        $permission = array (
            'id_user' => $this->input->post('id_user'),
            'permission1' => $this->input->post('permission1'),
            'permission2' => $this->input->post('permission2'),
            'permission3' => $this->input->post('permission3'),
            'permission4' => $this->input->post('permission4'),
            'permission5' => $this->input->post('permission5'),
            'permission6' => $this->input->post('permission6'),
            'permission7' => $this->input->post('permission7'),
        );

        #AUTOCOMPLETE
        if(isset($_GET['term'])) {
            $this->load->model('UserSystem_model');
            $lista = $this->UserSystem_model->UserAutoComplete($_GET['term']);
            $arr_lista = array();
            if (!empty($lista)) {
                foreach ($lista as $nome) {
                    $resultado = array("label" => $nome->nome_usuario,
                    "value" => $nome->nome_usuario,
                    "id"=>$nome->id_usuario);
                    array_push($arr_lista, $resultado);
                }
                echo  json_encode($arr_lista);exit;
            }
		}
		
		#MOSTRA USUÁRIO
		$this->load->model('UserSystem_model');
		$lista = $this->UserSystem_model->MostraUser();
		$dados =  array('user' => $lista, 'dadosuser'=>null);
		
		if(isset($_POST['nome_user'])) {
			$nome_user = $_POST['nome_user'];
			$id_user = $this->UserSystem_model->MostraUser($nome_user);
			$dados = array('dados_user' => $id_user);
			if(!empty($dados)){
				
				echo json_encode(array("codErro"=>0, 
									   "id_usuario"=>$dados["dados_user"]["id_user"]
									   )
							    ); exit;
			}else{
				echo json_encode(array("codErro"=>1, "msg"=>"Dados do Usuário não encontrado")); exit;
			}
			echo'<pre>';print_r($dados);exit;
		}

        $this->load->model('UserSystem_model');
        $this->UserSystem_model->InsertPermissionUser($permission);

        if (!empty($user)) {
			$msg = $this->session->set_flashdata('Success', 'Dado a permissão para o usuário com sucesso!');
			redirect(base_url('UserSystem/DetalheUser/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalheUser/'.$id));
		}
    }

}
