<script type="text/javascript">

$(document).ready(function() {
	$("#NuevoCliente").validate({
        rules: {
            Nombre: {
                required: true
            },
            Correo: {
                email: true
            }
        },
        messages: {
            Nombre: {
                required: "Debe registrar el nombre del cliente."
            },
            Correo: {
                email: "Correo incorrecto.",
            }
        }
    });
});
</script>
<div id='formulario' class='span-16 prefix-4 suffix-4 last'>

<?php 
echo form_open('cliente/NuevoCliente',  array('id' => 'NuevoCliente', 'name' => 'NuevoCliente'));
?>
<fieldset><legend>Nuevo cliente</legend>
<br />

<label class='Rotulo'>Nombre *</label>
<input type='text' name='Nombre' id='Nombre' maxlength='60' size='50' class='required' value='<?php echo set_value('Nombre'); ?>' /><br />

<label class='Rotulo'>Contacto </label>
<input type='text' name='Contacto' id='Contacto' maxlength='60' size='50' value='<?php echo set_value('Contacto'); ?>' /><br />

<label class='Rotulo'>NIT </label>
<input type='text' name='NIT' id='NIT' maxlength='15' size='15' value='<?php echo set_value('NIT'); ?>' /><br />

<label class='Rotulo'>Direcci&oacute;n </label>
<input type='text' name='Direccion' id='Direccion' maxlength='100' size='60' value='<?php echo set_value('Direccion'); ?>' /><br />

<label class='Rotulo'>Tel&eacute;fono </label>
<input type='text' name='Telefono' id='Telefono' maxlength='20' size='30' value='<?php echo set_value('Telefono'); ?>' /><br />

<label class='Rotulo'>Correo </label>
<input type='text' name='Correo' id='Correo' maxlength='60' size='50' value='<?php echo set_value('Correo'); ?>' /><br />
<?php echo form_error('Correo'); ?>

<label class='Rotulo'>Notas</label>
<textarea id='Notas' name='Notas' cols='50' rows='3'>
<?php echo set_value('Notas'); ?>
</textarea><br /><br />

<button class='button positive' style='margin-left:260px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Guardar
</button> 	  
</form>
</fieldset>
</div>