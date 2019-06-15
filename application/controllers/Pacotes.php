<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacotes extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function PacoteCadastro() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		$dados['msg'] = $msg;
		$dados['titulo'] = 'Cadastro de Pacotes';
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('PacoteCadastro', $dados);
		$this->load->view('footer');
	}
	
	public function NovoPacote()	{
		$pacote = array(
			'nome_pct' => $this->input->post('pacote'), 
			'tempo_pct' => $this->input->post('tempo'),
			'valor_pct' => $this->input->post('valor'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'obs_pct' => $this->input->post('obs'),
		);
		
		$this->load->model('Pacotes_model');
		$this->Pacotes_model->SavePacote($pacote);


		if (!empty($pacote)) {
			$this->session->set_flashdata('Success', 'Pacote Cadastrado com Sucesso');
			redirect(base_url('PacoteCadastro'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('PacoteCadastro'));
		}
	}

	public function PacotesCadastrados()	{
		$dados['titulo'] = 'Pacotes Cadastros';
		$this->load->model('Pacotes_model');
		$lista = $this->Pacotes_model->MostraPacotes();
		$pacotes =  array('pacotes' => $lista);
		$ListaMenus = $this->menu->PermissaoMenus();

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('PacotesCadastrados', $pacotes);
		$this->load->view('footer');
	}

	public function AlterarPacote () {
		$id = $this->input->post('id');
		$pacote = array(
			'nome_pct' => $this->input->post('pacote'), 
			'tempo_pct' => $this->input->post('tempo'),
			'valor_pct' => $this->input->post('valor'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'obs_pct' => $this->input->post('obs'),
		);

		$this->load->model('Pacotes_model');
		$this->Pacotes_model->AlteraPacote($id, $pacote);

		if (!empty($pacote)) {
			$msg = $this->session->set_flashdata('Success', 'Pacote Alterado com Sucesso');
			redirect(base_url('Pacotes/DetalhePacote/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalhePacote/'.$id));
		}
	}

	public function ExcluirPacote() {
		$id = $this->input->get('id');
		#$id = $this->uri->segment(3);
		$this->load->model('Pacotes_model');
		$true = $this->Pacotes_model->DeletaPacote($id);

		if ($true == true) {
			echo "<script> alert ('PACOTE EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('../PacotesCadastrados')</script>";
		}
		else {
			echo "<script> alert ('PROBLEMA AO EXCLUIR O CLIENTE, TENTE NOVAMENTE!')</script>";
			echo "<script> location.href=('../PacotesCadastrados')</script>";
		}
	}

	public function DetalhePacote() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$id = $this->uri->segment(3);

		$this->load->model('Pacotes_model');
		$idPacote = $this->Pacotes_model->RetornaIdPacote($id);
		$ListaMenus = $this->menu->PermissaoMenus();

		$pacote = array('pacote' => $idPacote, 'msg' => $msg, 'titulo' => 'Detalhe do Pacote');

		$this->load->view('header', $dados);
		$this->load->view('menu', $ListaMenus);
		$this->load->view('PacoteAltera', $pacote);
		$this->load->view('footer');
	}
}
