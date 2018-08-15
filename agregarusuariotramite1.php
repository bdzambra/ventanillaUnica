<?php
include 'conexion.php';
$q=$_POST['q'];	
?>
<input type="hidden" name='cedula3' id='cedula3' value='<?php echo $q ?>'>
<label align='center'><strong> RUC/CÉDULA CEDIDO: <?php echo $q; ?> </strong></label>
