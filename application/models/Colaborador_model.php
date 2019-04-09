<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	#MOSTRA OS COLABORADORES CADASTRADOS
	public function MostraColaborador () {
		$this->db->order_by('nome_colab', 'ASC');
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

	#LOGA O COLABORADOR NO SISTEMA
	public function OpenUser($login, $pass) {
		$this->db->where('email_colab', $login);
		$this->db->or_where('login_colab', $login);
		$this->db->where('senha_colab', $pass);
		$user = $this->db->get('colaborador')->result();
		return $user;
	}

	#INSERE A PERMISSÃO DO COLABORADOR NO SISTEMA
    public function SavePermissionSystem ($permission) {
        $this->db->insert("permissao_colab", $permission);
    }

    #MOSTRA PERMISSÕES DO COLABORADOR LOGADO
    public function Permissoes ($id) {
        $this->db->from('permissao_colab');
        $this->db->where('id_colab', $id);
		return $this->db->get()->result();
    }

	#MOSTRA COLABORADOR NO AUTOCOMPLETE
    public function AutoCompleteColaborador ($nome) {
        $this->db->from('colaborador');
        $this->db->like('nome_colab', $nome, 'both');
        return $this->db->get()->result();
    }

    #MOSTRA INDISPONIBILIDADE DO COLABORADOR 
   	public function MostraTodasIndisponibilidades () {
   		$this->db->order_by('data_inicial', 'ASC');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

    #MOSTRA INDISPONIBILIDADE DO COLABORADOR POR ID
   	public function MostraIndisponibilidade ($id) {
   		$this->db->where('id_colab', $id);
   		$this->db->order_by('data_inicial', 'ASC');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

	#MOSTRA INDISPONIBILIDADE DO COLABORADOR POR ID
   	public function MostraIndisponibilidadeEvento ($DataEvento) {
   		$this->db->from('evento');
   		//$this->db->where('id_colab', $DataEvento);
   		$this->db->where_in('data_inicial', 'DataEvento');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

	#INSERE A INDISPONIBILIDADE DO COLABORADOR NO BANCO DE DADOS
	public function SaveIndisponibilidade ($indisponibilidades) {
		$this->db->insert("colaborador_indisponivel", $indisponibilidades);
	}

	#EXCLUÍ O COLABORADOR NO BANCO DE DADOS
	public function DeletaIndisponibilidade ($id) {
		$this->db->where('id_ind', $id);
		$this->db->delete('colaborador_indisponivel');
		return TRUE;
	}

	#MOSTRA OS COLABORADORES NO EVENTO
	public function MostraAgendaColab ($idColab) {
		return $this->db->get_where("colaborador_evento", array ("fk_id_colaborador" => $idColab)) -> result();
	}

}