<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	#MOSTRA OS COLABORADORES CADASTRADOS
	public function MostraColaborador () {
		return $this->db->get('colaborador')->result_array();
	}

	#INSERE O COLABORADOR NO BANCO DE DADOS
	public function SaveColaborador ($colaborador) {
		$this->db->insert("colaborador", $colaborador);
	}

	#ALTERA O COLABORADOR NO BANCO DE DADOS
	public function AlteraColaborador ($id, $colaborador) {
		$this->db->where('id_colab', $id);
		$this->db->update('colaborador', $colaborador);
		return TRUE;
	}

	public function RetornaIdColaborador($id) {
		return $this->db->get_where("colaborador", array ("id_colab" => $id)) -> row_array();
	}

	#EXCLUÍ O COLABORADOR NO BANCO DE DADOS
	public function DeletaColaborador ($id) {
		$this->db->where('id_colab', $id);
		$this->db->delete('colaborador');
		return TRUE;
	}

}