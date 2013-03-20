<?php

class Modelo_cliente extends CI_Model {

    //nombre de la tabla
    private $Tabla = 'persona';
	private $EsCliente;

    function __construct() {
        parent::__construct();
		$this->EsCliente=1;
    }
	
	function EsProveedor(){
		$this->EsCliente=0;
	}

    function Insert($Nombre, $Contacto, $Identificacion, $Direccion, $Telefono, $Correo, $Notas, $Cliente) {
        $sql = "INSERT INTO $this->Tabla (Nombre, Contacto, Identificacion, Direccion, 
				Telefono, Correo, Notas, Cliente, Activo) 
                VALUES ('$Nombre', '$Contacto', '$Identificacion', '$Direccion', 
				'$Telefono', '$Correo', '$Notas', $Cliente, 1)";
        $this->db->query($sql);  
        
        $sql = "SELECT LAST_INSERT_ID() AS Codigo";
        $query = $this->db->query($sql);
        if ( $query->num_rows()>0 )
           return $query->row()->Codigo;
        else        
            return 0;
    }

    function Update($CodPersona, $Nombre, $Contacto, $Identificacion, $Direccion, $Telefono, $Correo, $Notas) {
        $sql = "UPDATE $this->Tabla SET Nombre='$Nombre', Contacto='$Contacto', Identificacion='$Identificacion',
                Direccion='$Direccion', Telefono='$Telefono', Correo='$Correo', Notas='$Notas'
                WHERE CodPersona=$CodPersona";
        return $this->db->query($sql);
    }

    function Busqueda($Nombre, $Contacto, $Identificacion, $Correo, $Cliente) {
        $sql = "select * from $this->Tabla where 
                (Nombre like '%$Nombre%' or '$Nombre'='') and 
                (Contacto like '%$Contacto%' or '$Contacto'='') and 
                (Identificacion like '%$Identificacion%' or '$Identificacion'='') and 
                (Correo='$Correo' or '$Correo'='') 
				and Cliente='$Cliente'
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
    
    function EsAdministrador($CodPersona) {
        $sql = "SELECT * FROM $this->Tabla WHERE CodPersona=? AND Activo=1";  //1:administrador
        $query = $this->db->query($sql, array($CodPersona));
        return $query->num_rows()>0;        
    }
    
    function BuscarCliente($Cliente){
        $sql = "SELECT * FROM $this->Tabla
                WHERE (Nombres LIKE('%$Cliente%')
                OR Apellidos LIKE('%$Cliente%')) and
				Cliente='$this->EsCliente'
                ORDER BY Nombres, Apellidos";
        $resultado=mysql_query($sql,$link); 
        return $resultado;
    }
    
    function NombreCliente($CodPersona) {
        $sql = "select * FROM $this->Tabla WHERE CodPersona=$CodPersona";
        $query = $this->db->query($sql);
        if($query->num_rows()>0) {
            $row = $query->row();
            return $row->Nombre;
        } else
            return '';
    }
    
    function ComboCliente($Cliente=1, $CodPersona=0) {
        $sql = "select * from $this->Tabla where Cliente=".($Cliente?1:0)." order by Nombre";
        $resultado = $this->db->query($sql);
        $s = "<select name='CodCliente' id='CodCliente'>";
		$s .= "<option>-- Seleccione el ".($Cliente?'cliente':'proveedor')." --</option>";
        foreach($resultado->result() as $row) 
            $s .= "<option value=".$row->CodPersona.($CodPersona==$row->CodPersona? ' selected ':'').">".$row->Nombre."</option>";
        return $s."</select>";       
    }
    
    function ExisteNick($s) {
        $sql = "SELECT CodPersona FROM $this->Tabla WHERE Nick='$s'";
        $query = $this->db->query($sql);
        return ($query->num_rows()>0);
    }
    
    function ExisteCorreo($s) {
        $sql = "SELECT CodPersona FROM $this->Tabla WHERE Correo='$s'";
        $query = $this->db->query($sql);
        return ($query->num_rows()>0);
    }
    
    //devuelve codigo de cliente.	
    function Verifica($nick, $clave, &$Codigo) {
		$sql = "SELECT CodPersona FROM $this->Tabla WHERE Nick=? AND Clave=SHA1(?)";							
		$query = $this->db->query($sql, array($nick, $clave));
		if ($query->num_rows() > 0) {    //encontrado 
			$row = $query->row(); 
			$Codigo = $row->CodPersona;
			return true;
		}
		else
			return false;
	}
    
    function GetNombre($CodPersona) {
        $sql = "SELECT Nombre FROM $this->Tabla WHERE CodPersona=$CodPersona";
        $query = $this->db->query($sql);
        if( $query->num_rows()>0) {
            $row = $query->row();
            return $row->Nombre;
        }
        else
            return '';
    }
    
    function CambiaClave( $CodPersona, $NuevaClave ) {
        $sql = "UPDATE $this->Tabla SET Clave=MD5($NuevaClave) WHERE CodPersona=$CodPersona";
        $this->db->query($sql);
    }
 
}

?>