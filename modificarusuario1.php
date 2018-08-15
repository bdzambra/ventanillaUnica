<?php
include 'conexion.php';
$q=$_POST['q'];	
$con=conexion();
$res=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, correo, celular, telefono, correonotificacion, nombrepatrocinador, celularnotificacion, telefononotificacion, cedularepresentante FROM usuario WHERE ruc='$q';");
pg_close($con);
?>

<div class="container">
    <?php 
    while($row = pg_fetch_row($res))
    { 
    ?>
    <div  class="row" style="border: 1px solid #000000;">                                                     
    <div  style='font-size:20px; text-align: CENTER; color:#ffffff; background: #02000a;' class="form-control"><strong><?php echo $row[1]; ?></strong></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> RAZÓN <br> SOCIAL: </strong><INPUT TYPE="TEXT" MAXLENGTH="149" SIZE="24"  NAME="razon1" id='razon1' value='<?php echo $row[0]; ?>' required></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> RUC/CÉDULA <br> REPRES.:</strong><INPUT TYPE="TEXT" MAXLENGTH="13" SIZE="18"  NAME="rucrepre" id='rucrepre' value='<?php echo $row[10]; ?>' required></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> NOMBRE <br> REPRES.: </strong><INPUT TYPE="TEXT" MAXLENGTH="54" SIZE="23"  NAME="nombre1" id='nombre1' value='<?php echo $row[2]; ?>' required></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> CORREO: </strong><INPUT TYPE="email" MAXLENGTH="70" SIZE="23"  NAME="correo1" id='correo1' value='<?php echo $row[3]; ?>'></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> CELULAR: </strong><INPUT TYPE="text" MAXLENGTH="10" SIZE="11"  NAME="celular1" id='celular1' value='<?php echo $row[4]; ?>' ></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> TELEFONO: </strong><INPUT TYPE="tel" MAXLENGTH="9" SIZE="9"  NAME="telefono1" id='telefono1' value='<?php echo $row[5]; ?>'></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> NOMBRE <br> PATROCI.: </strong><INPUT TYPE="TEXT" MAXLENGTH="54" SIZE="22"  NAME="nombrepatrocinador1" id='nombrepatrocinador1' value='<?php echo $row[7]; ?>'></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> CORREO <br>DE NOTIF.: </strong><INPUT TYPE="email" MAXLENGTH="50" SIZE="20"  NAME="correonotificacion1" id='correonotificacion1' value='<?php echo $row[6]; ?>'></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> CELULAR <br> DE NOTIF.: </strong><INPUT TYPE="text" MAXLENGTH="10" SIZE="11"  NAME="celularnotificacion1" id='celularnotificacion1' value='<?php echo $row[8]; ?>'></div>
    <div  style='font-size:12px; text-align: left;' class="form-control"><strong> TELEFONO <br> DE NOTIF.: </strong><INPUT TYPE="tel" MAXLENGTH="9" SIZE="11"  NAME="telefononotificacion1" id='telefononotificacion1' value='<?php echo $row[9]; ?>'></div>
    <div class="col-sm-4 col-md-4"></div>
    <div><input type = "button" value = "Modificar" onclick = "agregarusuariomodificado1('<?php echo $row[1]; ?>')"></div>
<?php
    }
?>
			</div>
</div>