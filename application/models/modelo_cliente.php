<?php

class Modelo_cliente extends CI_Model {

    //nombre de la tabla
    private $Tabla = 'cliente';

    function __construct() {
        parent::__construct();
    }

    function Insert($CodPersona, $CodActividad, $Limite) {
        $sql = "INSERT INTO $this->Tabla (CodPersona, CodActividadEconomica, LimiteCredito) 
                VALUES ('$CodPersona', '$CodActividad', '$Limite')";
        $this->db->query($sql);  
    }

    function Update($CodPersona, $CodActividad, $Limite) {
        $sql = "UPDATE $this->Tabla SET CodActividadEconomica='$CodActividad', LimiteCredito='$Limite'
                WHERE CodPersona=$CodPersona";
        return $this->db->query($sql);
    }

    function Busqueda($Nombre, $Contacto, $Identificacion, $Correo) {
        $sql = "select * from cliente, persona where cliente.CodPersona=persona.CodPersona AND
                (Nombre like '%$Nombre%' or '$Nombre'='') and 
                (Contacto like '%$Contacto%' or '$Contacto'='') and 
                (Identificacion like '%$Identificacion%' or '$Identificacion'='') and 
                (Correo='$Correo' or '$Correo'='') 
                ORDER BY Nombre";
        return $this->db->query($sql);
    }

    function Delete($CodPersona) {
        $this->db->where('CodPersona', $CodPersona);
        $this->db->delete($this->Tabla);
    }
	
	function GetFila($CodPersona) {
        $sql = "select * from cliente, persona where cliente.CodPersona=persona.CodPersona 
				AND cliente.CodPersona=$CodPersona";
        return $this->db->query($sql)->row();
    }
}

?>