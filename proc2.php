<?php

//RELLENA LA CONSULTA SEGUN LÑA CONSULTA DE RUC, NOMBRE DE LA EMPRESA, NOMBRE DEL REPRESENTANTE

include 'conexion.php';
$q=$_POST['q'];
if(empty($q))
{   ?><span> <label >no hace nada</label></span> <?php
}
else
{                
	$con=conexion();
	$res=pg_query($con,"SELECT nombrerepresentante, ruc, nombreempresa FROM usuario where ruc LIKE '%$q%' or nombrerepresentante LIKE '$q%' or nombreempresa LIKE '$q%';");
	pg_close($con);
	if(pg_num_rows($res) == 0)
			{
?>							<label> NO EXISTE </label>
							<INPUT TYPE="submit" NAME="Boton" VALUE="AGREGAR USUARIO" onclick="agregarusuario(<?php echo $q=0; ?>)">
<?php		}
			else
			{
?>						
							<select style='font-size:12px;' onchange="autocompletar(this.value)">
							<option>selecciona a alguién</option>
							<?php while($fila=pg_fetch_array($res)){ ?>
							<option value="<?php echo $fila[1]; ?>"><?php echo $fila[2]."-".$fila[0]; ?></option>
							<?php }  ?>
							</select>
<?php		
			}
}
?>




