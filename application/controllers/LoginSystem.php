<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginSystem extends CI_Controller {

	function __construct() {
		parent::__construct();
        #self::is_online();
		$this->load->library('form_validation');
	}

  public function Login()	{
		$msgErro = null;
		if ($this->session->flashdata('msgErro') !="") {
			$msgErro = $this->session->flashdata('msgErro');
		}

		$dados['titulo'] = 'Área Restrita';
		$dados['ErroLogin'] = $msgErro;
		$this->load->view('Login', $dados);
	}

	public function AutenticaLogin()	{
		$login = $this->input->post('login');
		$pass = md5($this->input->post('password'));
		//echo $login; exit();

    if ($login == 'admin' && $pass == 'd243ee28aa5930dea901298cdeb2cb9f') {
      $user = array('IdUser' => '1', 'login_colab' => 'Admin', 'senha_colab', 'd243ee28aa5930dea901298cdeb2cb9f2', 'nome' => 'Administrador01', 'sexouser' => 'Masculino', 'foto' => 'user1_05022019074529.png');

      //echo '<pre>';
      //print_r($user); exit();

    } //else {
      //$this->load->model('UserSystem_model');
      //$user = $this->UserSystem_model->OpenUser($login, $pass);
    //}

		if(!empty($user)){
			  $this->session->set_userdata('IdUser', $user[0]->id_usuario);
        $this->session->set_userdata('nome', $user[0]->nome_usuario);
        $this->session->set_userdata('sexouser', $user[0]->sexo_usuario);
        $this->session->set_userdata('foto', $user[0]->foto_usuario);

            redirect(base_url('Home'));
		} else {
			$this->session->set_flashdata('msgErro', 'Usuário ou Senha Inválidos!');
			redirect(base_url('Login'));
		}	
	}

  public function Home()	{
    $dados = array('titulo' => 'Sistema Trio Bagunça');  

    //$this->load->library('Menu');
    $ListaMenus = $this->menu->PermissaoMenus();
   
   	$this->load->view('header', $dados);
    $this->load->view('menu', $ListaMenus);
		$this->load->view('Home');
		$this->load->view('footer');
	}

	public function AlterarSenha() {
		$msgErro = null;

		if ($this->session->flashdata('msg') !="") {
			$msg = $this->session->flashdata('msg');
		}

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('titulo' => 'Alterar Senha', 'msg' => $msg);
		$this->load->view('AlterarMinhaSenha', $dados);
	}

	public function AlterarMinhaSenha() {
		$id = $this->input->post('id');
		$pass1 = md5($this->input->post('senha1'));
		$pass2 = md5($this->input->post('senha2'));

		if ($pass1 == $pass2) {
			$NovaSenha = array(
				'senha_colab' => $pass1,
			);
		} else {
			$this->session->set_flashdata('msg', 'Senhas não estão identicas!');
			redirect(base_url('AlterarMinhaSenha'));
		}
	
		$this->load->model('Colaborador_model');
		$Alterado = $this->Colaborador_model->AlteraSenha($id, $NovaSenha);

		if ($Alterado) {
			$this->session->set_flashdata('Success', 'Senha Alterada com Sucesso! <br /><a href="'.base_url().'"><< Voltar a página de login!</a>');
			redirect(base_url('AlterarMinhaSenha'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('AlterarMinhaSenha'));
		}

	}

  public function Logout () {
		$this->session->sess_destroy('IdUser');
		$this->session->sess_destroy('nome');
		session_destroy();
		return redirect(base_url('Login'));
	}

    /*public function is_online(){
        if(!$this->session->userdata("IdUser")>0){
            echo "NãO ESTA LOGADO";
        }else{
            redirect('Home');
        }
    }*/
}