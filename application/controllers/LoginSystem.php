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
		echo $login; exit();
    if ($login == 'admin' && $pass == 'd243ee28aa5930dea901298cdeb2cb9f') {
      $user = array('IdUser' => '1', 'login_colab' => 'Admin', 'senha_colab', 'd243ee28aa5930dea901298cdeb2cb9f2', 'nome' => 'Administrador01', 'sexouser' => 'Masculino', 'foto' => 'user1_05022019074529.png');

      echo '<pre>';
      print_r($user); exit();

    } //else {
      //$this->load->model('UserSystem_model');
      //$user = $this->UserSystem_model->OpenUser($login, $pass);
    //}

		if(!empty($user)){
			  $this->session->set_userdata('IdUser', $user[0]->id_usuario);
        $this->session->set_userdata('nome', $user[0]->nome_usuario);
        $this->session->set_userdata('sexouser', $user[0]->sexo_usuario);
        $this->session->set_userdata('foto', $user[0]->foto_usuario);

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

  public function Home()	{
    $dados = array('titulo' => 'Sistema Trio Bagunça');  

    //$this->load->library('Menu');
    $ListaMenus = $this->menu->PermissaoMenus();
   
   	$this->load->view('header', $dados);
    $this->load->view('menu', $ListaMenus);
		$this->load->view('Home');
		$this->load->view('footer');
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