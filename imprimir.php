<?php 
require('fpdf/fpdf.php');
include 'conexion.php';
ini_set('default_charset','utf-8');
//Connection and query
$tipo=$_GET['tipo'];	
$e=$_GET['requisitosfaltantes'];	
$nombrefuncionario=$_GET['nombrefuncionario'];	


$con=conexion();
$res=pg_query($con,"SELECT tipotramite, norequisito, detalle FROM requisitos WHERE tipotramite='$tipo' order by norequisito asc;");
$res1=pg_query($con,"SELECT tipo FROM tipo where no='$tipo';");
pg_close($con);
while($fila2=pg_fetch_array($res1)){$nombretipo=$fila2[0];}
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


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(187, 187, 187);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(50,0,0);
$pdf->SetLineWidth(.01);
$pdf->SetXY(1,5);
$pdf->Cell(0,.6,utf8_decode('FICHA DE RECEPCIÓN DE DOCUMENTOS'),1,1,'C',1);


//$pdf->SetFont('Arial', 'U',12);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(3.5,.5,utf8_decode('FECHA: '),1,0,'J',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,.5,"".date("d/m/Y"),1,1,'J',0);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(3.5,.6,utf8_decode('TIPO DE TRÁMITE: '),1,0,'J',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,.6,utf8_decode($nombretipo),1,1,'J',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(3.5,.6,utf8_decode('NOMBRE SERVIDOR: '),1,0,'J',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,.6,utf8_decode($nombrefuncionario),1,1,'J',0);

//Set font and colors
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(187, 187, 187);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(50,0,0);
$pdf->SetLineWidth(.03);
$pdf->SetXY(1,8);
$pdf->Cell(0,.6,'REQUISITOS',1,1,'C',1);



//Restore font and colors
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);

//Build table

$pdf->SetFont('Arial','',8);
while($fila1=pg_fetch_array($res))
{ 
    $d=$fila1[1];
    $c=$fila1[2];
    $a=$d.". ".$c;
    $pdf->MultiCell(0,.5,utf8_decode($a),1,1,'J',1);   
}

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(187, 187, 187);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(50,0,0);
$pdf->SetLineWidth(.03);
$pdf->Cell(0,.6,'OBSERVACION',1,1,'C',1);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->Cell(0,1,"Requisitos faltantes son:  ".$e,1,1,'C',1);

ob_end_clean();
$pdf->Output();
?>
