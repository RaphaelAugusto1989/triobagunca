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
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
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
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
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
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
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

		#echo'<pre>'; print_r($ListaColab);
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
        $pass = $this->input->post('password');

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
	    $ListaMenus = $this->menu->PermissaoMenus();

        $this->load->view('header', $dados);
	    $this->load->view('menu', $ListaMenus);
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
		$dados = array('titulo' => 'Indisponibilidades', 'msg' => $msg, 'ind' => $ColabInd);

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
	    $DataFinal = $this->input->post('datafinal');
	    $motivo = $this->input->post('motivo');

		//echo'<pre>';print_r($idColab);	

		$SomaData = date('Y/m/d', strtotime($DataHoje. '+ 3 days'));

		$this->load->model('Colaborador_model');

		foreach($DataInicial as $indice => $inicio){
			$indisponibilidades = array (
	    		'id_colab' => $idColab,
	    		'nome_colab' => $NomeColab,
	    		'data_cadastrado' => $DataHoje,
	    		'data_inicial' => $DataInicial[$indice],
	    		'data_final' => $DataFinal[$indice],
	    		'motivo_ind' => $motivo[$indice],
    		);

    		$this->Colaborador_model->SaveIndisponibilidade($indisponibilidades);
		}

		$SomaData = str_replace("/","", $SomaData);
		$inicial  = str_replace("-","",  $DataInicial[0]); 

		if ($inicial <= $SomaData) {
				$msg = $this->session->set_flashdata('Error', 'AVISO: Você cadastrou sua indisponibilidade com 3 dias ou menos da data inicial, isso ocorrerá como falta!');
				redirect(base_url('ColaboradorIndisponibilidade/'.$id));
		} 
		
		if (!empty($indisponibilidades)) {
			$msg = $this->session->set_flashdata('Success', 'Indisponiblidade Cadastradas com Sucesso');
			redirect(base_url('ColaboradorIndisponibilidade/'.$id));
			//redirect(base_url('Colaborador/ColaboradorIndisponibilidade/'.$id));
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
		$dados['titulo'] = 'Colaboradores Indisponiveis';
		
		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->MostraTodasIndisponibilidades();
		$ColabDados = $this->Colaborador_model->MostraColaborador();
		$Colaborador =  array('colaborador' => $lista, 'dadoscolab' => $ColabDados);
		$ListaMenus = $this->menu->PermissaoMenus();

		//$TotalColab = count($lista);
		//$Colaborador["total"] = $TotalColab;

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('ColaboradoresIndisponiveis', $Colaborador);
		$this->load->view('footer');
	}

}
