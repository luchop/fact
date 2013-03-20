<script type="text/javascript">
$(document).ready(function() {
	$("#Cliente").validate();
    
    $("#Borrar").click(function(e) {
        return confirm('Realmente desea borrar este registro?')
    });
});
</script>

<?php 
if ($EsCliente==1){
	$ruta= 'cliente/ModificaCliente';
	$titulo= 'clientes';	
} else {
	$ruta= 'proveedor/ModificaProveedor';
	$titulo='proveedores';
}
echo form_open($ruta,  array('id' => 'Cliente', 'name' => 'Cliente'));
?>

<div id='formulario' class='span-14 prefix-5 suffix-5 last'>
<fieldset><legend>Nuevo cliente</legend>
<br />

<input type='hidden' name='CodCliente' id='CodCliente' value='<?php echo $Fila->CodPersona; ?>' />

<label class='Rotulo'>Nombre </label>
<input type='text' name='Nombre' id='Nombre' maxlength='60' size='40' class='required' value='<?php echo $Fila->Nombre; ?>' /><br />

<label class='Rotulo'>Contacto </label>
<input type='text' name='Contacto' id='Contacto' maxlength='60' size='40' value='<?php echo $Fila->Contacto; ?>' /><br />

<label class='Rotulo'>NIT </label>
<input type='text' name='NIT' id='NIT' maxlength='15' size='15' value='<?php echo $Fila->Identificacion; ?>' /><br />

<label class='Rotulo'>Direcci&oacute;n </label>
<input type='text' name='Direccion' id='Direccion' maxlength='100' size='50' value='<?php echo $Fila->Direccion; ?>' /><br />

<label class='Rotulo'>Tel&eacute;fono </label>
<input type='text' name='Telefono' id='Telefono' maxlength='50' size='40' value='<?php echo $Fila->Telefono; ?>' /><br />

<label class='Rotulo'>Correo </label>
<input type='text' name='Correo' id='Correo' maxlength='60' size='40' class='email' value='<?php echo $Fila->Correo; ?>' /><br />

<label class='Rotulo'>Notas</label>
<textarea id='Notas' name='Notas' cols='45' rows='4'>
<?php echo $Fila->Notas; ?>
</textarea><br /><br />

<hr />
<button type='submit' class='button positive' style='margin-left:180px;' name='submit' id='Guardar' value='guardar'> 
	<img src='<?php echo base_url(); ?>css/images/icons/tick.png' alt='Guardar'> Guardar </button>
<button type='submit' class='button positive' name='submit' id='Borrar' value='borrar'> 
	<img src='<?php echo base_url(); ?>css/images/icons/cross.png' alt='Borrar el registro'> Borrar </button>

</form>
</fieldset>
</div>