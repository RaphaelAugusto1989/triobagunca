<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->helper('url');
	}

	#MOSTRA OS EVENTOS CADASTRADOS
	public function MostraAgenda () {
		$this->db->order_by('hora_evento', 'ASC');
		return $this->db->get('evento')->result_array();
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
		return $this->db->get_where("colaborador_evento", array ("fk_id_evento" => $idEvento)) -> result();
		//return $this->db->get('colaborador_evento')->result_array();
	}

	#MOSTRA OS EVENTOS DO COLABORADOR
	public function MostraEventoColab ($idEvento) {
		$this->db->where('id_evento', $idEvento);
		return $this->db->get('evento')->result_array();
	}

}