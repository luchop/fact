<script type="text/javascript">

$(document).ready(function(){
    $("#CambiaClave").validate({
    rules: {
        ClaveActual: {
          required: true
        },
        NuevaClave1: {
          required: true,
          minlength: 6
        },
        NuevaClave2: {
          required: true,
          equalTo: NuevaClave1
        }
    },
    messages: {
        ClaveActual: {
            required: "Debe registrar la clave actual."
        },
        NuevaClave1: {
            required: "Por favor, escriba la nueva contrase&ntilde;a.",
            minlength: "Escriba 6 caracteres o m&aacute;s."
        },
        NuevaClave2: {
            required: "Por favor, escriba nuevamente la nueva contrase&ntilde;a.",
            equalTo: "Las 2 contrase&ntilde;as deben ser iguales."
        }
    }
  })
});
</script>
<div  class='span-10 prefix-7 suffix-7 last'>
 <?php 
echo form_open("cambia_clave",  array('id' => 'CambiaClave', 'name' => 'CambiaClave'));
?>
<fieldset>
    <legend>Cambio de contrase&ntilde;a</legend>
<br />

<div>
<label class='Rotulo'>Clave actual </label>
<input type='password' name='ClaveActual' id='ClaveActual' maxlength='15' size='20' value='' /><br />
</div>
<div>
<label class='Rotulo'>Nueva clave </label>
<input type='password' name='NuevaClave1' id='NuevaClave1' maxlength='15' size='20' minlength='6' value='' /><br />
</div>
<div>
<label class='Rotulo'>Confirmaci&oacute;n de clave </label>
<input type='password' name='NuevaClave2' id='NuevaClave2' maxlength='15' size='20' value='' /><br />
</div>
<hr />
<div>
    <button class='button positive' style='margin-left:140px;'> 
        <img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Cambiar
    </button> 	  
</div>

</fieldset>
<div id="errorContainer"><?php echo validation_errors();?></div>
</form>

</div>