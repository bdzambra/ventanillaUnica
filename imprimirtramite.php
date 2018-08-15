<?php
include 'conexion.php';
$tipo=$_POST['tipo'];
$sitio=$_POST['sitio'];
$parroquia=$_POST['parroquia'];
$provincia=$_POST['provincia'];
$observacion=$_POST['observacion'];
$tramitador=$_POST['tramitador'];
$nombrefuncionario=$_POST['nombrefuncionario'];	
$cedula2=$_POST['cedula2'];
$q1=$_POST['canton'];	
$canton1 = explode("-", $q1);
$zona=$canton1[1];
$canton=$canton1[0];

$anio=date("Y");
$con=conexion();
$res=pg_query($con,"SELECT numerotramite('$anio', '$tipo', '', '$sitio', '$parroquia', '$canton', '$provincia', '$observacion', '$tramitador', '$nombrefuncionario', '$zona', 'INGRESADO','PINELA HEREDIA JESSICA LORENA','JURIDICO','k')");
$res2=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, correo, celular, telefono, correonotificacion, nombrepatrocinador, celularnotificacion, telefononotificacion, cedularepresentante FROM usuario WHERE ruc='$cedula2';");
pg_close($con);
while($datos=pg_fetch_array($res2))
{   
    $nombreempresa=$datos[0];
    $ruc=$datos[1];
    $nombrerepresentante=$datos[2];
    $correo=$datos[3];
    $celular=$datos[4];
    $telefono=$datos[5];
    $correonotificacion=$datos[6];
    $nombrepatrocinador=$datos[7];
    $celularnotificacion=$datos[8];
    $telefononotificacion=$datos[9];
    $cedularepresentante=$datos[10];
}
while($fila1=pg_fetch_array($res)){ $notramite=$fila1[0];}

///esto sirve para ingreso de los requisitos seleccionados

$requisitosfaltantes=$_POST['requisitosfaltantes'];
if(empty($requisitosfaltantes))
{
//no existen requisitos faltantes  en el tramite
}
else
{
    $requisitosfaltantes1 = explode(",",$requisitosfaltantes);
    $longitud1 = count($requisitosfaltantes1);
    for($o=0; $o<$longitud1; $o++)
         {  $con=conexion();
            $res11=pg_query($con,"INSERT INTO public.relaciontramiterequisito(notramite, tipotramite, norequisito, estado,registrador)VALUES ('$notramite', '$tipo', '$requisitosfaltantes1[$o]','0','$nombrefuncionario');");
            $res1=pg_query($con,"INSERT INTO public.historialrelaciontramiterequisito(notramite, tipotramite, norequisito, estado,registrador)VALUES ('$notramite', '$tipo', '$requisitosfaltantes1[$o]','0','$nombrefuncionario');");
            pg_close($con);
        }
}

$requisitospresentados=$_POST['requisitospresentados'];
if(empty($requisitospresentados))
{
// no presenta ningun requisito en el tramite
}
else
{
    $requisitospresentados1 = explode(",",$requisitospresentados);
    $longitud = count($requisitospresentados1);
    for($i=0; $i<$longitud; $i++)
        {   
            $con=conexion();
            $res1=pg_query($con,"INSERT INTO public.relaciontramiterequisito(notramite, tipotramite, norequisito, estado,registrador)VALUES ('$notramite', '$tipo', '$requisitospresentados1[$i]','1','$nombrefuncionario');");
            $res1=pg_query($con,"INSERT INTO public.historialrelaciontramiterequisito(notramite, tipotramite, norequisito, estado,registrador)VALUES ('$notramite', '$tipo', '$requisitospresentados1[$i]','1','$nombrefuncionario');");
            pg_close($con);
        }
}
/////////////////////////////////////////////////////////////


if(empty($parroquia))
{   $con=conexion();
    $res7=pg_query($con,"SELECT provincias.provincia, cantones.canton FROM public.provincias, public.cantones WHERE cantones.no = provincias.no AND cantones.noparroquia='$canton';");
    while($provincias=pg_fetch_array($res7)){ $provincia1=$provincias[0];$canton1=$provincias[1]; $parroquia1="no ingresado";}
    pg_close($con);
}
else
{   $con=conexion();
    $res7=pg_query($con,"SELECT provincias.provincia, cantones.canton, parroquia.parroquia FROM public.provincias, public.cantones,public.parroquia WHERE cantones.no = provincias.no AND parroquia.nocanton = cantones.noparroquia and parroquia.no='$parroquia';");
    while($provincias=pg_fetch_array($res7)){ $provincia1=$provincias[0];$canton1=$provincias[1];$parroquia1=$provincias[2];}
    pg_close($con);
}
$con=conexion();
$res1=pg_query($con,"INSERT INTO relaciontramiteusuario (ruc, notramite,fecha)	VALUES	('$cedula2','$notramite','now()');	");
$res5=pg_query($con,"SELECT tipo FROM tipo where no='$tipo';");
pg_close($con);

while($fila2=pg_fetch_array($res5)){$nombretipo=$fila2[0];}

