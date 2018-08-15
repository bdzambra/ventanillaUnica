<?php
include 'conexion.php';
$nombrefuncionario=$_POST['nombrefuncionario'];
$q=$_POST['q'];	
if($q=="selecciona No. de trámite"){}
else
{
$tipo1 = explode(",", $q);
$notramite=$tipo1[0];
$tipo=$tipo1[1];
$norequisito=$tipo1[2];

if($norequisito!="HOLA")
{
    $con=conexion();	
    $res=pg_query($con,"SELECT requisitos.norequisito, requisitos.detalle, relaciontramiterequisito.notramite, relaciontramiterequisito.tipotramite FROM public.relaciontramiterequisito, public.requisitos WHERE relaciontramiterequisito.norequisito = requisitos.norequisito and relaciontramiterequisito.notramite='$notramite' and requisitos.tipotramite='$tipo' and requisitos.norequisito='$norequisito' and estado='1' order by norequisito asc;");
    while($novacio=pg_fetch_array($res)){ $no=$novacio[0];}
    if(empty($no))
    {
        $res1=pg_query($con,"UPDATE public.relaciontramiterequisito SET estado='1', registrador='$nombrefuncionario' WHERE notramite='$notramite' and tipotramite='$tipo' and norequisito='$norequisito';");
        $res2=pg_query($con,"INSERT INTO public.estadotramite( notramite, fechaingreso, comentario, detalle, registrador) VALUES ('$notramite', now(), 'Se agrega requisito No. $norequisito', 'REQUISITO AGREGADO', '$nombrefuncionario');");
        $res3=pg_query($con,"UPDATE public.tramite SET estado='k' WHERE notramite='$notramite';");
    }
    else
    {

        $res3=pg_query($con,"UPDATE public.tramite SET estado='k' WHERE notramite='$notramite';");
        $res1=pg_query($con,"UPDATE public.relaciontramiterequisito SET estado='0', registrador='$nombrefuncionario' WHERE notramite='$notramite' and tipotramite='$tipo' and norequisito='$norequisito';");
        $res2=pg_query($con,"INSERT INTO public.estadotramite( notramite, fechaingreso, comentario, detalle, registrador) VALUES ('$notramite', now(), 'Se elimino el requisito No. $norequisito', 'REQUISITO ELIMINADO', '$nombrefuncionario');");
    }
}
 

$con=conexion();
$res=pg_query($con,"SELECT requisitos.norequisito, requisitos.detalle, relaciontramiterequisito.notramite, relaciontramiterequisito.tipotramite FROM public.relaciontramiterequisito, public.requisitos WHERE relaciontramiterequisito.norequisito = requisitos.norequisito and relaciontramiterequisito.notramite='$notramite' and requisitos.tipotramite='$tipo' and estado='1' order by norequisito asc;");
$res1=pg_query($con,"SELECT requisitos.norequisito, requisitos.detalle, relaciontramiterequisito.notramite, relaciontramiterequisito.tipotramite FROM public.relaciontramiterequisito, public.requisitos WHERE relaciontramiterequisito.norequisito = requisitos.norequisito and relaciontramiterequisito.notramite='$notramite' and requisitos.tipotramite='$tipo' and estado='0' order by norequisito asc;");
pg_close($con);


?>
    <div class="container">
    <div class="row form-control"  style='background:#000000; color:#FFFFFF; font-size:10px; text-align:center; border: 1px solid #FFFFFF;'>
        <div class="col-sm-12  col-md-12 container" style='background:#ffffff;' > 
        <label style='color:#000000; font-size:20px;' ><strong>REQUISITOS REPRESENTADOS</strong></label>
        <?php 
            while($row = pg_fetch_row($res))
            {  
            ?>
                <div class="row">
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-1 col-md-1 form-control"><strong> <?php echo $row[0]; ?></strong></div>
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-10 col-md-10 form-control"><strong> <?php echo $row[1]; ?></strong></div>
                <div align="CENTER" style='background:#000000; color:#FFFFFF; font-size:10px; text-align:center; border: 1px solid #FFFFFF;' class="col-sm-1  col-md-1 form-control"><input type="checkbox" onclick="completar('<?php echo $row[2].",".$row[3].",".$row[0]; ?>')" name="Check" checked></div>                      
                </div>
                <?php
            }
        ?>   
        </div>
        <div class="col-sm-12  col-md-12 container"  style='background:#ffffff;'  > 
        <label style='color:#000000; font-size:20px;' ><strong>REQUISITOS FALTANTES</strong></label>
        <?php 
            while($row = pg_fetch_row($res1))
            {  
            ?>
                <div class="row">
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-1 col-md-1 form-control"><strong> <?php echo $row[0]; ?></strong></div>
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-10 col-md-10 form-control"><strong> <?php echo $row[1]; ?></strong></div>
                <div align="CENTER" style='background:#000000; color:#FFFFFF; font-size:10px; text-align:center; border: 1px solid #FFFFFF;' class="col-sm-1  col-md-1 form-control"><input type="checkbox" onclick="completar('<?php echo $row[2].",".$row[3].",".$row[0]; ?>')" name="Check" ></div>                      
                </div>
                <?php
            }
        ?>
        </div>
        <div class="row" style='color:#FFFFFF;'>
                        <div class="col-sm-4 col-md-4"></div>
                        <div class="col-sm-4 col-md-4 form-control"><input type = "button" value = "Imprimir" onclick = "imprimirtramite('<?php echo $notramite.",".$tipo; ?>')"></div>
        </div>
    </div>
<?php
}
?>