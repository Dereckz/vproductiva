<?php
require('../fpdf/fpdf.php');
include "../panel/func/profile.php";
require("../dev/conectar.php");

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
$pdf->Image('certproductividad.png',0,0,280,218,'PNG');
//$pdf->Image('1.png',0,0,299,218,'PNG');
//$pdf->Image('2.png',190,20,85,28,'PNG');
//$pdf->Image('3.png',210,155,15,15,'PNG');
//$pdf->Image('4.png',60,55,170,15,'PNG');

//$pdf->SetY(50);
//$pdf->SetX(60);
//$pdf->Cell(40,35,utf8_decode('CERTIFICADO'),1);

$pdf->SetFont('Times','I',25);
$pdf->SetY(105);
$pdf->SetX(105);
$pdf->Cell(160,15,utf8_decode( $consulta['cNombre'].' '.$consulta['cApellidoP'].' '.$consulta['cApellidoM']),0,0,'C');

$pdf->SetFont('Times','I',20);
$pdf->SetY(135);
$pdf->SetX(100);
$pdf->Cell(160,15,utf8_decode($curso),0,0,'C');


$pdf->SetFont('Times','I',15);
$pdf->SetY(159);
$pdf->SetX(170);
$pdf->Cell(50,15,utf8_decode(date("d/m/Y",strtotime($fecha['cDescripcion']))),0,0,'C');

$pdf->Output();
?>