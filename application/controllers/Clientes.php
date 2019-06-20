<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function ClienteCadastro()	{
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		$dados['msg'] = $msg;
		$dados['titulo'] = 'Cadastro de Cliente';
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ClienteCadastro', $dados);
		$this->load->view('footer');
	}

	public function NewCliente()	{
		$cliente = array(
			'nome_cli' => $this->input->post('nome'), 
			'cpf_cli' => $this->input->post('cpf'),
			'nasc_cli' => $this->input->post('nascimento'),
			'end_cli' => $this->input->post('endereco'),
			'fixo_cli' => $this->input->post('fixo'),
			'cel_cli' => $this->input->post('cel'),
			'email_cli' => $this->input->post('email'),
		);
		
		$this->load->model('Clientes_model');
		$this->Clientes_model->SaveCliente($cliente);

		if (!empty($cliente)) {
			$this->session->set_flashdata('Success', 'Cliente Cadastrado com Sucesso');
			redirect(base_url('ClienteCadastro'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('ClienteCadastro'));
		}
	}

	public function AlterarCliente () {
		$id = $this->input->post('id');
		$cliente = array(
			'nome_cli' => $this->input->post('nome'), 
			'cpf_cli' => $this->input->post('cpf'),
			'nasc_cli' => $this->input->post('nascimento'),
			'end_cli' => $this->input->post('endereco'),
			'fixo_cli' => $this->input->post('fixo'),
			'cel_cli' => $this->input->post('cel'),
			'email_cli' => $this->input->post('email'),
		);

		$this->load->model('Clientes_model');
		$this->Clientes_model->AlteraCliente($id, $cliente);

		if (!empty($cliente)) {
			$msg = $this->session->set_flashdata('Success', 'Cliente Alterado com Sucesso');
			redirect(base_url('Clientes/DetalheCliente/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalheCliente/'.$id));
		}
	}

	public function ExcluirCliente() {
		$id = $this->input->get('id');
		$this->load->model('Clientes_model');
		$true = $this->Clientes_model->DeletaCliente($id);

		if ($true == true) {
			echo "<script> alert ('CLIENTE EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('ClientesCadastrados')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR O CLIENTE, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('ClientesCadastrados')</script>";
		}
	}

	public function ClientesCadastrados()	{
		$dados['titulo'] = 'Clientes Cadastrados';
		$this->load->model('Clientes_model');
		$lista = $this->Clientes_model->MostraClientes();
		$cliente =  array('clientes' => $lista);
		$total_cliente = count($lista);
		$cliente['total'] = $total_cliente;
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ClientesCadastrados', $cliente);
		$this->load->view('footer');
	}

	public function DetalheCliente() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$dados['titulo'] = 'Detalhe do Clientes';

		$id = $this->uri->segment(3);
		$this->load->model('Clientes_model');
		$idcliente = $this->Clientes_model->RetornaIdCliente($id);
		$cliente = array('clientes' => $idcliente);
		$cliente['msg'] = $msg;

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ClienteAlterar', $cliente);
		$this->load->view('footer');
	}
}
