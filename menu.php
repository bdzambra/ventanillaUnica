<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="ajax.js"></script>

   <?php 
    include 'conexion.php';
    $cedula = $_POST['cedula'];            
            $con=conexion1();	
            $res=pg_query($con,"SELECT ap_nom FROM map_funcionario where cedula='$cedula';");
            pg_close($con);
            while($fila=pg_fetch_array($res)){$nombre=$fila[0];}
    ?> 

  </head>
<body>
<div class="container">
  
  <div class="row">
    <div class="  col-sm-6 col-md-2"><img src="imagenes/logo.png" width="150" height="60"></div>
    <div align="center" class="col-sm-6 col-md-8"><h5>REPÚBLICA DE ECUADOR</br></h5><H7>Ministerio de Acuacultura y Pesca</H7></div>
    <div class="  col-sm-6 col-md-1"><img src="imagenes/escudo.png" width="150" height="60"></div>
  </div>

</div>


 <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <strong>INGRESO SOLICITUD</strong></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" onclick="agregartramite();">Agregar Trámite</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="completartramite();">Completar Trámite</button></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="imprimirotravez();">Imprimir Trámite</button></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="iniciarrevisiontt_hh();">Agregar Facturación</button></a>
 
                </div>
              </li>
            </ul>  
        </div>
        <div class="navbar-collapse justify-content-center">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link disabled" id="tiempo"></a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <input type="hidden" name='nombrefuncionario' id='nombrefuncionario' value='<?php echo $nombre ?>'>
                    <a class="nav-link disabled"><STRONG><?php echo $nombre ?></STRONG></a>
                </li>
            </ul>
        </div>
</nav>
</br>
<div class="container">
    <div class="row ">
        <div id="ventanainicio" class=" col-sm-12 col-md-12 col-lg-12"></div>
    </div>
</div>
</body>
</html>

