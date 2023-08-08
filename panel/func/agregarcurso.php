<?php
include("..\..\dev\conectar.php");
session_start();

$btnAsginar=isset($_POST["btnAsignar"]);

if (!$btnAsginar) {
    $_SESSION["curso"]=array();
    echo "estas aqui";
}
    if ($btnAsginar) {
    $producto=$_REQUEST['cursoselect'];
    $idusuario=$_SESSION["id"];
    $idcurso= $_SESSION["curso"];

    $queryA = mysqli_query($conn,"INSERT INTO `detallecurso`(`iIdDetalleCurso`, `fkiIdUsuario`, `fkiIdCurso`, `cObservaciones`) 
                                   VALUES ('0','$idusuario','$idcurso','')");
                    if($queryA){
                        header("Location: http://localhost/vproductivam/panel/instructor.php");
                    }
    }


 
?>