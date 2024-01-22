<?php
session_start();
require("../dev/conectar.php");

date_default_timezone_set('America/Mexico_City');


$idexamen=$_GET["idEx"];
$idcurso=$_GET["idC"];
$contadorpreguntas=0;
$contadorrespuestas=0;
$idusuario=$_GET["idU"];
$idpregunta=$_GET["idpregunta"];
$idrespuesta=$_GET["idrespuesta"];
$originalDate = $_GET["fecha"];
$fecha= date("Y-m-d H:i:s");
$intento="1";

    $dataresultado = mysqli_query($conn, "SELECT * FROM resuelto 
                                    WHERE idcurso=" .$idcurso.
                                    " AND idusuario=" .$idusuario.
                                    " AND fecha like '%".date("Y-m")."%' order by fecha DESC  LIMIT 1;");

    $inforesultado = mysqli_fetch_array($dataresultado);

    $data="";
    
        foreach($idpregunta as $pid){
            $data="idexamen=".$idexamen;
            $data.=", idcurso=".$idcurso;
            $data.=", idusuario=".$idusuario;
            $data.=", fecha='".$fecha. "'";
            $question = $conn->query("SELECT * FROM respuesta where idpregunta = $pid");
            $data .=", idpregunta=".$pid;

            $resultado = $conn->query("SELECT * FROM resuelto where idexamen = $pid and idusuario=".$idusuario);

            while($row=$question->fetch_assoc())	:  
            
                foreach($idrespuesta as $rid){

                    if ($row["idrespuesta"]==$rid){
                        $data .=", idrespuesta=".$rid;

                         //validarsi es correta
                        $correcta = $conn->query("SELECT * FROM respuesta where idpregunta = $pid and correcta=1");
                        while($rowcita=$correcta->fetch_assoc())	:
                            if ($rowcita["idrespuesta"]==$rid){
                                $data .=", correcta=1";
                            }else{
                                $data .=", correcta=0";
                            }
                        endwhile;
                    }                                 
                   
                }
               
             endwhile;

             if($inforesultado["intento"]<=0){
                    $intento=1;
             }else
             {
                $intento=$inforesultado["intento"]+1;
             }
             $data.=", intento=".$intento;

             $INSERT[] = $conn->query("INSERT INTO resuelto set $data");
                
        }
  

   
        if(isset($INSERT)){
            header("Location:resultado.php?idex=".$idexamen."&idc=".$idcurso."&idu=".$idusuario."&i=".$intento);
          }else
          {
            header("Location:resultado.php");
           
          }
?>