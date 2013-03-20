<script type="text/javascript">
$(document).ready(function() {
	$("#Cliente").validate({
        rules: {
            Nombre: {
                minlength: 3
            },
            Contacto: {
                minlength: 3
            },
            Correo: {
                email: true
            }
        },
        messages: {
            Nombre: {
                minlength: "Debe registrar 3 caracteres o mas."
            },
            Contacto: {
                minlength: "Debe registrar 3 caracteres o mas."
            },
            Correo: {
                email: "Correo incorrecto.",
            }
        }
    });
});
</script>

<?php 
echo form_open("cliente/BuscaParaModificar/$Modificacion",  array('id' => 'Cliente', 'name' => 'Cliente'));
?>
<div id='formulario' class='span-14 prefix-5 suffix-5 last'>
<fieldset><legend>B&uacute;squeda de cliente</legend>
<br />

<label class='Rotulo'>Nombre </label>
<input type='text' name='Nombre' id='Nombre' maxlength='50' size='40' value='' /><br />

<label class='Rotulo'>Contacto </label>
<input type='text' name='Contacto' id='Contacto' maxlength='50' size='40' value=''/><br />

<label class='Rotulo'>NIT </label>
<input type='text' name='NIT' id='NIT' maxlength='15' size='15' value=''/><br />

<label class='Rotulo'>Correo </label>
<input type='text' name='Correo' id='Correo' maxlength='60' size='40' value=''/>
<br /><br /><hr />
<button class='button positive' style='margin-left:220px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Buscar
</button> 	  
</form>
</fieldset>
</div>