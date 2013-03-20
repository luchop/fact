<script type="text/javascript">

$(document).ready(function() {
	$("#NuevoMovimiento").validate({
        rules: {
            Fecha: {
                required: true,
				date:true
            },
            Monto: {
                required: true,
				number: true
            }
        },
        messages: {
            Fecha: {
                required: "Debe registrar la fecha del movimiento",
				date: "la fecha es incorrecta"
            },
            Monto: {
                required: "Registre el importe, por favor",
				number: "S&oacute;lo n&uacute;meros, por favor."
            }
        }
    });
});
</script>
<style type="text/css">
form label {
	text-align:left;
}

</style>
	
<div id='formulario' class='span-12 prefix-6 suffix-6 last center'>

<?php 
echo form_open('movimiento/Nuevo',  array('id' => 'NuevoMovimiento', 'name' => 'NuevoMovimiento'));
?>
<fieldset><legend>Nuevo ingreso/egreso</legend>
<br />

<div class='span-3 prefix-3'><input type="radio" name="Tipo" value="Ingreso" checked /> Ingreso</div>
<div class='span-3 suffix-3 last'><input type="radio" name="Tipo" value="Egreso" /> Egreso<br /></div>

<div class='span-6 prefix-2 suffix-4 last'>
<br /><label class='Rotulo'>Fecha *</label>
<?php
echo "<input type='text' name='Fecha' id='Fecha' size='12' maxlength='10' onclick='";
echo 'fPopCalendar("Fecha")'."' value='".$Fecha."'/>";
?></div><br />

<div class='span-8 prefix-1 suffix-3 last'>
<label class='Rotulo'>Cliente </label>
<div id='Cliente'><?php echo $ComboCliente; ?></div>
</div>

<div class='span-4 prefix-2'>
<label class='Rotulo' style='width:auto'>Monto *</label>
<input type='text' name='Monto' id='Monto' maxlength='12' size='10' value='<?php echo set_value('Monto'); ?>' />
</div>

<div class='span-4 suffix-2 last'>
<label class='Rotulo' style='width:auto'># recibo </label>
<input type='text' name='Recibo' id='Recibo' maxlength='10' size='10' value='<?php echo set_value('Recibo'); ?>' />
</div>

<div class='span-1 prefix-1'>
<label class='Rotulo' style='width:auto'>Notas</label>
</div>

<div class='span-10 last'>
<textarea id='Notas' name='Notas' cols='50' rows='3'>
<?php echo set_value('Notas'); ?>
</textarea><br /><br />
</div>

<hr />
<button class='button positive' style='margin-left:200px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Guardar
</button> 	  
</form>
</fieldset>
</div>