<script src="ajax.js"></script>
<?php
include 'conexion.php';
$con=conexion();
$res=pg_query($con,"SELECT tipo, no FROM tipo;");
$res1=pg_query($con,"SELECT provincia, no FROM provincias;");
pg_close($con);

$ip = getenv("REMOTE_ADDR");
?>
<div class="row col-sm-16 col-md-16">
			<div  class="row col-sm-7 col-md-7">                                                     
				<div  style='font-size:20px; text-align: CENTER; color:#ffffff; background: #02000a;' class="form-control"><strong> INGRESO DE TRÁMITE </strong></div>
				<div  style='font-size:14px; text-align: left;' class="form-control"><strong> TIPO DE SERVICIO: </strong>
				<?php
					if(pg_num_rows($res) == 0)
								{
									echo '<b>No hay sugerencias</b>';
										
								}
								else
								{
					?>			
								<br><br><select style='font-size:11px; text-align:left;' NAME="tipotra" id="tipotra" onchange="tipotramite(this.value)" required/> 
								<option></option>
								<?php while($fila=pg_fetch_array($res)){ ?>
								<option value="<?php echo $fila[1]; ?>"><strong><?php echo $fila[0]; ?></strong></option>
								<?php } ?>
								</select><br><br>
					<?php		
								}
					?>
				</div>
				<div id="numerodeusuarios" class="form-control" ></div>
				
				<div  style='font-size:15px; text-align: center;' class="form-control"><strong> PROVINCIA: </strong>
				<?php
					if(pg_num_rows($res) == 0)
								{
									echo '<b>No hay sugerencias</b>';
										
								}
								else
								{
					?>			
								<select name="provincia" id="provincia" onchange="canton()" required/> 
								<option></option>
								<?php while($fila1=pg_fetch_array($res1)){ ?>
								<option value="<?php echo $fila1[1]; ?>"><?php echo $fila1[0]; ?></option>
								<?php } ?>
								</select><br><br>
					<?php		
								}
					?>				
				</div>
				<div  style='font-size:15px; text-align: center;' class="form-control" name="canton1" id="canton1"><strong> CANTÓN: </strong>
					<select/> 
					<option></option>
					</select></br>
				</div>
				<div  style='font-size:15px; text-align: center;' class="form-control"><strong> PARROQUIA: </strong>
					<select name="parroquia1" id="parroquia1" required/> 
					<option></option>
					</select></br>
				</div>

				<div  style='font-size:16px; text-align: center;' class="form-control"><strong> SITIO: </strong><INPUT TYPE="text" MAXLENGTH="50" SIZE="37"  NAME="sitio" id='sitio' required></div>
				<div  style='font-size:16px; text-align: center;' class="form-control"><strong> MENSAJERO: </strong><INPUT TYPE="text" MAXLENGTH="100" SIZE="29"  NAME="tramitador" id='tramitador' required></div>
				<div  style='font-size:16px; text-align: center;' class="form-control"><strong> OBSERVACIONES: </strong><br><TEXTAREA  name='observacion'  id='observacion' COLS=72 ROWS=5 required></TEXTAREA></div>
				<div class="col-sm-5 col-md-5"></div>
                <div><input type = "button" value = "AGREGAR TRÁMITE" onclick = "generarnumeroingresotramite()"></div>
			</div>
			<div id="checkli" class="row col-sm-5 col-md-5"></div>
			<div id="valores" class="row col-sm-5 col-md-5"></div>
</div>