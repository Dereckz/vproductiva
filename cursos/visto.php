<?php
require("../dev/conectar.php");

$idrecurso = $_POST['recurso'];
$idAlumno = $_POST['alumno'];

$consulta = mysqli_query($conn, "SELECT * FROM visto WHERE idAlumno=$idAlumno AND idRecurso=$idrecurso and estatus=1 ");

$num = mysqli_num_rows($consulta);

if ($num > 0) {
    echo "Visto";
} else {
    $sql = "INSERT INTO visto(idRecurso, idAlumno, estatus)
VALUES ($idrecurso,$idAlumno,1)";
//$sql = "DELETE FROM inscripcion WHERE fkiIdUsuario =".$idUsuario." AND fkiIdeCurso =".$idCurso;

    if (mysqli_query($conn, $sql)) {
        echo "Se inserto correctamente el registro";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
