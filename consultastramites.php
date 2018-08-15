<?php
include 'conexion.php';
$q=$_POST['q'];

if(empty($q))
{   ?><span> <label >no hace nada</label></span> <?php
}
else
    $con=conexion();
	$res=pg_query($con,"SELECT notramite, tipo FROM tramite where notramite like '$q%';");
	pg_close($con);
   	if(pg_num_rows($res) == 0)
			{
?>			<label> NO EXISTE </label>
<?php		}
			else
			{
?>			<select onchange="autocompletartramite(this.value)">
			<option>selecciona No. de trámite</option>
			<?php while($fila=pg_fetch_array($res)){ ?>
			<option value="<?php echo $fila[0].",".$fila[1].",HOLA"; ?>"><?php echo $fila[0]; ?></option>
			<?php }   ?>
			</select>
<?php		
			}
?>          
