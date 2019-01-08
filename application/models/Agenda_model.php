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

}