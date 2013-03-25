<script>
$(document).ready(function(){
   $(":input:first").focus();
 });
</script>

<div class="span-10 prefix-7 suffix-7 center last" id="Login" style='height: 370px;'>
    <form action="<?php echo base_url() ?>index.php/login" method="POST" id="formlogin">
        <br /><br />
		<fieldset><legend>&nbsp;&nbsp;Ingreso al sistema&nbsp;&nbsp;</legend><br />   
        <?php if(isset($Error)) echo $Error.'<br />'; ?>
        <div>
            <label class='Rotulo'>Usuario </label> <input type="text" name="NombreUsuario" id="NombreUsuario" maxlength="15" value="" />
        </div>
        <div>
            <label class='Rotulo'>Contrase&ntilde;a </label> <input type="password" name="Clave" id="Clave" maxlength="15" value="" />
        </div>
        <div style="text-align: center;"><hr />
            <button class="button positive" style="margin-left:150px">
            <img src="<?php echo base_url(); ?>css/images/icons/tick.png" alt=""> Ingresar 
            </button>
        </div>
        </fieldset> 
    </form>
</div>