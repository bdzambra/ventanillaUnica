<?php
		include 'conexion.php';
		error_reporting (0);
		$con=conexion1();
		$cedula = pg_escape_string($_POST['cedula']); 
		$nick = pg_escape_string($_POST['nick']);
		$clave = pg_escape_string($_POST['clave']);
		$res=pg_query($con,"UPDATE map_funcionario SET usuario='$nick', clave='$clave' WHERE cedula='$cedula';");
		pg_close($con);

?>

