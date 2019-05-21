<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	#MOSTRA OS EVENTOS CADASTRADOS
	public function MostraAgenda ($AnoAtual) {
		$this->db->where('ano_evento', $AnoAtual);
		$this->db->order_by('data_evento', 'ASC');
		return $this->db->get('evento')->result_array();
	}

	#MOSTRA QUANTIDADE DE REGISTROS POR PÁGINA POR EVENTOS CADASTRADOS
	public function MostraQtdRegAgenda ($Inicial, $NumReg) {
		$this->db->order_by('data_evento', 'ASC');
		$this->db->limit($NumReg, $Inicial);
		return $this->db->get('evento')->result();
	}

	#MOSTRA OS EVENTOS CADASTRADOS
	public function MostraAgendaPorMes ($Mes, $AnoAtual) {
		$this->db->where('mes_evento', $Mes);
		$this->db->where('ano_evento', $AnoAtual);
		$this->db->order_by('hora_evento', 'ASC');
		return $this->db->get('evento')->result_array();
	}

	#MOSTRA QUANTIDADE DE REGISTROS POR PÁGINA POR EVENTOS CADASTRADOS
	public function MostraQtdRegAgendaMes ($Mes, $AnoAtual, $Inicial, $NumReg) {
		$this->db->where('mes_evento', $Mes);
		$this->db->where('ano_evento', $AnoAtual);
		$this->db->order_by('hora_evento', 'ASC');
		$this->db->limit($NumReg, $Inicial);
		return $this->db->get('evento')->result();
	}

	#INSERE DADOS DO EVENTO NO BANCO DE DADOS
	public function SaveAgenda ($agenda) {
		$this->db->insert("evento", $agenda);
	}

	#ALTERA O EVENTO NO BANCO DE DADOS
	public function AlteraAgenda ($id, $evento) {
		$this->db->where('id_evento', $id);
		$this->db->update('evento', $evento);
		return TRUE;
	}

	#RETORNA O ID DOS EVENTOS
	public function RetornaIdAgenda ($id) {
		return $this->db->get_where("evento", array ("id_evento" => $id)) -> row_array();
	}

	#EXCLUÍ O EVENTO NO BANCO DE DADOS
	public function DeletaAgenda ($id) {
		$this->db->where('id_evento', $id);
		$this->db->delete('evento');
		return TRUE;
	}

	#INSERE DADOS DO COLABORADOR PRO EVENTO NO BANCO DE DADOS
	public function SaveColabEvento ($EventoColaborador) {
		$this->db->insert("colaborador_evento", $EventoColaborador);
	}

	#MOSTRA OS COLABORADORES CADASTRADO NO EVENTOS
	public function MostraColabEvento ($idEvento) {
		$this->db->order_by('nome_colaborador', 'ASC');
		return $this->db->get_where("colaborador_evento", array ("fk_id_evento" => $idEvento)) -> result();
	}

	#RETORNA OS IDs COLABORADORES CADASTRADO NO EVENTOS
	public function RetornaIdEventoColab ($id) {
		$this->db->where('id_colab_evento', $id);
		return $this->db->get('colaborador_evento')->result_array();
	}

	#RETORNA OS IDs COLABORADORES CADASTRADO NO EVENTOS
	public function colaboradoresEvento ($event) {
		$this->db->select("*");
		$this->db->from("colaborador_evento");
		$this->db->where("fk_id_evento", $event);
		return $this->db->get()->result_array();
	}

	#MOSTRA OS EVENTOS DO COLABORADOR
	public function MostraEventoColab ($idEvento) {
		$this->db->where('id_evento', $idEvento);
		return $this->db->get('evento')->result_array();
	}

	#EXCLUI OS COLABORADORES CADASTRADO NO EVENTOS
	public function ExcluiColabEvento($id) {
		$this->db->where('id_colab_evento', $id);
		$this->db->delete('colaborador_evento');
		return TRUE;
	}

}