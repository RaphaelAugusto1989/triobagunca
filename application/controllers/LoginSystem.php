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
		$this->load->model('UserSystem_model');
		$login = $this->input->post('login');
		$pass = md5($this->input->post('password'));
		$user = $this->UserSystem_model->OpenUser($login, $pass);

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

    public function EsqueciSenha() {
        $msgErro = null;
        if ($this->session->flashdata('msgErro') !="") {
            $msgErro = $this->session->flashdata('msgErro');
        }

        $dados['titulo'] = 'Esqueci minha senha';
        $dados['ErroLogin'] = $msgErro;
        $this->load->view('EsqueciSenha', $dados);
    }

    public function EnviaLinkSenha() {
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');

        $this->load->model('UserSystem_model');
        $lista = $this->UserSystem_model->MostraUser();

       #echo $cpf;  echo $email; echo "<pre>"; print_r($lista);exit;
        $achou = false;
        foreach ($lista as $l) {
           if ($email == $l['email_usuario'] && $cpf == $l['cpf_usuario']) {

               $achou = true;
               break;
           }
       }
       if($achou==false){
           $this->session->set_flashdata('msgErro', 'E-mail e/ou CPF não cadastrados, entre em contato com o responsável do sistema!');
           redirect(base_url('EsqueciSenha'));

       }else{

           $this->session->set_flashdata('msgErro', 'E-mail enviado com sucesso!');
           redirect(base_url('EsqueciSenha'));

       }
    }

   	public function Home()	{
		$dados['titulo'] = 'Sistema Trio Bagunça';		
		$this->load->view('header', $dados);
		$this->load->view('menu');
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