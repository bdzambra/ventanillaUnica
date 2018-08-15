<?php
require('fpdf/fpdf.php');
ini_set('default_charset','utf-8');
include 'conexion.php';

$b=$_GET['notramite'];	
$b1 = explode(",", $b);
$notramite=$b1[0];
$tipo=$b1[1];
//consulta los requisitos del tramite////
$con=conexion();
$res10=pg_query($con,"SELECT array_to_string(ARRAY(SELECT requisitos.norequisito FROM public.relaciontramiterequisito, public.requisitos WHERE relaciontramiterequisito.norequisito = requisitos.norequisito and relaciontramiterequisito.notramite='$notramite' and requisitos.tipotramite='$tipo' and estado='0' order by norequisito asc), ',')");
pg_close($con);
while($norequisitos1=pg_fetch_array($res10)){ $noquisitos=$norequisitos1[0];}
////////////////////////////

$nombrefuncionario=$_GET['nombrefuncionario'];
	
$con=conexion();
$f=0;
$res7=pg_query($con,"SELECT tramite.tipo,tramite.fechaingreso,usuario.ruc,tramite.comentario FROM public.tramite,public.relaciontramiteusuario,public.usuario WHERE tramite.notramite = relaciontramiteusuario.notramite AND relaciontramiteusuario.ruc = usuario.ruc and tramite.notramite='$notramite' limit 1;");
while($datostramite=pg_fetch_array($res7))
{   
        $tipo=$datostramite[0];
        $fechaingreso=$datostramite[1];
        $ruc=$datostramite[2];
        $comentario=$datostramite[3];
        $res4=pg_query($con,"SELECT tipotramite, norequisito, detalle FROM requisitos WHERE tipotramite='$tipo' order by norequisito asc;");
        $res5=pg_query($con,"SELECT tipo FROM tipo where no='$tipo';");
        $res2=pg_query($con,"SELECT usuario.nombreempresa,usuario.ruc,usuario.nombrerepresentante,usuario.correo,usuario.celular,usuario.telefono,usuario.correonotificacion,usuario.nombrepatrocinador,usuario.celularnotificacion,usuario.telefononotificacion,usuario.cedularepresentante,tramite.notramite FROM public.tramite,public.relaciontramiteusuario,public.usuario WHERE tramite.notramite = relaciontramiteusuario.notramite AND relaciontramiteusuario.ruc = usuario.ruc and tramite.notramite='$notramite';");       
        pg_close($con);

        while($fila2=pg_fetch_array($res5)){$nombretipo=$fila2[0];}
        $pdf=new FPDF('P','cm','A4');
        $pdf->AddPage();
        $pdf->SetTitle('Ministerio de Acuacultura y Pesca');

        $pdf->MultiCell(0,0, $pdf->Image('../ventanillaUnica/imagenes/logo.png', $pdf->GetX(), $pdf->GetY(), 5) ,10,"C");
        $pdf->MultiCell(0,0, $pdf->Image('../ventanillaUnica/imagenes/escudo.png', $pdf->GetX()+14, $pdf->GetY(), 6) ,10,"C");
        $pdf->MultiCell(0,0, $pdf->Image('../ventanillaUnica/imagenes/firma.png', $pdf->GetX()+6, $pdf->GetY()+25, 13) ,10,"C");

        $pdf->SetXY(1,2);
        $pdf->SetFont('Arial','B',13);
        $pdf->SetFillColor(255,255 ,255);
        $pdf->Cell(0,.6,'MINISTERIO DE ACUACULTURA Y PESCA',0,1,'C',0);
        $pdf->SetXY(1,3);
        $pdf->SetFont('Arial','B',13);
        $pdf->SetFillColor(255,255 ,255);
        $pdf->Cell(0,.1,'Subsecretaria de Acuacultura',0,1,'C',0);


        $pdf->SetXY(1,4);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,.5,utf8_decode('FECHA: '),1,0,'J',0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,.5,$fechaingreso,1,1,'J',0);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,.6,utf8_decode('TIPO DE TRÁMITE: '),1,0,'J',0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,.6,utf8_decode($nombretipo),1,1,'J',0);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,.6,utf8_decode('No. DE TRÁMITE: '),1,0,'J',0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,.6,utf8_decode($notramite),1,1,'J',0);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,.7,utf8_decode('NOMBRE SERVIDOR: '),1,0,'J',0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,.7,utf8_decode($nombrefuncionario),1,1,'J',0);

        //Set font and colors
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(187,187,187);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(50,0,0);
        $pdf->SetLineWidth(.03);
        $pdf->SetXY(1,7);
        $pdf->Cell(0,.6,'REQUISITOS',1,1,'C',1);
        //Restore font and colors
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);

        //Build table

        $pdf->SetFont('Arial','',8);
        while($fila1=pg_fetch_array($res4))
            { 
                $d=$fila1[1];
                $c=$fila1[2];
                $a=$d.". ".$c;
                $pdf->MultiCell(0,.5,utf8_decode($a),1,1,'J',1);   
            }

        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);
        $pdf->Cell(0,1,"Requisitos faltantes son:  ".$noquisitos,1,1,'C',1);


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

                $pdf->SetFont('Arial','B',10);
                $pdf->SetFillColor(187, 187, 187);
                $pdf->SetTextColor(0);
                $pdf->SetDrawColor(50,0,0);
                $pdf->SetLineWidth(.03);
                $pdf->Cell(0,.6,'DATOS DEL USUARIO/EMPRESA',1,1,'J',1);
                $pdf->SetFillColor(224,235,255);
                $pdf->SetTextColor(0);
                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(2.5,.6,utf8_decode('RUC/CÉDULA: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(2.5,.6,utf8_decode($ruc),1,0,'J',0);


                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(4.3,.6,utf8_decode('RAZÓN SOCIAL/NOMBRE: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(0,.6,utf8_decode($nombreempresa),1,1,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(4.2,.6,utf8_decode('CÉDULA REPRE. LEGAL:'),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(2.5,.6,utf8_decode($cedularepresentante),1,0,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(4,.6,utf8_decode('NOMBRE REPR. LEGAL: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(0,.6,utf8_decode($nombrerepresentante),1,1,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(1.8,.6,utf8_decode('CORREO:'),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(8.5,.6,utf8_decode($correo),1,0,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(1.8,.6,utf8_decode('CELULAR: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(2.5,.6,utf8_decode($celular),1,0,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(2,.6,utf8_decode('TELEFONO: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(0,.6,utf8_decode($telefono),1,1,'J',0);

                $pdf->SetFont('Arial','B',10);
                $pdf->SetFillColor(187, 187, 187);
                $pdf->SetTextColor(0);
                $pdf->SetDrawColor(50,0,0);
                $pdf->SetLineWidth(.03);
                $pdf->Cell(0,.6,'DATOS DEL PATROCINADOR',1,1,'J',1);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(4.5,.6,utf8_decode('NOMBRE PATROCINADOR: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(0,.6,utf8_decode($nombrepatrocinador),1,1,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(3.3,.6,utf8_decode('CORREO PATROC.:'),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(7,.6,utf8_decode($correonotificacion),1,0,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(2.4,.6,utf8_decode('CEL. PATRO.: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(2.1,.6,utf8_decode($celularnotificacion),1,0,'J',0);

                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(2.3,.6,utf8_decode('TEL. PATRO.: '),1,0,'J',0);
                $pdf->SetFont('Arial','',8);
                $pdf->Cell(0,.6,utf8_decode($telefononotificacion),1,1,'J',0);
            }
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(187, 187, 187);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(50,0,0);
        $pdf->SetLineWidth(.03);
        $pdf->Cell(0,.6,'OBSERVACION',1,1,'C',1);
        $pdf->SetFont('Arial','',8);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);
        $pdf->Cell(0,1,utf8_decode($comentario),1,1,'C',1);

       
        ob_end_clean();
        $pdf->Output();
}