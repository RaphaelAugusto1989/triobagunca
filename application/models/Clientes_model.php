<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->helper('url');
	}

	#MOSTRA OS CLIENTES CADASTRADOS
	public function MostraClientes () {
		return $this->db->get('clientes')->result_array();
	}

	#MOSTRA OS AUTOCOMPLETE CLIENTES CADASTRADOS
	public function ClienteAutoComplete ($nome) {
		$this->db->from('clientes');
		$this->db->like('nome_cli', $nome, 'both');
		return $this->db->get()->result();
	}

	#INSERE O CLIENTE NO BANCO DE DADOS
	public function SaveCliente ($cliente) {
		$this->db->insert("clientes", $cliente);
	}

	#ALTERA O CLIENTE NO BANCO DE DADOS
	public function AlteraCliente ($id, $cliente) {
		$this->db->where('id_cli', $id);
		$this->db->update('clientes', $cliente);
		return TRUE;
	}

	public function RetornaIdCliente ($id) {
		return $this->db->get_where("clientes", array ("id_cli" => $id)) -> row_array();
	}

	#EXCLUÍ O CLIENTE NO BANCO DE DADOS
	public function DeletaCliente ($id) {
		$this->db->where('id_cli', $id);
		$this->db->delete('clientes');
		return TRUE;
	}

}