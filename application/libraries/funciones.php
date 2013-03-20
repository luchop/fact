<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funciones {           
    
	protected $ci;
   
    function __construct(){
		$this->ci =& get_instance();
    }
	
	function VerificaSesion() {
		return true;
        //if(! $this->ci->session->userdata('CodUsuario') ) redirect('login');
	}
}

?>