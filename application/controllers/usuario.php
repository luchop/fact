<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo.');

class Usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function Index() {
        $this->Nuevo();
    }
    
    function Nuevo(){
        //$data['ComboPerfil'] = $this->modelo_usuario->ComboPerfil();
        
		$this->form_validation->set_rules('Nombre', 'nombre', 'xss_clean');
		$this->form_validation->set_rules('Correo', 'correo', 'callback_CorreoUnico');
		$this->form_validation->set_rules('Nick', 'nombre de usuario', 'callback_NickUnico');
		
        if ($this->form_validation->run()) {
			$Activo = $this->input->post('Activo')? 1: 0;
			$Clave = $this->modelo_usuario->GeneraClaveUnica();
			$CodUsuario = $this->modelo_usuario->Insert($this->input->post('Nombre'), $this->input->post('Correo'), 
											$this->input->post('Nick'), $Clave,
											$Activo, $this->input->post('CodPerfil'));
			$data['Mensaje'] = "Se ha registrado un nuevo usuario. (Codigo: $Clave)";			
			$data['VistaPrincipal'] = 'vista_mensaje';
        } else {
            $data['VistaPrincipal'] = 'vista_nuevo_usuario';
        }
		$this->load->view('vista_maestra', $data);	
    }
    
    function Editar($codigo){
        $data['Fila'] = $this->modelo_usuario->GetXId($codigo);
        $data['VistaMenu'] = $this->Menu;
        $data['Tipo'] = 'editar';
        $data['ComboPerfil'] = $this->modelo_usuario->ComboPerfil();
        $data['ComboCarreras']=$this->modelo_carrera->ComboCarrerasHabilitadas(0,'CodCarrera',False,True);
        $data['VistaPrincipal'] = 'vista_editar_usuario';
        $this->load->view('vista_maestra', $data);
    }
    
    function Guardar() {
		if($this->input->post('Tipo')=="nuevo"){
			$this->modelo_usuario->InsertPersona($this->input->post('Paterno'),$this->input->post('Materno'),$this->input->post('Nombres'),$this->input->post('Telefono'),$this->input->post('Celular'),$this->input->post('Email'));
			$this->modelo_usuario->Insert($this->input->post('NombreUsuario'), $this->input->post('Clave'), $this->input->post('CodPerfil'));
			$this->Listado();
		}
		
		if($this->input->post('Tipo')=="editar"){
			$this->modelo_usuario->UpdatePersona($this->input->post('CodPersona'),$this->input->post('Paterno'),$this->input->post('Materno'),$this->input->post('Nombres'),$this->input->post('Telefono'),$this->input->post('Celular'),$this->input->post('Correo'));
			$this->modelo_usuario->Update($this->input->post('CodUsuario'),  $this->input->post('CodPersona'),$this->input->post('NombreUsuario'), $this->input->post('Clave'), $this->input->post('CodPerfil'));
			$this->Listado();
		}      
    }
    
    function Listado(){
        $registros = $this->modelo_usuario->GetAll();
        $this->load->library('table');
                $this->table->set_empty("&nbsp;");
                $this->table->set_heading('No.', 'Nombre Completo', 'Nombre Usuario', 'Perfil', 'Editar','Eliminar');
                $aux = array('table_open' => '<table class="tablaseleccion" style="margin:auto;">');
                $this->table->set_template($aux);
                $i = 0;
                
        foreach ($registros->result() as $registro)
             $this->table->add_row(++$i, $registro->Nombres." ".$registro->Paterno." ".$registro->Materno, $registro->NombreUsuario, $registro->Perfil, anchor("usuario/Editar/" . $registro->CodUsuario, 'Modificar',array('class'=>'actualiza')),anchor("usuario/Eliminar/" . $registro->CodUsuario, 'Eliminar',array('class'=>'elimina','onclick'=>"return confirm('Realmente desea borrar este registro?')")));
         
        $data['Tabla'] = $this->table->generate();
        $data['VistaMenu'] = $this->Menu;
        $data['VistaPrincipal'] = 'vista_listado_usuarios';
        $this->load->view('vista_maestra', $data);
    }
    
    function ListadoUsuarioCarrera(){
        $registros = $this->modelo_usuario->GetUsuarioCarrera($_POST['CodUsuario']);
        $tabla="<table class='tablaseleccion'  style='margin:auto;'>";
        $tabla.="<tr><th>#</th><th>Carrera</th><th>Eliminar</th><tr>";
        $i=0;
        foreach ($registros->result() as $registro)
         $tabla.="<tr><td>".++$i."</td><td>".$registro->Nombre."</td><td><a href='#' onclick='Eliminar(".$registro->CodUsuarioCarrera.")' class='elimina'>Eliminar</a></td><tr>";
        $tabla.="</table>"; 
        echo $tabla;
    }
    
    function InsertUsuarioCarrera() {
        $this->modelo_usuario->InsertUsuarioCarrera($_POST['CodUsuario'],$_POST['CodCarrera']);
            $this->ListadoUsuarioCarrera($_POST['CodUsuario']);
    }
    
    function EliminarUsuarioCarrera() {
        $this->modelo_usuario->DeleteUsuarioCarrera($_POST['CodUsuarioCarrera']);
            $this->ListadoUsuarioCarrera($_POST['CodUsuario']);
    }
    
    function Eliminar($CodUsuario) {
        $this->modelo_usuario->Disable($CodUsuario);
            $this->Listado();
    }
    
    function Verificacion() {
        if($this->modelo_usuario->GetXUsuario($_POST['Usuario']))
            echo "1";
        else 
            echo "0";
    }
}
?>