<script type="text/javascript">
$(document).ready(function() {
	$("#Usuario").validate();
});
</script>
<div id='formulario' class='span-14 prefix-5 suffix-5 last'>
<?php 
echo form_open('usuario/NuevoUsuario',  array('id' => 'Usuario', 'name' => 'Usuario'));
?>
<fieldset><legend>Nuevo usuario</legend>
<br />

<label class='Rotulo'>Nombre *</label>
<input id='Nombre' name='Nombre' size='40' maxlength='50' class='required' value='<?php echo set_value('Nombre'); ?>' /><br />

<label class='Rotulo'>Correo electr&oacute;nico *</label>
<input id='Correo' name='Correo' size='40' maxlength='60' class='required email' value='<?php echo set_value('Correo'); ?>' />
<?php echo '<br />'.form_error('Correo'); ?>

<label class='Rotulo'>Nombre de usuario *</label>
<input id='Nick' name='Nick' size='12' maxlength='12' class='required' value='<?php echo set_value('Nick'); ?>' />
<br /><?php echo form_error('Nick'); ?>

<label class='Rotulo'>Tipo *</label>
<?php echo $ComboPerfil; ?><br />

<label class='Rotulo'>Activo *</label>
<input type='checkbox' id='Activo' name='Activo' checked='checked' /><br />

<button class='button positive' style='margin-left:220px;'> 
	<img src='<?php echo base_url();?>bt/images/icons/tick.png' alt='' /> Guardar
</button> 	  
</form>
</fieldset>
</div>