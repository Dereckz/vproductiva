<?php
include("..\dev\conectar.php");

$idrecurso = $_POST['recurso'];
$idAlumno = $_POST['alumno'];

//echo $idrecurso.$idAlumno;
//die();
$sql = "INSERT INTO visto(idRecurso, idAlumno, estatus)
VALUES ($idrecurso,$idAlumno,1)";
//$sql = "DELETE FROM inscripcion WHERE fkiIdUsuario =".$idUsuario." AND fkiIdeCurso =".$idCurso;

if (mysqli_query($conn, $sql)) {
    echo "Se inserto correctamente el registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    echo "Visto";
?>