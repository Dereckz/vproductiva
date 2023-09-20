<?php
require("../../dev/conectar.php");
session_start();

$btnAsginar=isset($_POST["btnAsignar"]);

// if (!$btnAsginar) {
//    // $_SESSION["curso"]=array();
//    // echo "estas aqui";
// }
    if ($btnAsginar) {
        //$producto=$_GET['cursoselect'];
        $idusuario=$_POST["idmaestro"];
        $idcurso=$_REQUEST['cursoselect'];

        $queryA = mysqli_query($conn,"INSERT INTO `detallecurso`(`iIdDetalleCurso`, `fkiIdUsuario`, `fkiIdCurso`, `cObservaciones`) 
                                    VALUES ('0','$idusuario','$idcurso', '')");
                        if($queryA){
                            echo "<script>";
                            echo "MiFuncionJS();";
                            echo "</script>";
                             header("Location: http://localhost/vproductivam/panel/instructor.php");
                          
                        }
        }

    
 
?>