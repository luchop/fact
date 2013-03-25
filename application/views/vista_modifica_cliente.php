<script type="text/javascript">

$(document).ready(function() {
	$("#ModificaCliente").validate({
        rules: {
            Nombre: {
                required: true
            },
			NIT: {
                required: true
            },
            Correo: {
                email: true
            },
			CodActividad: {
				min: 1
            },
			Limite: {
				number: true
            }
        },
        messages: {
            Nombre: {
                required: "Debe registrar el nombre del cliente."
            },
			NIT: {
                required: "Por favor, registre el RUT."
            },
            Correo: {
                email: "Correo incorrecto.",
            },
			CodActividad: {
				min: "Seleccione la actividad econ&oacute;mica, por favor."
            },
			Limite: {
				number: "Debe registrar el l&iacute;mite de cr&eacute;dito."
            }
        }
    });
	
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
	$ruta= 'deudor/ModificaDeudor';
	$titulo='deudores';
}
echo form_open($ruta,  array('id' => 'ModificaCliente', 'name' => 'ModificaCliente'));
?>

<div id='formulario' class='span-16 prefix-4 suffix-4 last'>

<?php 
echo form_open($ruta,  array('id' => 'ModificaCliente', 'name' => 'ModificaCliente'));
?>
<fieldset><legend>Modificaci&oacute;n de <?php echo $titulo; ?></legend>
<br />

<label class='Rotulo'>Nombre *</label>
<input type='text' name='Nombre' id='Nombre' maxlength='60' size='50' class='required' value='<?php echo $Fila->Nombre; ?>' /><br />

<label class='Rotulo'>Contacto </label>
<input type='text' name='Contacto' id='Contacto' maxlength='60' size='50' value='<?php echo $Fila->Contacto; ?>' /><br />

<label class='Rotulo'>RUT *</label>
<input type='text' name='NIT' id='NIT' maxlength='15' size='15' value='<?php echo $Fila->Identificacion; ?>' /><br />

<label class='Rotulo'>Direcci&oacute;n </label>
<input type='text' name='Direccion' id='Direccion' maxlength='100' size='60' value='<?php echo $Fila->Direccion; ?>' /><br />
<label class='Rotulo'>Comuna </label>
<input type='text' name='Zona' id='Zona' maxlength='20' size='30' value='<?php echo $Fila->Zona; ?>' /><br />
<label class='Rotulo'>Ciudad </label>
<input type='text' name='Ciudad' id='Ciudad' maxlength='20' size='30' value='<?php echo $Fila->Ciudad; ?>' /><br />

<label class='Rotulo'>Tel&eacute;fono </label>
<input type='text' name='Telefono' id='Telefono' maxlength='20' size='30' value='<?php echo $Fila->Telefono; ?>' /><br />

<label class='Rotulo'>Correo </label>
<input type='text' name='Correo' id='Correo' maxlength='60' size='50' value='<?php echo $Fila->Correo; ?>' /><br />
<?php echo form_error('Correo'); ?>

<label class='Rotulo'>Notas</label>
<textarea id='Notas' name='Notas' cols='50' rows='3'>
<?php echo set_value('Notas'); ?>
</textarea><br /><br />

<hr />
<label class='Rotulo'>Actividad econ&oacute;mica </label>
<?php echo $ComboActividad; ?><br /><br />
<label class='Rotulo'>L&iacute;mite de cr&eacute;dito </label>
<input type='text' name='Limite' id='Limite' maxlength='15' size='12' value='<?php echo $Fila->LimiteCredito; ?>' /><br />
<input type='hidden' name='CodPersona' id='CodPersona' value='<?php echo $Fila->CodPersona; ?>' />

<hr />
<button type='submit' class='button positive' style='margin-left:230px;' name='submit' id='Guardar' value='guardar'> 
	<img src='<?php echo base_url(); ?>css/images/icons/tick.png' alt='Guardar'> Guardar </button>
<button type='submit' class='button positive' name='submit' id='Borrar' value='borrar'> 
	<img src='<?php echo base_url(); ?>css/images/icons/cross.png' alt='Borrar el registro'> Borrar </button>
	
</form>
</fieldset>
</div>