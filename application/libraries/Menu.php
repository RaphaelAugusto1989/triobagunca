<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu {

    public function PermissaoMenus()  {
	    $CI =& get_instance();
	    $id = $CI->session->userdata('IdUser');
	    $CI->load->model('Colaborador_model');

	    $lista = $CI->Colaborador_model->Permissoes($id);
	    return $dados = array('permissao' => $lista); 
  	}
}