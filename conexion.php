<?php
function conexion()
{
	$usuario="postgres";
	$pass="bonitajuridico";
	$host="10.12.1.248";
	$bd="juridico";
	$conexion = pg_connect( "user=".$usuario." "."password=".$pass." "."host=".$host." "."dbname=".$bd) or die( "Error al conectar: ".pg_last_error());
	return $conexion;
}

function conexion1()
{
	$usuario="postgres";
	$pass="bonitajuridico";
	$host="10.12.1.248";
	$bd="map_tthh";
	$conexion = pg_connect( "user=".$usuario." "."password=".$pass." "."host=".$host." "."dbname=".$bd) or die( "Error al conectar: ".pg_last_error());
	return $conexion;
}

function conexion2()
{
	$usuario="postgres";
	$pass="bonitajuridico";
	$host="10.12.1.248";
	$bd="gestion";
	$conexion = pg_connect( "user=".$usuario." "."password=".$pass." "."host=".$host." "."dbname=".$bd) or die( "Error al conectar: ".pg_last_error());
	return $conexion;
}

?>	