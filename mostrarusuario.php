<?php
include 'conexion.php';
$ruc=$_POST['q'];
$con=conexion();
$res2=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, correo, celular, telefono, correonotificacion, nombrepatrocinador, celularnotificacion, telefononotificacion, cedularepresentante FROM usuario where ruc='$ruc' order by fecha desc limit 1;");
pg_close($con);
?>

<div class="container">
        <div class="col-sm-16 col-md-16">
                    <?php 
                        while($row = pg_fetch_row($res2))
                        { 
                        ?>
                            <div  class="row" style="border: 1px solid #000000;">                
                                        <div  style='font-size:20px; text-align: CENTER; color:#ffffff; background: #02000a;' class="form-control"><strong> <?php echo $row[1]; ?> </strong></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Razón Social: </strong><br><?php echo $row[0]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Ruc/Cédula <br> Representante: </strong><?php echo $row[10]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Nombre  Representante: </strong><br><?php echo $row[2]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Correo: </strong><?php echo $row[3]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Celular: </strong><?php echo $row[4]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Telefono: </strong><?php echo $row[5]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Nombre Patrocinador: </strong><br><?php echo $row[7]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Correo Notificación: </strong><?php echo $row[6]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Celular de Notificación: </strong><br><?php echo $row[8]; ?></div>
                                        <div  style='font-size:12px; text-align: left;' class="form-control"><strong> Telfono de Notificación: </strong><br><?php echo $row[9]; ?></div>
                                        <div><input type = "button" value = "Modificar" onclick = "modificarusuario('<?php echo $row[1]; ?>')"></div>
                                        <div><input type = "button" value = "Agregar" onclick = "agregarusuariotramite('<?php echo $row[1]; ?>')"></div>
                            </div>
                        <?php
                        }
                    ?>

        </div>
</div>

