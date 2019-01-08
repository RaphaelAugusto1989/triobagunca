<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
		//$this->load->helper('url');
	}

	public function index() {
		$dados['titulo'] = 'Site Trio Bagunça';
		$this->load->view('Login');
	}

	public function EmDesenvolvimento() {
		$dados['titulo'] = 'Em Desenvolvimento';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('EmDesenvolvimento');
		$this->load->view('footer');
	}


	public function ClienteCadastro()	{
		$dados['titulo'] = 'Cadastro de Cliente';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ClienteCadastro');
		$this->load->view('footer');
	}

	public function ClientesCadastrados()	{
		$dados['titulo'] = 'Clientes Cadastros';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ClientesCadastrados');
		$this->load->view('footer');
	}

	public function AgendamentoNovo()	{
		$dados['titulo'] = 'Novo Agendamento';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('AgendamentoNovo');
		$this->load->view('footer');
	}

	public function AgendamentosConfirmados()	{
		$dados['titulo'] = 'Agendamento ';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('AgendamentosConfirmados');
		$this->load->view('footer');
	}

	public function PacoteCadastro()	{
		$dados['titulo'] = 'Cadastro de Pacote ';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('PacoteCadastro');
		$this->load->view('footer');
	}

	public function PacotesCadastrados()	{
		$dados['titulo'] = 'Agendamento ';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('PacotesCadastrados');
		$this->load->view('footer');
	}

	public function UsuarioCadastro()	{
		//$this->load->helper('form');
		$dados['titulo'] = 'Cadastro de Usuários do Sistema';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('UsuarioCadastro');
		$this->load->view('footer');
	}

}
