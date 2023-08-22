<?php
include("..\dev\conectar.php");

$idCurso = $_POST['curso'];
$idUsuario = $_POST['usuario'];

//echo $idCurso.$idUsuario;
//die();

$sql = "DELETE FROM inscripcion WHERE fkiIdUsuario =".$idUsuario." AND fkiIdeCurso =".$idCurso;

if (mysqli_query($conn, $sql)) {
    echo "Se elimino correctamente el registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    echo "El curso se elimino";
?>