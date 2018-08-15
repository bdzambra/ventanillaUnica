<style>
	.borde2{text-align: left; height: 35px;}
	.borde1{text-align: left; height: 20px;}
</style>

<?php	 $cedula = pg_escape_string($_POST['cedula']); ?>		
<div id="cero">

	

	<div class="row">
		<div class="container  col-sm-12 col-md-12 borde"><label><h2>Registrese</h2></label></div>
	</div>
	<div class="row">
		<div class="borde1  col-sm-12 col-md-2 hidden-xs-down"><label for="usr">Nick:</label></div>
		<div class="borde2  col-sm-12 col-md-12"><input id="nick" class="form-control" name="nick" type="text" placeholder="nick" /></div>
	</div>
	<div class="row">
		<div class="borde1  col-sm-12 col-md-2 hidden-xs-down"><label for="pass">Clave:</label></div>
		<div class="borde2  col-sm-12 col-md-12"><input id="clave" class="form-control" name="clave" type="text" placeholder="Password" /></div>
	</div>
	<div class="row">
		<div class="borde1  col-sm-12 col-md-12 hidden-xs-down"><label for="pass">Confirmar Clave:</label></div>
		<div class="borde2  col-sm-12 col-md-12"><input id="clave" class="form-control" name="clave" type="text" placeholder="Password" /></div>
	</div>
	<div class="row">
		<div class="borde2  col-sm-12 col-md-2 hidden-xs-down"></div>
		<div class="borde2  col-sm-12 col-md-12"><button class="btn btn-lg btn-primary btn-block" type="submit" NAME="Boton"  VALUE="REGISTRARSE" ONCLICK="ingresofuncionario()">REGISTRARSE</button></div>
	</div>
</div>		