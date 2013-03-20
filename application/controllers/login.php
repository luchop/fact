<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo.');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Index() {
        $data['VistaPrincipal'] = 'vista_login';
        $data['VistaMenu'] = False;
        
        $this->form_validation->set_rules('NombreUsuario', '"nombre de usuario"', 'required');
        if($this->form_validation->run()) {
			if( $this->modelo_usuario->ExisteUsuario($this->input->post('NombreUsuario'), $this->input->post('Clave'), 
			                                         $CodUsuario, $Permisos) ) {
				$this->session->set_userdata(array('CodUsuario' => $CodUsuario, 'Permisos' => $Permisos));
                $data['VistaMenu'] = True;
				$data['VistaPrincipal'] = 'vista_nula';
			} else 
				$data['Error'] = "<span class='error' >Nombre o contrase&ntilde;a incorrecta.</span><br />";
		}
		$this->load->view('vista_maestra', $data);
    }

    function Logout() {
        $this->session->unset_userdata('Permisos');
        $this->session->unset_userdata('CodUsuario');
        //session_destroy();
        $data['VistaMenu'] = False;
        $data['VistaPrincipal'] = 'vista_login';
		$this->load->view('vista_maestra', $data);
    }
}

?>