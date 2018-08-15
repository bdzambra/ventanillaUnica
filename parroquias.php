<?php

include 'conexion.php';
$q1=$_POST['q'];	
$canton1 = explode("-", $q1);
$q=$canton1[0];
	$con=conexion();
	$res=pg_query($con,"SELECT parroquia, no, nocanton FROM parroquia where nocanton='$q';");
	pg_close($con);
	if(pg_num_rows($res) == 0)
			{
?>					<select id="parroquia1">
					<option></option>
					</select>
<?php
			}
			else
			{
?>			<table>
					<tr> 
						<td>
							<select>
							<option></option>
							<?php while($fila=pg_fetch_array($res)){ ?>
							<option value="<?php echo $fila[1];?>"> <?php echo $fila[0]; ?></option>
							<?php } pg_close($con);  ?>
							</select>
						</td>
					</tr>
			</table>
<?php		
			}
?>
