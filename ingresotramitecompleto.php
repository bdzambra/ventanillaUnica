<script src="ajax.js"></script>
<?php
include 'conexion.php';
$ip = getenv("REMOTE_ADDR");
?>
<div class="row col-sm-16 col-md-16">
			<div  class="row col-sm-7 col-md-7">                                                     
                
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4  col-md-4 col-lg-4"></div>
                            <div style='font-size:16px; text-align: CENTER; border: 1px solid #000000;' class="col-md-5 form-control"><strong> No. TRÁMITE: <INPUT TYPE="TEXT" autocomplete="off" NAME="numerotramite" id='numerotramite' onkeyup="loadtramite()"/></strong></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4  col-md-4 col-lg-4"></div>
                            <div id="numerostramites" class="col-md-5 form-control" style="border: 1px solid #000000;"></div>
                        </div>
                        <div class="row">
                                <div id="detalletramite" class="col-md-12 form-control" style="border: 1px solid #000000;"></div>	
                        </div>
                    </div>
			</div>
			<div id="consultacheckli" class="row col-sm-5 col-md-5"></div>
			<div id="valores" class="row col-sm-5 col-md-5"></div>
</div>