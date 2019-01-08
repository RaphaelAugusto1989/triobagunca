<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacotes_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	#MOSTRA OS CLIENTES CADASTRADOS
	public function MostraPacotes () {
		return $this->db->get('pacotes')->result_array();
	}

	

	#INSERE O PACOTE NO BANCO DE DADOS
	public function SavePacote ($pacote) {
		$this->db->insert("pacotes", $pacote);
	}

	#ALTERA O CLIENTE NO BANCO DE DADOS
	public function AlteraPacote ($id, $pacote) {
		$this->db->where('id_pct', $id);
		$this->db->update('pacotes', $pacote);
		return TRUE;
	}

	public function RetornaIdPacote ($id) {
		return $this->db->get_where("pacotes", array ("id_pct" => $id)) -> row_array();
	}

	#EXCLUÍ O PACOTE NO BANCO DE DADOS
	public function DeletaPacote ($id) {
		$this->db->where('id_pct', $id);
		$this->db->delete('pacotes');
		return TRUE;
	}

}