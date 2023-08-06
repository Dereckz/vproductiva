<?php
//    session_start();


function listcurso()
{
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM Curso");
    
    
    while ($consulta = mysqli_fetch_array($resultado)) {
        $IdCurso=$consulta["iIdCurso"];
        echo ' <option value='.$consulta["cNombreCurso"].'>'.$consulta["cNombreCurso"].'</option> ';

    }
       
    }

    if (!isset($_POST["btnAsignar"])) {
        $_SESSION["curso"]=array();
        echo "estas aqui";
    }
    if (isset($_POST["btnAsignar"])) {
    $producto=$_REQUEST['curso'];
    echo "estas aca";

}
?>