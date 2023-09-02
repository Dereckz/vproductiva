<?php
include("..\..\dev\conectar.php");
session_start();



/* if (!$btnAsginar) {
   // $_SESSION["curso"]=array();
   // echo "estas aqui";
} */
    if ($btnAsginar) {
        //$producto=$_GET['cursoselect'];
        $idusuario=$_SESSION["id"];
        $idcurso=$_REQUEST['cursoselect'];

        $queryA = mysqli_query($conn,"INSERT INTO `survey_set`(`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`)
									   VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')");
                        if($queryA){
                            echo "<script>";
                            echo "MiFuncionJS();";
                            echo "</script>";
                             header("Location: http://localhost/vproductivam/panel/instructor.php");
                          
                        }
        }

    
 
?>