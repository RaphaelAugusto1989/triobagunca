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
			'funcao_colab' => $this->input->post('funcao'),
			'nasc_colab' => $this->input->post('nascimento'),
			'end_colab' => $this->input->post('endereco'),
			'fixo_colab' => $this->input->post('fixo'),
			'cel_colab' => $this->input->post('cel'),
			'email_colab' => $this->input->post('email'),
			'obs_colab' => $this->input->post('obs'),
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

	public function ColaboradoresCadastrados()	{
		$dados['titulo'] = 'Colaboradores Cadastros';
		$this->load->model('Colaborador_model');
		$lista = $this->Colaborador_model->MostraColaborador();
		$Colaborador =  array('colaborador' => $lista);
		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('ColaboradoresCadastrados', $Colaborador);
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
}
