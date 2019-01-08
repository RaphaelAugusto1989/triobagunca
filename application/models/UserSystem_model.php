<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSystem_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->helper('url');
	}

	#LOGA O USUÁRIO NO SISTEMA
	public function OpenUser($login, $pass) {
		$this->db->where('email_usuario', $login);
		$this->db->or_where('login_usuario', $login);
		$this->db->where('senha_usuario', $pass);
		$user = $this->db->get('usuario')->result();
		return $user;
	}

	#CADASTRA O USUÁRIO NO BANCO DE DADOS
	public function SaveUser ($user) {
		$this->db->insert("usuario", $user);
	}

	#MOSTRA OS USUÁRIOS CADASTRADOS
	public function MostraUser () {
		return $this->db->get('usuario')->result_array();
	}

	#ALTERA O USUÁRIO NO BANCO DE DADOS
	public function AlteraUser ($id, $user) {
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $user);
		return TRUE;
	}

	#ALTERA O USUÁRIO NO BANCO DE DADOS
	public function RetornaIdUser ($id) {
		return $this->db->get_where("usuario", array ("id_usuario" => $id)) -> row_array();
	}

	#EXCLUÍ O USUÁRIO NO BANCO DE DADOS
	public function DeletaUser ($id) {
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario');
		return TRUE;
	}

	#CADASTRA PERMISSÃO PARA O USUÁRIO
    public function InsertPermissionUser ($permission){
	    $this->db->insert('permissao_user', $permission);
    }

    #MOSTRA OS AUTOCOMPLETE CLIENTES CADASTRADOS
    public function UserAutoComplete ($nome) {
        $this->db->from('usuario');
        $this->db->like('nome_usuario', $nome, 'both');
        return $this->db->get()->result();
    }

}