<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Header extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        self::is_online();
        
    }

    public function is_online(){
        if(!$this->session->userdata("IdUser")>0){
            echo "NãO ESTA LOGADO";
            redirect(base_url());
        }
    }

}