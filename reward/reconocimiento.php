<?php
require('../fpdf/fpdf.php');
include "../panel/func/profile.php";
require("../dev/conectar.php");

date_default_timezone_set('America/Mexico_City');

header("Content-Type: text/html; charset=iso-8859-1 ");

if (!isset($_SESSION)) {
    session_start();
}

$idCur =$_GET['idCurso'];


$consCurs = mysqli_query($conn, "SELECT * FROM  inscripcion WHERE fkiIdeCurso =".$idCur." and fkiIdUsuario =".$_SESSION["id"]);
$fecha = mysqli_fetch_array($consCurs);
$resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE iIdUsuario=" . $_SESSION["id"]);
$consulta = mysqli_fetch_array($resultado);

$detallecurso = mysqli_query($conn, "SELECT * FROM curso WHERE iIdCurso=" .$idCur);
$infocurso = mysqli_fetch_array($detallecurso);

$datacertificado = mysqli_query($conn, "SELECT * FROM certificado WHERE fkidcurso=" .$idCur);
$certificado = mysqli_fetch_array($datacertificado);

$pdf = new FPDF('L','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',70);
$pdf->Image($certificado["certificado"],0,0,280,218,'JPG');
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
$pdf->Cell(160,15, iconv('UTF-8', 'windows-1252', $consulta['cNombreLargo']),0,0,'C');


    //$infocurso["cNombreCurso"]

 /*

$pdf->SetFont('Times','I',20);
$pdf->SetY(135);
$pdf->SetX(100);
$pdf->Cell(160,15,html_entity_decode($infocurso["cNombreCurso"]),0,0,'C');

*/


$pdf->SetFont('Times','I',15);
$pdf->SetY(154);
$pdf->SetX(130);
$pdf->Cell(50,15,mb_convert_encoding(date("d/m/Y",strtotime($fecha['cDescripcion'])), 'UTF-8', mb_list_encodings()),0,0,'C');

$pdf->Output();
?>
