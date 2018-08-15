<HTML> 
<HEAD> 		
<script src="ajax.js"></script>	
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<style>
  .borde{text-align: center;}
  .color{background: #ecedf0; border-radius: 8px; font-family: Arial, Helvetica, Verdana, sans-serif; color:#4e597a;}
 </style>

</HEAD>
<body>
</br>
</br>


</br>
<div class=" container color col-sm-4">
</br>
			<div class=" container col-sm-2 col-md-9 borde"> <img src="imagenes/logo.png" width="100" height="50"></div>
			<div class="row">
			<div class=" container col-sm-1 col-md-5 borde"><label><h2>Loggin</h2></label></div>
			</div>
			<div class="row">
			<div class="container col-sm-12 col-md-5"><input type="text" class="form-control" name="cedula" id="cedula"  placeholder="cédula" onkeyup="cero(this.value)" required=""/></div>
			</div>
			<div class="row">
				<div class="container col-sm-12 col-md-5"><input type="password" class="form-control" name="pword"  id="pword"  placeholder="Password"  onkeyup="validarloggin(this.value)" /></div>
			</div>
			</br>
			<div class="row">
				<div id="registrar" class="container col-sm-12 col-md-5  "></div>
			</div>
</div>	
</body>
</HTML>