?>
                <input type="hidden" name='tipo' id='tipo' value='<?php echo $tipo ?>' />
                <input type="hidden" name='sitio' id='sitio' value='<?php echo $sitio ?>' />
                <input type="hidden" name='parroquia' id='parroquia' value='<?php echo $parroquia ?>' />
                <input type="hidden" name='canton' id='canton' value='<?php echo $canton ?>' />
                <input type="hidden" name='provincia' id='provincia' value='<?php echo $provincia ?>' />
                <input type="hidden" name='observacion' id='observacion' value='<?php echo $observacion ?>' />
                <input type="hidden" name='tramitador' id='tramitador' value='<?php echo $tramitador ?>' />
                <input type="hidden" name='nombrefuncionario' id='nombrefuncionario' value='<?php echo $nombrefuncionario ?>' />
                <input type="hidden" name='cedula2' id='cedula2' value='<?php echo $cedula2 ?>' />
                <input type="hidden" name='notramite' id='notramite' value='<?php echo $notramite ?>' />
                <input type="hidden" name='requisitosfaltantes' id='requisitosfaltantes' value='<?php echo $requisitosfaltantes ?>' />
    			
    <div class="row col-sm-16 col-md-16">
                <div  class="row col-sm-7 col-md-7">                                                     
                    <div  style='font-size:20px; text-align: CENTER; color:#ffffff; background: #02000a;' class="form-control"><strong> TRÁMITE INGRESADO <?php echo $notramite; ?></strong></div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> TIPO DE SERVICIO:</strong> <?php echo $nombretipo; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> RAZÓN SOCIAL: </strong><?php echo $nombreempresa; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> RUC/CÉDULA REPRESENTANTE: </strong><?php echo $cedularepresentante; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> NOMBRE DEL REPRESENTANTE: </strong> <?php echo $nombrerepresentante; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CORREO DE LA EMPRESA: </strong><?php echo $correo; ?></div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CELULAR DE LA EMPRESA: DE SERVICIO: </strong><?php echo $celular; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> NOMBRE DEL PATROCINADOR: </strong><?php echo $nombrepatrocinador; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CORREO DE PATROCINADOR: </strong><?php echo $correonotificacion; ?> </div>
                    <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CELULAR DE PATROCINADOR: </strong><?php echo $celularnotificacion; ?> </div>
                    <?php
                    if($tipo=='13')
                    {   $con=conexion();
                        $cedula3=$_POST['cedula3'];
                        $res3=pg_query($con,"INSERT INTO relaciontramiteusuario (ruc, notramite,fecha)	VALUES	('$cedula3','$notramite','now()');	");
                        $res6=pg_query($con,"SELECT nombreempresa, ruc, nombrerepresentante, correo, celular, telefono, correonotificacion, nombrepatrocinador, celularnotificacion, telefononotificacion, cedularepresentante FROM usuario WHERE ruc='$cedula3';");
                        pg_close($con);
                        while($dato=pg_fetch_array($res6))
                        {                       
                        ?>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> RAZÓN SOCIAL CEDIDO: </strong><?php echo $dato[0]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> RUC/CÉDULA REPRESENTANTE CEDIDO: </strong><?php echo $dato[10]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> NOMBRE DEL REPRESENTANTE CEDIDO: </strong> <?php echo $dato[2]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CORREO DE LA EMPRESA CEDIDO: </strong><?php echo $dato[3]; ?></div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CELULAR DE LA EMPRESA: DE SERVICIO CEDIDO: </strong><?php echo $dato[4]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> NOMBRE DEL PATROCINADOR CEDIDO: </strong><?php echo $dato[7]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CORREO DE PATROCINADOR CEDIDO: </strong><?php echo $dato[6]; ?> </div>
                        <div  style='font-size:14px; text-align: LEFT;' class="form-control"><strong> CELULAR DE PATROCINADOR CEDIDO: </strong><?php echo $dato[8]; ?> </div>  
                        <input type="hidden" name='cedula3' id='cedula3' value='<?php echo $cedula3 ?>' />
                        <?php
                         }
                    }
                    ?>
                    <div  style='font-size:15px; text-align: LEFT;' class="form-control"><strong> PROVINCIA: </strong> <?php echo $provincia1; ?></div>
                    <div  style='font-size:15px; text-align: LEFT;' class="form-control"><strong> CANTÓN: </strong><?php echo $canton1; ?></div>
                    <div  style='font-size:15px; text-align: LEFT;' class="form-control"><strong> PARROQUIA: </strong><?php echo $parroquia1; ?></div>
                    <div  style='font-size:16px; text-align: LEFT;' class="form-control"><strong> SITIO: </strong><?php echo $sitio; ?></div>
                    <div  style='font-size:16px; text-align: LEFT;' class="form-control"><strong> MENSAJERO: </strong><?php echo $tramitador; ?></div>
                    <div  style='font-size:16px; text-align: LEFT;' class="form-control"><strong> OBSERVACIONES: </strong><?php echo $observacion; ?></div>
                    <div class="col-sm-5 col-md-5"></div>
                    <div><input type = "button" value = "IMPRIMIR" onclick = "imprimirtramiteingresado()"></div>
                </div>
    
    </div>