<div class='span-24'>
<?php
echo '<div id="page-wrap">
	<ul class="dropdown">';
    
//**** Menu Movimiento
if($Llave[1] || $Llave[2]) {
	echo '<li><a href="#">Movimientos</a>
			<ul class="sub_menu">';
		if($Llave[1]) 
			echo "<li><a href='".base_url()."index.php/formulario/NuevoEstudiante' title='Nuevo universitario'>Nuevo movimiento</a></li>";
		if($Llave[2])
			echo "<li><a href='".base_url()."index.php/estudiante/BuscaParaModificar/1' title='Modificar datos de universitario'>Modificar movimiento</a></li>";
	echo "</ul></li>";
}

//**** Menu Registros
if($Llave[5] || $Llave[6] || $Llave[7]) {
	echo "<li><a href='#'>Registros</a>
			<ul class='sub_menu'>";
        if($Llave[5])
			echo "<li><a href='".base_url()."index.php/cliente/NuevoCliente' title='Registro de nuevo cliente'>Nuevo cliente</a></li>";
		if($Llave[6])
			echo "<li><a href='".base_url()."index.php/cliente/BuscaParaModificar/1' title='Modificar datos de cliente'>Modificar datos cliente</a></li>";
		if($Llave[7])
			echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Eliminar registro de matriculacion'>Nuevo proveedor</a></li>";
        if($Llave[7])
			echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Eliminar registro de matriculacion'>Modificar datos proveedor</a></li>";
        if($Llave[7])
			echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Eliminar registro de matriculacion'>Nueva cuenta</a></li>";
        if($Llave[7])
			echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Eliminar registro de matriculacion'>Modificar cuenta</a></li>";
	echo "</ul></li>";
}

//**** Menu Reportes
if($Llave[8] || $Llave[8] || $Llave[8] || $Llave[14] || $Llave[15] || $Llave[22]) {
	echo "<li><a href='#' >Reportes</a>
			<ul>";  
		if ($Llave[8])
            echo "<li><a href='".base_url()."index.php/listados/ImprimeMatricula' title='Impresion de matricula'>Reporte por cuenta</a></li>";
		if ($Llave[15]) 
			echo "<li><a href='".base_url()."index.php/listados/ExportaListaCarrera' title='Genera archivo para recuperacion en MS Excel'>Reporte por cliente</a></li>";
        if ($Llave[15]) 
			echo "<li><a href='".base_url()."index.php/listados/ExportaListaCarrera' title='Genera archivo para recuperacion en MS Excel'>Reporte por proveedor</a></li>";
		if ($Llave[22])
			echo "<li><a href='".base_url()."index.php/auditoria/BuscaParaAuditoria' >Reporte de movimientos</a></li>";
        if ($Llave[22])
			echo "<li><a href='".base_url()."index.php/auditoria/BuscaParaAuditoria' >Exportacion a Excel</a></li>";
		echo "</ul></li>";
}

//**** Menu Configuracion
if($Llave[16] || $Llave[21] || $Llave[17] || $Llave[18] || $Llave[19] || $Llave[20]) {        
	echo "<li><a href='#' >Configuracion</a>
			<ul>";
		if ($Llave[21])
			echo "<li><a href='".base_url()."index.php/usuario/Listado' >Administraci&oacute;n de usuarios</a> 
					<ul>
						<li><a href='".base_url()."index.php/usuario/Nuevo' >Nuevo usuario</a> </li>
						<li><a href='".base_url()."index.php/usuario/Listado'>Modificacion datos usuario</a> </li>
						<li><a href='".base_url()."index.php/perfil/Nuevo'>Nuevo perfil</a> </li>
						<li><a href='".base_url()."index.php/perfil/Listado'>Modificacion de perfil</a> </li>
					</ul>
				</li>";
    echo "</ul></li>";
}
echo "<li><a href='".base_url()."index.php/cambia_clave' title='Cambio de contraseña'>Cambia clave</a></li>";
echo "<li><a href='".base_url()."index.php/login/Logout' title='Cerrar sesi&oacute;n'>Salir</a></li>";
?>
</ul>
</div>
<hr />
</div>