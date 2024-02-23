
<?php
require("../dev/conectar.php");

$idCurso = $_POST['curso'];
$idUsuario = $_POST['usuario'];

//echo $idCurso.$idUsuario;
//die();

//$sql = "DELETE FROM inscripcion WHERE fkiIdUsuario =".$idUsuario." AND fkiIdeCurso =".$idCurso;
$sql = "UPDATE inscripcion SET finalizado = 2 WHERE fkiIdeCurso = ".$idCurso." and fkiIdUsuario =".$idUsuario;
        
if (mysqli_query($conn, $sql)) {
    echo "Se elimino correctamente el registro";
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   
    
}
   //echo "El curso se elimino";

  
?>