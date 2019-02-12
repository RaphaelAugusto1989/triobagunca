<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->library('form_validation');
	}

	public function AgendamentoNovo() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}
		
		#AUTOCOMPLETE
		#if(isset($_GET['term'])) {
		#	$this->load->model('Clientes_model');
		#	$lista = $this->Clientes_model->ClienteAutoComplete($_GET['term']);
		#	if (!empty($lista)) {
		#		foreach ($lista as $nome) {
		#			$arr_lista[] = $nome->nome_cli;
		#		}
		#		echo  json_encode($arr_lista);exit;
		#	}
		#}

		#MOSTRA PACOTE
		$this->load->model('Pacotes_model');
		$lista = $this->Pacotes_model->MostraPacotes();
		$dados =  array('pacote' => $lista, 'dadospacote'=>null);
		
		if(isset($_POST['pacote'])) {
			$id = $_POST['pacote'];
			$idPacote = $this->Pacotes_model->RetornaIdPacote($id);
			$dados = array('dadospacote' => $idPacote);
			if(!empty($dados)){
				
				echo json_encode(array("codErro"=>0, 
								 	   "msg"=>"", 
									   "tempo"=>$dados["dadospacote"]["tempo_pct"],
									   "valor"=>$dados["dadospacote"]["valor_pct"],
									   "especificacao"=>trim($dados["dadospacote"]["especificacao_pct"])
									   )
							    );exit;
			}else{
				echo json_encode(array("codErro"=>1, "msg"=>"Dados do pacote não encontrado")); exit;
			}
			echo'<pre>';print_r($dados);exit;
		}

		
		$dados['msg'] = $msg;
		$dados['titulo'] = 'Agendamento de Envento';

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('AgendamentoNovo', $dados);
		$this->load->view('footer');
	}
	
	public function NovoAgendamento()	{
		$agenda = array(
			'nome_cli' => $this->input->post('nome_cliente'), 
			'data_evento' => $this->input->post('data_evento'),
			'hora_evento' => $this->input->post('hora_evento'),
			'email_cli' => $this->input->post('email_cliente'),
			'id_pct' => $this->input->post('pct'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'tempo_evento' => $this->input->post('tempo_evento'),
			'valor_pct' => $this->input->post('valor_pct'),
			'status_evento' => $this->input->post('status'),
		);

		$this->load->model('Agenda_model');
		$this->Agenda_model->SaveAgenda($agenda);

		if (!empty($agenda)) {
			$this->session->set_flashdata('Success', 'Agendamento Feito com Sucesso');
			redirect(base_url('AgendamentoNovo'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('AgendamentoNovo'));
		}
	}

	public function Agendamentos(){
		$dados['titulo'] = 'Agendamentos';
		$this->load->model('Agenda_model');
		$lista = $this->Agenda_model->MostraAgenda();
		$dados =  array('evento' => $lista);

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('Agendamentos', $dados);
		$this->load->view('footer');
	}

	public function AlterarAgendamento () {
		$id = $this->input->post('id');
		$evento = array(
			'nome_cli' => $this->input->post('nome_cliente'), 
			'niver_cli' => $this->input->post('aniversariante'),
			'idade_niver' => $this->input->post('idade'),
			'data_evento' => $this->input->post('data_evento'),
			'hora_evento' => $this->input->post('hora_evento'),
			'end_evento' => $this->input->post('endereco'),
			'nome_emergencia' => $this->input->post('nome_emergencia'),
			'numero_emergencia' => $this->input->post('numero_emergencia'),
			'qtd_crianca_evento' => $this->input->post('qtd_criancas'),
			'idade_media_evento' => $this->input->post('idade_media'),
			'id_pct' => $this->input->post('pct'),
			'especificacao_pct' => $this->input->post('especificacao'),
			'psg_evento' => $this->input->post('personagem'),
			'hora_chegada' => $this->input->post('hora_chegada'),
			'tempo_evento' => $this->input->post('tempo_evento'),
			'valor_pct' => $this->input->post('valor_pct'),
			'valor_total' => $this->input->post('valor_total'),
			'sinal_valor' => $this->input->post('sinal_valor'),
			'falta_pagar_valor' => $this->input->post('falta_pagar'),
			'status_evento' => $this->input->post('status'),
		);

		$this->load->model('Agenda_model');
		$this->Agenda_model->AlteraAgenda($id, $evento);

		if (!empty($evento)) {
			$msg = $this->session->set_flashdata('Success', 'Evento Alterado com Sucesso');
			redirect(base_url('Agenda/DetalheEvento/'.$id));
		} else {
			$msg = $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(base_url('DetalheEvento/'.$id));
		}
	}

	public function ExcluirEvento() {
		$id = $this->input->get('id');
		$this->load->model('Agenda_model');
		$true = $this->Agenda_model->DeletaAgenda($id);

		if ($true == TRUE) {
			echo "<script> alert('EVENTO EXCLUÍDO COM SUCESSO!') </script>";
			echo "<script> location.href=('Agendamentos')</script>";
		}
	}

	public function DetalheEvento() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = "<p class='alert alert-success text-center'>".$this->session->flashdata('Success')."</p>";
		} else if ($this->session->flashdata('Error') !=""){
			$msg = "<p class='alert alert-danger text-center'>".$this->session->flashdata('Error')."</p>";
		}

		$dados['titulo'] = 'Evento';

		#MOSTRA PACOTE
		$this->load->model('Pacotes_model');
		$lista = $this->Pacotes_model->MostraPacotes();
		$dados =  array('pacote' => $lista, 'dadospacote'=>null);
		
		if(isset($_POST['pacote'])) {
			$id = $_POST['pacote'];
			//$id = $this->uri->segment(3);
			$idPacote = $this->Pacotes_model->RetornaIdPacote($id);
			$dados = array('dadospacote' => $idPacote);
			if(!empty($dados)){
				
				echo json_encode(array("codErro"=>0, 
								 	   "msg"=>"", 
								 	   "idpct"=>$dados["dadospacote"]["id_pct"],
									   "tempo"=>$dados["dadospacote"]["tempo_pct"],
									   "valor"=>$dados["dadospacote"]["valor_pct"],
									   "especificacao"=>trim($dados["dadospacote"]["especificacao_pct"])
									   )
							    );exit;
			}else{
				echo json_encode(array("codErro"=>1, "msg"=>"Dados do pacote não encontrado")); exit;
			}
			//echo'<pre>';print_r($dados);exit;
		}

		$id = $this->uri->segment(3);

		$this->load->model('Agenda_model');
		$idEvento = $this->Agenda_model->RetornaIdAgenda($id);
		$Evento = array('evento' => $idEvento);
		$Evento['msg'] = $msg;

		$this->load->view('header', $dados);
		$this->load->view('menu');
		$this->load->view('AgendamentoAltera', $Evento);
		$this->load->view('footer');
	}
}
