<?php

//////RELLENA EL CANTON SEGÚN LA PROVINCIA


include 'conexion.php';
$q=$_POST['q'];	
	$con=conexion();
	$res=pg_query($con,"SELECT canton, noparroquia, zona FROM cantones where no='$q';");
	pg_close($con);

	if(pg_num_rows($res) == 0)
			{
?>					<select id="canton1">
					<option></option>
					</select>
<?php
			}
			else
			{
?>			<table align='center'>
					<tr > 
						<td > 
						    <label style='font-size:15px;'><strong> CANTÓN</strong></label>
							<select name="canton" id="canton" onchange="parroquia()" required/>
							<option></option>
							<?php while($fila4=pg_fetch_array($res)){ ?>
							<option value="<?php echo $fila4[1]."-".$fila4[2];;?>"> <?php echo $fila4[0]; ?></option>
							<?php } pg_close($con);  ?>
							</select>
						</td>
					</tr>
			</table>
<?php		
			}
?>
