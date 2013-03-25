<?php

class Modelo_persona extends CI_Model {

    //nombre de la tabla
    private $Tabla = 'persona';

    function __construct() {
        parent::__construct();
    }

    function Insert($Nombre, $Contacto, $Identificacion, $Direccion,$Zona,$Ciudad, $Telefono, $Correo, $Notas) {
        $sql = "INSERT INTO $this->Tabla (Nombre, Contacto, Identificacion, Direccion, Zona, Ciudad,
				Telefono, Correo, Notas, Activo) 
                VALUES ('$Nombre', '$Contacto', '$Identificacion', '$Direccion', '$Zona', '$Ciudad', 
				'$Telefono', '$Correo', '$Notas', 1)";
        $this->db->query($sql);  
        
        $sql = "SELECT LAST_INSERT_ID() AS Codigo";
        $query = $this->db->query($sql);
        if ( $query->num_rows()>0 )
           return $query->row()->Codigo;
        else        
            return 0;
    }
	
	function Update($CodPersona, $Nombre, $Contacto, $Identificacion, $Direccion,$Zona,$Ciudad, $Telefono, $Correo, $Notas) {
		$sql = "UPDATE $this->Tabla SET Nombre='$Nombre', Contacto='$Contacto', Identificacion='$Identificacion',
                Direccion='$Direccion', Zona='$Zona', Ciudad='$Ciudad', Telefono='$Telefono', 
				Correo='$Correo', Notas='$Notas'
                WHERE CodPersona=$CodPersona";
        return $this->db->query($sql);
	}

    function Busqueda($Nombre, $Contacto, $Identificacion, $Correo, $Cliente) {
        $sql = "select * from $this->Tabla where 
                (Nombre like '%$Nombre%' or '$Nombre'='') and 
                (Contacto like '%$Contacto%' or '$Contacto'='') and 
                (Identificacion like '%$Identificacion%' or '$Identificacion'='') and 
                (Correo='$Correo' or '$Correo'='') 
                ORDER BY Nombre";
        return $this->db->query($sql);
    }

    function getFila($CodPersona) {
        $sql = "select * from $this->Tabla where CodPersona=$CodPersona";
        return $this->db->query($sql)->row();
    }

    function Delete($CodPersona) {
        $this->db->where('CodPersona', $CodPersona);
        $this->db->delete($this->Tabla);
    }
    
    function ExisteCorreo($s) {
        $sql = "SELECT CodPersona FROM $this->Tabla WHERE Correo='$s'";
        $query = $this->db->query($sql);
        return ($query->num_rows()>0);
    }  
}

?>