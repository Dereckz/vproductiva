<?php 
require("../../dev/conectar.php");

session_start();

$btnSurvey=isset($_POST["btnSurvey"]);
$surveylist =array();
$contadorlist=0;

    if ($btnSurvey) {

         $idusuario=$_POST["idmaestro"];           

        $resultado = mysqli_query($conn, "SELECT * FROM survey_set ;");
            while ($consulta = mysqli_fetch_array($resultado)) {
            
                $ids=$consulta["id"];
              

                if (isset($_REQUEST[$ids])) {
                    
                    $surveylist[$ids]=$ids;
                    
                }
               
            }
           
              
             foreach ($surveylist as $val) {
                    
                            $queryA = mysqli_query($conn,"INSERT INTO `detallesurvey`(`iIdDetalleSurvey`, `idSurvey`, `idUsuario`, `idAswer`) 
                            VALUES ('0','$val','$idusuario', '')");
                                if($queryA){
                                    $contadorlist=$contadorlist+1;   
                                    //echo $contadorlist;
                                }
                }
                unset($val); 

                        echo "<script>";
                        echo "MiFuncionJS();";
                        echo "</script>";
                        header("Location: ../instructor.php");  
                       
        } 
 ?>