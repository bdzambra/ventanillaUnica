<?php
include 'conexion.php';
$q=$_POST['q'];
$notramite1 = explode(",", $q);
$notramite=$notramite1[0];
$con=conexion();
$res4=pg_query($con,"SELECT ruc FROM public.relaciontramiteusuario where notramite='$notramite';");
while($rucvacio=pg_fetch_array($res4)){$vacio=$rucvacio[0];}
if(empty($vacio)){}
else
{
    $res2=pg_query($con,"SELECT ruc FROM public.relaciontramiteusuario where notramite='$notramite';");
    while($cedulas=pg_fetch_array($res2))
    { 
        $a=$cedulas[0];
        $res3=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, cedularepresentante, nombrepatrocinador FROM usuario where ruc='$a' or cedularepresentante='$a';");
        while($usuarios=pg_fetch_array($res3)){$b=$usuarios[0];$c=$usuarios[1];$d=$usuarios[3];}
        if(empty($b) && empty($c) && empty($d))
        {
            ?>
            <div  class="col-sm-1  col-md-12 col-lg-12">
                <div class="row" style="background:#ffffff;border-radius: 2px;">
                    <div style='font-size:15px; text-align:center; line-height:35px; background:#fc1100;' class="col-sm-1  col-md-1 col-lg-3  form-control"><label style='color:#ffffff;' ><strong><?php echo $cedulas[0]; ?></strong></label></div>
                    <div style='font-size:10px; text-align:center; line-height:35px;' class="col-sm-1  col-md-3 col-lg-3  form-control"><INPUT TYPE="submit" NAME="Boton" style="font-size:12px " ID="ACTIVAR" VALUE="AGREGAR USUARIO" onclick="revisardatostramite('<?php echo $cedulas[0]; ?>')"></div>
                </div>
            </div>
            <?php    
        }
        else
        {
            $res4=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, cedularepresentante, nombrepatrocinador FROM usuario where ruc='$a' or cedularepresentante='$a';");
            while($usuario=pg_fetch_array($res4))
            {   
                ?>
                <div  class="col-sm-1  col-md-12 col-lg-12">
                    <div class="row" style="background:#ffffff;border-radius: 2px;">
                        <div style='font-size:15px; text-align:center; line-height:35px; background:#fc1100;' class="col-sm-1  col-md-1 col-lg-3  form-control"><label style='color:#ffffff;' ><strong><?php echo $cedulas[0]; ?></strong></label></div>
                        <div style='font-size:10px; text-align:center; ' class="col-sm-2  col-md-2 col-lg-3  form-control"><strong>Empresa</strong></br><?php echo $usuario[0];?></div>
                        <div style='font-size:10px; text-align:center; ' class="col-sm-3  col-md-3 col-lg-3  form-control"><strong>Representante</strong></br><?php echo $usuario[2];?></div>
                        <div style='font-size:10px; text-align:center; ' class="col-sm-3  col-md-3 col-lg-3  form-control"><strong>Patrocinador</strong></br><?php echo $usuario[4];?></div>
                    </div>
                </div>
                <?php 
            } 
        }
    }
}
?>