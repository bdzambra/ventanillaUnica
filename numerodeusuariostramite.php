<?php

include 'conexion.php';
$q=$_POST['q'];	
if($q=="13")
{
    ?>
    <div  class="form-control " style="border: 1px solid #000000;" id='borrar1'>				
    <div style='font-size:14px; text-align: center;'><strong> RUC/CÉDULA CEDEDOR: </strong><INPUT TYPE="TEXT" autocomplete="off" NAME="bus" id='bus'  SIZE="26" onkeyup="loadcedula()"/></div>
    <div id="myDiv2" style='font-size:16px; text-align: center;'></div>
    </div>

    <div  class="form-control" style="border: 1px solid #000000;" id='borrar'>				
    <div style='font-size:14px; text-align: center;'><strong> RUC/CÉDULA CEDIDO: </strong><INPUT TYPE="TEXT" autocomplete="off" NAME="bus1" id='bus1'  SIZE="27" onkeyup="loadcedula1()"/></div>
    <div id="myDiv4" style='font-size:16px; text-align: center;'></div>
    </div>

    <?php
}
else
{
    ?>
    <div  class="form-control" style="border: 1px solid #000000;" id='borrar1'>	
    <div style='font-size:16px; text-align: center;'><strong> RUC/CÉDULA: </strong><INPUT TYPE="TEXT" autocomplete="off" NAME="bus" id='bus'  SIZE="29" onkeyup="loadcedula()"/></div>
    <div id="myDiv2" style='font-size:16px; text-align: center;'></div>
    </div>	
    <?php
}
?>
