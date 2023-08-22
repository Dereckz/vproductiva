<?php
include("..\dev\conectar.php");

$idCurso = $_POST['curso'];
$idUsuario = $_POST['usuario'];

$sql = "INSERT INTO inscripcion(fkiIdUsuario, fkiIdeCurso)
VALUES ($idUsuario,$idCurso)";

if (mysqli_query($conn, $sql)) {
    echo "Se inserto correctamente el registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    echo "El usuario fue registrado con exito";
?>
