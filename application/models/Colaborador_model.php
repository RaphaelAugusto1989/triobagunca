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

	#MOSTRA QUANTIDADE DE REGISTROS POR PÁGINA DOS COLABORADORES CADASTRADOS
	public function MostraQtdRegColaborador ($Inicial, $NumReg) {
		$this->db->order_by('nome_colab', 'ASC');
		$this->db->limit($NumReg, $Inicial);
		return $this->db->get('colaborador')->result();
	}

	#INSERE O COLABORADOR NO BANCO DE DADOS
	public function SaveColaborador ($colaborador) {
		$this->db->insert("colaborador", $colaborador);
	}

	#VERIFICA SE COLABORADOR JÁ ESTÁ CADASTRADO NO BANCO DE DADOS
	public function VerifyColaborador ($VerifyCPF, $VerifyEmail, $VerifyLogin) {
		$this->db->where('cpf_colab', $VerifyCPF);
		$this->db->or_where('email_colab', $VerifyEmail);
		$this->db->or_where('login_colab', $VerifyLogin);
		$user = $this->db->get('colaborador')->result();
		return $user;
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

	#ALTERA O COLABORADOR NO BANCO DE DADOS
	public function AlteraSenha ($id, $senha) {
		$this->db->where('id_colab', $id);
		$this->db->update('colaborador', $senha);
		return TRUE;
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

    #EXCLUÍ O CLIENTE NO BANCO DE DADOS
	public function MostraPermissao () {
		$this->db->order_by('nome_colab', 'ASC');
		return $this->db->get('permissao_colab')->result_array();
	}


    #MOSTRA PERMISSÕES DO COLABORADOR LOGADO
    public function Permissoes ($id) {
        $this->db->from('permissao_colab');
        $this->db->where('id_colab', $id);
		return $this->db->get()->result();
    }

    public function RetornaIdColabPermissao($idColab) {
		return $this->db->get_where("permissao_colab", array ("id_colab" => $idColab)) -> row_array();
	}

    #MOSTRA DETALHES DAS PERMISSÕES DO COLABORADOR
    public function MostraDetalhePermissao ($idPermission) {
        $this->db->where('id_permission', $idPermission);
		return $this->db->get('permissao_colab')->result_array();
    }

    #ALTERA PERMISSÃO NO BANCO DE DADOS
	public function AlteraPermissao ($idPermission, $permission) {
		$this->db->where('id_permission', $idPermission);
		$this->db->update('permissao_colab', $permission);
		return TRUE;
	}

    #EXCLUÍ PERMISSÕES DO COLABORADOR
	public function DeletaPermissao ($id) {
		$this->db->where('id_permission', $id);
		$this->db->delete('permissao_colab');
		return TRUE;
	}

	#MOSTRA COLABORADOR NO AUTOCOMPLETE
    public function AutoCompleteColaborador ($nome) {
        $this->db->from('colaborador');
        $this->db->like('nome_colab', $nome, 'both');
        return $this->db->get()->result();
    }

    #MOSTRA INDISPONIBILIDADE DO COLABORADOR 
   	public function MostraTodasIndisponibilidades ($MesAtual, $AnoAtual) {
   		$this->db->where('mes_ind', $MesAtual);
   		$this->db->where('ano_ind', $AnoAtual);
   		$this->db->order_by('data_inicial', 'ASC');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

	#MOSTRA QUANTIDADE DE REGISTROS POR PÁGINA POR EVENTOS CADASTRADOS
   	public function MostraQtdRegInd ($MesAtual, $AnoAtual, $Inicial, $NumReg) {
   		$this->db->where('mes_ind', $MesAtual);
   		$this->db->where('ano_ind', $AnoAtual);
   		$this->db->limit($NumReg, $Inicial);
   		$this->db->order_by('data_inicial', 'ASC');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

	#MOSTRA INDISPONIBILIDADE DO COLABORADOR POR MÊS
   	public function MostraTodasIndisponibilidadesPorMes ($Mes, $AnoAtual) {
   		$this->db->where('mes_ind', $Mes);
   		$this->db->where('ano_ind', $AnoAtual);
   		$this->db->order_by('data_inicial', 'ASC');
		return $this->db->get('colaborador_indisponivel')->result_array();
	}

	#MOSTRA QUANTIDADE DE REGISTROS POR MÊS POR EVENTOS CADASTRADOS
   	public function MostraQtdRegIndPorMes ($Mes, $AnoAtual, $Inicial, $NumReg) {
   		$this->db->where('mes_ind', $Mes);
   		$this->db->where('ano_ind', $AnoAtual);
   		$this->db->limit($NumReg, $Inicial);
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

	#MOSTRA DETALHE DA INDISPONIBILIDADE DO COLABORADOR
   	public function MostraDetalheIndisponibilidade ($IdInd) {
   		$this->db->where('id_ind', $IdInd);
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

	#VERIFICA DADOS ESQUECI SENHA
	public function EsqueciSenha ($cpf, $Email) {
		$this->db->where('cpf_colab', $cpf);
		$this->db->where('email_colab', $Email);
		return $this->db->get('colaborador')->result_array();
	}

	#PESQUISA O COLABORADOR
	public function PesquisaColaborador ($pesquisa) {
		$this->db->from('colaborador');
        $this->db->like('nome_colab', $pesquisa, 'both');
        $this->db->or_where('cpf_colab', $pesquisa);
        return $this->db->get()->result();
	}

	public function VerAcessos($idColab) {
		return $this->db->get_where("acessos_sistema", array ("id_colab" => $idColab)) -> row_array();
	}

	public function TesteColaborador ($teste) {
		$this->db->update('colaborador', $teste);
		return TRUE;
	}

}