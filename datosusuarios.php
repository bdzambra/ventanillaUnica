           
<?php
include 'conexion.php';
$tipo=$_POST['tipo'];	
$requisitosfaltantes=$_POST['requisitosfaltantes'];	
$requisitospresentados=$_POST['requisitospresentados'];

?>			<input type="hidden" name='requisitosfaltantes' id='requisitosfaltantes' value='<?php echo $requisitosfaltantes ?>' />
            <input type="hidden" name='requisitospresentados' id='requisitospresentados' value='<?php echo $requisitospresentados ?>' />
            <div class="row col-sm-20 col-md-20">
				<div id="myDiv3" class="row col-sm-6 col-md-6"></div>                                                   
				<div id="myDiv5" class="row col-sm-6 col-md-6"></div>                                                   
			</div>
<?php   
        
      
           
