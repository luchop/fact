<?php

class Modelo_cuenta extends CI_Model {
    private $Tabla = 'cuenta';

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
	
	function ComboCuenta($CodCuenta=0, $Grupo='') {
        $sql = "select * from $this->Tabla where Activo=1 ";
		if( $Grupo!='' )
			$sql .= "and Grupo='$Grupo' ";
		$sql .= "order by Orden, Codigo";
        $resultado = $this->db->query($sql);
        $s = "<select name='CodCuenta' id='CodCuenta'>";
		$s .= "<option value=''>-- Seleccione la cuenta --</option>";
        foreach($resultado->result() as $row) 
            $s .= "<option value=".$row->CodCuenta.($CodCuenta==$row->CodCuenta? ' selected ':'').">".$row->Nombre."</option>";
        return $s."</select>";       	
	}
}