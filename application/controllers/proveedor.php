<?php

class Proveedor extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    function Index() {
		$this->NuevoCliente();
    }

    function NuevoCliente() {
		$this->funciones->VerificaSesion();
		
		$this->form_validation->set_rules('Nombre', '"nombre"', 'trim');
        $this->form_validation->set_rules('Contacto', '"contacto"', 'trim');
        $this->form_validation->set_rules('Correo', 'correo electr&oacute;nico', 'trim|callback_CorreoNuevo');

        $data['EsCliente']=0;
        if ($this->form_validation->run()) {
			$this->modelo_cliente->Insert($this->input->post('Nombre'), $this->input->post('Contacto'),
						$this->input->post('NIT'), $this->input->post('Direccion'), $this->input->post('Telefono'),
						$this->input->post('Correo'), $this->input->post('Notas'), $data['EsCliente']);
			$data['Mensaje'] = "Se ha registrado un nuevo cliente.";                        
            $data['VistaPrincipal'] = 'vista_mensaje';            
        } else
            $data['VistaPrincipal'] = 'vista_nuevo_cliente';                                                
        $this->load->view('vista_maestra', $data);
    }

    function BuscaParaModificar($Modificacion) {
        $this->funciones->VerificaSesion();
        
        $this->form_validation->set_rules('Nombre', '"nombre"', 'trim|min_length[3]');
        $this->form_validation->set_rules('Contacto', '"nombre de contacto"', 'trim');
        $this->form_validation->set_rules('NIT', '"NIT"', 'trim');
		$data['EsCliente']=1;
                
        if ($this->form_validation->run()) {
            $registros = $this->modelo_cliente->Busqueda($this->input->post('Nombre'),$this->input->post('Contacto'), 
			                                             $this->input->post('NIT'), $this->input->post('Correo'));

            if( $Modificacion==1 )
                $Vista = 'vista_modifica_cliente';
            else
                $Vista = 'vista_consulta_cliente';
                
            if ($registros->num_rows() == 0) {
                $data['Mensaje'] = 'No se encontraron registros que cumplan el criterio de b&uacute;squeda';
                $data['VistaPrincipal'] = 'vista_mensaje';            
                $this->load->view('vista_maestra', $data);
            } else if ($registros->num_rows() == 1) {            //solo un registro encontrado                
                $data['Fila'] = $registros->row();
                $data['VistaPrincipal'] = $Vista;                      //'vista_modifica_cliente' o 'vista_consulta_cliente';
                $this->load->view('vista_maestra', $data);
            } else {                                             // varios registros encontrados: muestra lista
                //genera tabla
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Nombre del cliente', 'Contacto', 'Correo electr&oacute;nico', 'Acci&oacute;n');
                $aux = array('table_open' => '<table class="tablaseleccion">');
                $this->table->set_template($aux);
                $i = 0;
                foreach ($registros->result() as $registro)
                    $this->table->add_row(++$i, $registro->Nombre, $registro->Contacto, $registro->Correo,
                            anchor("cliente/CargaVista/$Vista/" . $registro->CodPersona, 
                                  ($Modificacion==1? ' Modificar ':' Ver '), 
                                  array('class'=>($Modificacion==1? ' actualiza':'vista'))). '  '.
                            anchor('cliente/BorrarCliente/' . $registro->CodPersona, 'Eliminar', array('class'=>'elimina',
                            'onclick'=>"return confirm('Realmente desea borrar este registro?')")));                
                $data['Tabla'] = $this->table->generate();
                $data['Vista'] = 'vista_busca_cliente';
                $data['VistaPrincipal'] = 'vista_lista_clientes';
                $this->load->view('vista_maestra', $data);
            }
        } else {
            $data['VistaPrincipal'] = 'vista_busca_cliente';
            $data['Modificacion'] = $Modificacion;
            $this->load->view('vista_maestra', $data);
        }
    }
    
    function ModificaCliente() {
        $this->funciones->VerificaSesion();
        
        $this->form_validation->set_rules('Nombre', '"nombre"', 'xss_clean');
        $this->form_validation->set_rules('Correo', 'correo electr&oacute;nico', 'xss_clean');
        $data['EsCliente']=1;
        if ($this->form_validation->run()) {
            $Accion = $this->input->post("submit");
            $data['VistaPrincipal'] = 'vista_mensaje';   
            if ($Accion == "guardar") {
                $CodInstitucion = $this->session->userdata('CodInstitucion');
                $this->modelo_cliente->Update($this->input->post('CodCliente'), $this->input->post('Nombre'), 
                                                $this->input->post('Contacto'), $this->input->post('NIT'), 
                                                $this->input->post('Direccion'),  $this->input->post('Telefono'), 
                                                $this->input->post('Correo'),  $this->input->post('Notas'), 1, 
                                                $CodInstitucion);
                $data['Mensaje'] = 'Se han modificado los datos del cliente.';                
            }
            else if ($Accion == "borrar") {
                $this->modelo_cliente->Delete($this->input->post('CodCliente'));
                $data['Mensaje'] = 'Los datos del cliente han sido eliminados.';
            }
            $this->load->view('vista_maestra', $data);
        } else {
            $data['VistaPrincipal'] = 'vista_nuevo_cliente';
            $this->load->view('vista_maestra', $data);
        }
    }
 
    function CargaVista($Vista, $CodCliente) {
		$data['EsCliente']=1;
        $data['Fila'] = $this->modelo_cliente->getFila($CodCliente);
        $data['VistaPrincipal'] = $Vista;
        $this->load->view('vista_maestra', $data);
    }

    function BorrarCliente($CodCliente) {
        $this->modelo_cliente->Delete($CodCliente);
        redirect('cliente','refresh');
    }
    
    //callback
    function CorreoNuevo($s) {
		if ( $this->modelo_cliente->ExisteCorreo($s) )	{
			$this->form_validation->set_message('CorreoNuevo', 'La direcci&oacute;n de correo ya se encuentra registrada.');
			return FALSE;
		}
		else
			return TRUE;
	}
}
?>