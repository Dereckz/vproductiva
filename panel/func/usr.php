<?php
include("..\dev\conectar.php");

$nombreusuario=($_POST["name_nav"]);
$curso= $mysqli->real_escape_string($_POST["curso"]);
$modulo= $mysqli->real_escape_string($_POST["modulo"]);

$query = mysqli_query($conn,"SELECT * from curso where iEstatus=1 and iIdCurso=1;");
//$nr = mysqli_num_rows($query);


if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $curso = $row["Nombre"];
        $modulo = $row["Nivel"];
        
    }

    /* free result set */
    $result->free();
}else if ($nr == 0)  {
  echo "Error de BD, no se pudo consultar la base de datos\n";
     echo "Error MySQL: ' . mysql_error()";
 }



?>