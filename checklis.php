<?php
include 'conexion.php';
$q=$_POST['q'];	
$contador='0';

$con=conexion();
$res=pg_query($con,"SELECT norequisito, detalle FROM requisitos where tipotramite='$q' order by norequisito asc;");
pg_close($con);

?>
    <div class="container">
    <div class="row form-control"  style='background:#000000; color:#FFFFFF; font-size:10px; text-align:center; border: 1px solid #FFFFFF;'>
        <div class="col-sm-12  col-md-12" > 
        <?php 
            while($row = pg_fetch_row($res))
            {  $contador++;
            ?>
                <div class="row">
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-1 col-md-1 form-control"><strong> <?php echo $row[0]; ?></strong></div>
                <div style='background:#000000; color:#FFFFFF; font-size:11px; text-align:left; border: 1px solid #FFFFFF;' class="col-sm-10 col-md-10 form-control"><strong> <?php echo $row[1]; ?></strong></div>
                <div align="CENTER" style='background:#000000; color:#FFFFFF; font-size:10px; text-align:center; border: 1px solid #FFFFFF;' class="col-sm-1  col-md-1 form-control"><input type="checkbox" id="Check<?php echo $row[0]; ?>" name="Check<?php echo $row[0]; ?>" ></div>                      
                </div>
                <?php
            }
        ?>      
                <div class="row" style='color:#FFFFFF;'>
                        <input type="hidden" name='contador' id='contador' value='<?php echo $contador ?>'>
                        <input type="hidden" name='q' id='q' value='<?php echo $q ?>'>
                        <div class="col-sm-2 col-md-2"></div>
                        <div class="col-sm-4 col-md-4 form-control"><input type = "button" value = "Continuar" onclick = "continuar('NO IMPRIMIR')"></div>
                        <div class="col-sm-4 col-md-4 form-control"><input type = "button" value = "Imprimir" onclick = "continuar('IMPRIMIR')"></div>
                </div>
        </div>
    </div>
<?php



