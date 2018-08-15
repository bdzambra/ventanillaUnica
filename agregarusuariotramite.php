<?php
include 'conexion.php';
$q=$_POST['q'];	
?>
<input type="hidden" name='cedula2' id='cedula2' value='<?php echo $q ?>'>
<label align='center'><strong> RUC/CÉDULA CEDIDO: <?php echo $q; ?> </strong></label>
