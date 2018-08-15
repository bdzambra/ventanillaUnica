<?php
		include 'conexion.php';
		$con=conexion1();

		$cedula = ($_POST['cedula']); 
		$pass = ($_POST['pass']);
		$res=pg_query($con,"SELECT cedula FROM map_funcionario where cedula='$cedula';");

		if(pg_num_rows($res) == 0){?>
			
			<div class=" container  borde"><label>Registro invalido</label></div>
			<?php }
		else
		{
			$res1=pg_query($con,"SELECT clave FROM map_funcionario where cedula='$cedula';");
			pg_close($con);

			while($fila=pg_fetch_array($res1)){$q=$fila[0];}
			if(empty($q))
			{ ?> 
			<button class="container btn btn-lg btn-secondary btn-sm" type="submit" NAME="Boton" VALUE="REGISTRARSE" ONCLICK="registrarse()">REGISTRARSE</button>
			<div class=" container borde"><label>Debe de registrarse</label></div>
			<?php 
			}
			else
			{	if($q==$pass)
				{?> 
				<FORM name="formulariopermiso" action="menu.php" method="post" autocomplete="off">
				<input type="hidden" name='cedula' id='cedula' value='<?php echo $cedula ?>' />
				<button class="container btn btn-lg btn-secondary btn-sm" type="submit" NAME="Boton" VALUE="ENTRAR" ONCLICK="iniciarpermiso('<?php echo $cedula; ?>')">INGRESAR</button>
				<div class=" container  borde">BIENVENIDO</div>
				</form><?php 
				}
				else 
				{
					?>	
					<div class=" container  borde"><label>clave incorrecta</label></div>
					<?php 
				}
			}
		}	
?>			