<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo.');

class Cambia_clave extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Index() {
        $this->funciones->VerificaSesion();
        
        $this->form_validation->set_rules('ClaveActual', '"contrase&ntilde;a actual"', 'trim');
        $this->form_validation->set_rules('NuevaClave1', '"nueva clave"', 'trim');
        $this->form_validation->set_rules('NuevaClave2', '"confirmacion de clave"', 'trim');
        if( $this->form_validation->run() ) {
		    $CodUsuario = $this->session->userdata('CodUsuario');
            if( $this->modelo_usuario->ClaveCorrespondeUsuario($this->input->post('ClaveActual'), $CodUsuario) )  {
                $this->modelo_usuario->CambiaClave( $CodUsuario, $this->input->post('NuevaClave1'));
				$data['Mensaje'] = 'La contrase&ntilde;a ha sido cambiada correctamente.';
			} else 
				$data['Mensaje'] = 'Contrase&ntilde;a incorrecta';
			$data['VistaPrincipal'] = 'vista_mensaje';
        }
        else  {
            $data['VistaPrincipal'] = 'vista_cambia_clave';
        }
        $this->load->view('vista_maestra', $data);
    }
    
    function Guardar() {
        //if ($this->form_validation->run()) {
            ;
        
            $CodUsuario = $this->session->userdata('CodUsuario');
            if($this->Modelo_usuario->ClaveCorrespondeUsuario($this->input->post('ClaveActual'), $CodUsuario) )
                {

                $this->Modelo_usuario->CambiaClave($CodUsuario, $this->input->post('NuevaClave1'));
                $data['Mensaje'] = 'La contrase&ntilde;a ha sido cambiada correctamente.';
                $data['VistaMenu'] = 'vista_menu';
                
                $data['VistaPrincipal'] = 'vista_mensaje';
                $this->load->view('vista_maestra', $data);
                }
            else {
                $data['VistaMenu'] = 'vista_menu';
                $data['Mensaje'] = 'Contrase&ntilde;a incorrecta';
                $data['VistaPrincipal'] = 'vista_mensaje';
                $this->load->view('vista_maestra', $data);
            }
            
            
        //} else {
          //  $data['VistaMenu'] = 'vista_menu';
           // $data['VistaPrincipal'] = 'vista_cambia_clave';
            //$this->load->view('vista_maestra', $data);
       // }
    }

}

?>