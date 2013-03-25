<div class='span-24'>
<?php
echo '<div id="page-wrap">
	<ul class="dropdown">';
    
//**** Menu Movimiento
	echo '<li><a href="#">Factoring</a>
			<ul class="sub_menu">';
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Registro de cobranza'>Nueva cobranza</a></li>";
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Modificacion de datos de cobranza'>Modificaci&oacute;n de cobranza</a></li>";
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Registro de nueva operacion'>Nueva operaci&oacute;n</a></li>";
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Registro de nueva operacion'>Modificaci&oacute;n de  operaci&oacute;n</a></li>";
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo'>Clientes</a>";
			echo "<ul class='sub_menu'>";
				echo "<li><a href='".base_url()."index.php/cliente/Nuevo' title='Registro de nuevo cliente'>Nuevo cliente</a></li>";
				echo "<li><a href='".base_url()."index.php/cliente/BuscaParaModificar/1' title='Modificacion de datos de cliente'>Modificar datos de cliente</a></li>";
			echo "</ul></li>";
			echo "<li><a href='".base_url()."index.php/movimiento/Nuevo'>Deudores</a>";
			echo "<ul>";
				echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Registro de nuevo deudor'>Nuevo deudor</a></li>";
				echo "<li><a href='".base_url()."index.php/movimiento/Nuevo' title='Modificacion de datos de deudor'>Modificar datos de deudor</a></li>";
			echo "</ul></li>";
	echo "</ul></li>";


//**** Menu Registros
	echo "<li><a href='#'>Contabilidad</a>
			<ul class='sub_menu'>";
			echo "<li><a href='".base_url()."index.php/cliente/NuevoCliente' title='Registro de nuevo asiento contable'>Nuevo asiento</a></li>";
			echo "<li><a href='".base_url()."index.php/cliente/BuscaParaModificar/1' title='Modificar datos de asiento'>Modificar asiento</a></li>";
			echo "<li><a href='".base_url()."index.php/proveedor/NuevoCliente' title='Consulta de asiento'>Consulta asiento</a></li>";
			echo "<li><a href='".base_url()."index.php/proveedor/BuscaParaModificar/1'>Configuraci&oacute;n</a>";
				echo "<ul><li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Registro de nuevas cuentas contables'>Nueva cuenta</a></li>";
				echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Modificacion de datos de cuenta'>Modificacion de cuenta</a></li>";
				echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Registro de libros diarios'>Diarios</a></li>";
				echo "<li><a href='".base_url()."index.php/matriculacion/BuscaParaEliminar' title='Cuentas para asientos automaticos de factoring'>Cuentas de factoring</a></li>";
				echo "</ul></li>";
	echo "</ul></li>";


//**** Menu Reportes

	echo "<li><a href='#' >Reportes</a>
			<ul>";  
            echo "<li><a href='".base_url()."index.php/listados/ImprimeMatricula' title='Impresion de matricula'>Reporte por cuenta</a></li>";
			echo "<li><a href='".base_url()."index.php/listados/ExportaListaCarrera' title='Genera archivo para recuperacion en MS Excel'>Reporte por cliente</a></li>";
			echo "<li><a href='".base_url()."index.php/listados/ExportaListaCarrera' title='Genera archivo para recuperacion en MS Excel'>Reporte por proveedor</a></li>";
			echo "<li><a href='".base_url()."index.php/auditoria/BuscaParaAuditoria' >Reporte de movimientos</a></li>";
			echo "<li><a href='".base_url()."index.php/auditoria/BuscaParaAuditoria' >Exportacion a Excel</a></li>";
		echo "</ul></li>";


//**** Menu Configuracion

	echo "<li><a href='#' >Configuracion</a>
			<ul>";

			echo "<li><a href='".base_url()."index.php/usuario/Listado' >Administraci&oacute;n de usuarios</a> 
					<ul>
						<li><a href='".base_url()."index.php/usuario/Nuevo' >Nuevo usuario</a> </li>
						<li><a href='".base_url()."index.php/usuario/Listado'>Modificacion datos usuario</a> </li>
						<li><a href='".base_url()."index.php/perfil/Nuevo'>Nuevo perfil</a> </li>
						<li><a href='".base_url()."index.php/perfil/Listado'>Modificacion de perfil</a> </li>
					</ul>
				</li>";
    echo "<li><a href='".base_url()."index.php/listados/ImprimeMatricula' title='Registro de entidades bancarias'>Bancos</a></li>";
	echo "<li><a href='".base_url()."index.php/listados/ImprimeMatricula' title='Registro de actividades economicas'>Actividades econ&oacute;micas</a></li>";
	echo "</ul></li>";

echo "<li><a href='".base_url()."index.php/cambia_clave' title='Cambio de contraseña'>Cambia clave</a></li>";
echo "<li><a href='".base_url()."index.php/login/Logout' title='Cerrar sesi&oacute;n'>Salir</a></li>";
?>
</ul>
</div>
<hr />
</div>