<?php

class Cliente extends CI_Controller {

    private $Cliente;
	
	function __construct() {
        parent::__construct();
        $this->Cliente = 1;
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    function Index() {
		$this->Nuevo();
    }

    function Nuevo() {
		$this->funciones->VerificaSesion();
		
		$this->form_validation->set_rules('Nombre', '"nombre"', 'trim');
        $this->form_validation->set_rules('Contacto', '"contacto"', 'trim');
		$this->form_validation->set_rules('NIT', '"RUT"', 'trim');
        $this->form_validation->set_rules('Correo', 'correo electr&oacute;nico', 'trim');
        $this->form_validation->set_rules('Correo', '"correo"', 'callback_CorreoNuevo');

        $data['EsCliente'] = $this->Cliente;
		$data['ComboActividad'] = $this->modelo_actividad->ComboActividad();
        if ($this->form_validation->run()) {
			$CodPersona = $this->modelo_persona->Insert($this->input->post('Nombre'), $this->input->post('Contacto'),
														$this->input->post('NIT'), $this->input->post('Direccion'), $this->input->post('Zona'),
														$this->input->post('Ciudad'), $this->input->post('Telefono'),
														$this->input->post('Correo'), $this->input->post('Notas'));
			$this->modelo_cliente->Insert($CodPersona, $this->input->post('CodActividad'), $this->input->post('Limite'));
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
		$data['EsCliente'] = $this->Cliente;
                
        if ($this->form_validation->run()) {
            $registros = $this->modelo_cliente->Busqueda($this->input->post('Nombre'),$this->input->post('Contacto'), 
			                                             $this->input->post('NIT'), $this->input->post('Correo'));  //$this->Cliente

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
                $data['ComboActividad'] = $this->modelo_actividad->ComboActividad($data['Fila']->CodActividadEconomica);
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
        
        $this->form_validation->set_rules('Nombre', '"nombre"', 'trim|xss_clean');
		$this->form_validation->set_rules('Contacto', '"nombre de contacto"', 'trim|xss_clean');
        $this->form_validation->set_rules('NIT', '"NIT"', 'trim');
        $this->form_validation->set_rules('Correo', 'correo electr&oacute;nico', 'trim|xss_clean');
        $data['EsCliente'] = $this->Cliente;
        if ($this->form_validation->run()) {
            $Accion = $this->input->post("submit");
            $data['VistaPrincipal'] = 'vista_mensaje';   
            if ($Accion == "guardar") {
				$CodPersona = $this->input->post('CodPersona');
                $this->modelo_persona->Update($CodPersona, $this->input->post('Nombre'), $this->input->post('Contacto'),
												$this->input->post('NIT'), $this->input->post('Direccion'), $this->input->post('Zona'),
												$this->input->post('Ciudad'), $this->input->post('Telefono'),
												$this->input->post('Correo'), $this->input->post('Notas'));
				$this->modelo_cliente->Update($CodPersona, $this->input->post('CodActividad'), $this->input->post('Limite'));
                $data['Mensaje'] = 'Se han modificado los datos del cliente.';                
            }
            else if ($Accion == "borrar") {
                $this->modelo_cliente->Delete($this->input->post('CodPersona'));
                $data['Mensaje'] = 'Los datos del cliente han sido eliminados.';
            }
            $this->load->view('vista_maestra', $data);
        } else {
            $data['VistaPrincipal'] = 'vista_nuevo_cliente';
            $this->load->view('vista_maestra', $data);
        }
    }
 
    function CargaVista($Vista, $CodPersona) {
		$data['EsCliente'] = $this->Cliente;
        $data['Fila'] = $this->modelo_cliente->GetFila($CodPersona);
        $data['ComboActividad'] = $this->modelo_actividad->ComboActividad($data['Fila']->CodActividadEconomica);
		$data['VistaPrincipal'] = $Vista;
        $this->load->view('vista_maestra', $data);
    }

    function BorrarCliente($CodPersona) {
        $this->modelo_cliente->Delete($CodPersona);
        redirect('cliente','refresh');
    }
    
    //callback
    function CorreoNuevo($s) {
		if ( $s!='' and $this->modelo_persona->ExisteCorreo($s) )	{
			$this->form_validation->set_message('CorreoNuevo', 'La direcci&oacute;n de correo ya se encuentra registrada.');
			return FALSE;
		}
		else
			return TRUE;
	}
}
?>