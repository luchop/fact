<?php

class Modelo_actividad extends CI_Model {
    private $Tabla = 'actividad_economica';

    function __construct() {
        parent::__construct();
    }
	
	function Insert($Codigo, $Nombre, $Grupo, $Nivel, $CodMayor, $Subcuentas) {
        $sql = "INSERT INTO $this->Tabla (Codigo, Nombre, Grupo, Nivel, CodMayor, Subcuentas)
				VALUES('$Codigo', '$Nombre', '$Grupo', $Nivel, $CodMayor, $Subcuentas)";
		$this->db->query($sql);
    }
	
	function Update($CodCuenta, $Codigo, $Nombre, $Grupo, $Nivel, $CodMayor, $Subcuentas) {
        $sql = "UPDATE $this->Tabla SET Codigo='$Codigo', Nombre='$Nombre', Grupo='$Grupo', 
				Nivel=$Nivel, CodMayor=$CodMayor, Subcuentas=Subcuentas 
				WHERE CodCuenta=$CodCuenta";
		$this->db->query($sql);
    }
	
	function Delete($CodCuenta) {
        $sql = "DELETE FROM $this->Tabla WHERE CodCuenta=$CodCuenta";
		$this->db->query($sql);
    }
	
	function GetDatos($CodCuenta, &$Codigo, &$Nombre, &$Grupo, &$Nivel, &$CodMayor, &$Subcuentas) {
        $sql = "SELECT FROM $this->Tabla WHERE CodCuenta=$CodCuenta";
		$resultado = $this->db->query($sql);
		if( $resultado.num_row()>0 ) {
			$r = $resultado->row();
			$Codigo = $r->Codigo; 
			$Nombre = $r->Nombre; 
			$Grupo = $r->Grupo; 
			$Nivel = $r->Nivel;
			$CodMayor = $r->CodMayor;
			$Subcuentas = $r->Subcuentas;
		}
		else {
			$Codigo = $Nombre = $Grupo = '';
			$Nivel = $CodMayor = $Subcuentas = 0;
		}
    }
	
	function ComboActividad($CodActividad=0) {
        $sql = "select * from $this->Tabla order by Nombre";
        $resultado = $this->db->query($sql);
        $s = "<select name='CodActividad' id='CodActividad'>";
		$s .= "<option value='0'>-- Seleccione la actividad --</option>";
        foreach($resultado->result() as $row) 
            $s .= "<option value='$row->CodActividadEconomica'".($CodActividad==$row->CodActividadEconomica? ' selected ':'').">$row->Nombre</option>";
        return $s."</select>";       	
	}
}