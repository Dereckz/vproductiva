<?php
require('../fpdf/fpdf.php');
include "../panel/func/profile.php";
include "..\dev\conectar.php";

date_default_timezone_set('America/Mexico_City');

if (!isset($_SESSION)) {
    session_start();
}
//$fecha = date("d-m-y");

$curso =$_GET['curso'];
$idCur =$_GET['idCurso'];

$consCurs = mysqli_query($conn, "SELECT * FROM  inscripcion WHERE fkiIdeCurso =".$idCur." and fkiIdUsuario =".$_SESSION["id"]);
$fecha = mysqli_fetch_array($consCurs);
$resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE iIdUsuario=" . $_SESSION["id"]);
$consulta = mysqli_fetch_array($resultado);

$pdf = new FPDF('L','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',70);
$pdf->Image('1.png',0,0,299,218,'PNG');
$pdf->Image('2.png',190,20,85,28,'PNG');
$pdf->Image('3.png',210,155,15,15,'PNG');
$pdf->Image('4.png',60,55,170,15,'PNG');

//$pdf->SetY(50);
//$pdf->SetX(60);
//$pdf->Cell(40,35,utf8_decode('CERTIFICADO'),1);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(75);
$pdf->SetX(98);
$pdf->Cell(50,15,utf8_decode('D E   P A R T I C I P A C I Ó N   P A R A :'),0);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(90);
$pdf->SetX(75);
$pdf->Cell(160,15,utf8_decode( $consulta['cNombre'].' '.$consulta['cApellidoP'].' '.$consulta['cApellidoM']),0,0,'C');

$pdf->SetFont('Arial','B',16);
$pdf->SetY(95);
$pdf->SetX(75);
$pdf->Cell(160,15,utf8_decode('______________________________________________________'),0,0,'C');


$pdf->SetFont('Arial','B',16);
$pdf->SetY(110);
$pdf->SetX(75);
$pdf->Cell(160,15,utf8_decode('POR HABER CONCLUIDO EXITOSAMENTE EL CURSO DE'),0,0,'C');

$pdf->SetFont('Arial','B',16);
$pdf->SetY(130);
$pdf->SetX(75);
$pdf->Cell(160,15,utf8_decode($curso),0,0,'C');

$pdf->SetFont('Arial','B',16);
$pdf->SetY(134);
$pdf->SetX(75);
$pdf->Cell(160,15,utf8_decode('______________________________________________________'),0,0,'C');


$pdf->SetFont('Arial','B',16);
$pdf->SetY(159);
$pdf->SetX(90);
$pdf->Cell(50,15,utf8_decode($fecha['cDescripcion']),0,0,'C');

$pdf->SetFont('Arial','B',16);
$pdf->SetY(162);
$pdf->SetX(90);
$pdf->Cell(50,15,utf8_decode('______________'),0,0,'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetY(170);
$pdf->SetX(105);
$pdf->Cell(50,15,utf8_decode('FECHA'),0);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(162);
$pdf->SetX(190);
$pdf->Cell(50,15,utf8_decode('______________'),0,0,'C');


$pdf->SetFont('Arial','B',10);
$pdf->SetY(170);
$pdf->SetX(210);
$pdf->Cell(50,15,utf8_decode('FIRMA'),0);


$pdf->Output();
?>