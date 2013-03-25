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
echo form_open('cuenta/GuardarNuevaCuenta');
?>
<fieldset><legend>Nueva Cuenta </legend>
<br />

<label class='Rotulo'>C&oacute;digo *</label>
<input type='text'id='Codigo' name='Codigo' maxlength='60' size='50' class='required' value='' /><br />

<label class='Rotulo'>Nombre </label>
<input type='text'  id='Nombre' name='Nombre' maxlength='60' size='50' value='' /><br />

<label class='Rotulo'>Cuenta mayor </label>
<input type='text' id='CuentaMayor'  name='CuentaMayor' maxlength='15' size='15' value='' /><br />

<input type="checkbox" id="SubCuenta" name="SubCuenta" value="ON" disabled="disabled" />
<label class='Rotulo'> ¿Permitir subcuentas? </label>
<br />


<label class='Rotulo'>Tipo de cuenta </label>
<select id="TipoCuenta" name="TipoCuenta">
    <option value="activo"> Activo </option>
    <option value="pasivo"> Pasivo </option>
    <option value="capital"> Capital </option>
    <option value="ingreso"> Ingresos </option>
    <option value="egreso"> Egresos </option>
</select> <br />



<button class='button positive' style='margin-left:260px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Guardar
</button> 	  
</form>
</fieldset>
</div>