<script src="ajax.js"></script>
<?php
include 'conexion.php';
$con=conexion();
$res=pg_query($con,"SELECT tramite.notramite,tramite.fechaingreso,usuario.ruc, tramite.tipo FROM public.tramite,public.relaciontramiteusuario,public.usuario,public.tipo WHERE tramite.notramite = relaciontramiteusuario.notramite AND tramite.tipo = tipo.no1 AND relaciontramiteusuario.ruc = usuario.ruc order by fechaingreso desc limit 200;");
pg_close($con);
$c=0;
?>
<div class="row col-sm-16 col-md-16">
    <div  class="row col-sm-7 col-md-7 form-control">   
                    <div class="row " >
                    <div class="col-sm-1 col-md-1 form-control"  style='font-size:14px; text-align: center;'> <strong>No</strong></div>
                    <div class="col-sm-2 col-md-2 form-control"  style='font-size:14px; text-align: center;'><strong>No de Trámite</strong></div>
                    <div class="col-sm-3 col-md-3 form-control"  style='font-size:14px; text-align: center;'><strong>Fecha de ingreso</strong></div>
                    <div class="col-sm-3 col-md-3 form-control"  style='font-size:14px; text-align: center;'><strong>Ruc / cédula</strong></div>
                    <div class="col-sm-2 col-md-2 form-control"  style='font-size:14px; text-align: center;'><strong></strong></div>

                    </div>
                    <?php 
                    while($row = pg_fetch_row($res))
                    { ?>
                    <div class="row" >
                    <div class="col-sm-1 col-md-1 form-control"  style='font-size:10px; text-align: center;'> <strong><?php echo $c=$c+1; ?></strong></div>
                    <div class="col-sm-2 col-md-2 form-control"  style='font-size:13px; text-align: center;'><?php echo $row[0]; ?></div>
                    <div class="col-sm-3 col-md-3 form-control"  style='font-size:13px; text-align: center;'><?php echo substr($row[1],0,16); ?></div>
                    <div class="col-sm-3 col-md-3 form-control"  style='font-size:13px; text-align: center;'><?php echo $row[2]; ?></div>

                    <div class="col-sm-2 col-md-2 form-control"><INPUT TYPE="submit" NAME="Boton" style="font-size:12px " ID="ACTIVAR" VALUE="IMPRIMIR" onclick="imprimirtramite('<?php echo $row[0].",".$row[3]; ?>')"></div>
                    </div>
                    <?php				
                    }
                ?>
    </div>
</div>