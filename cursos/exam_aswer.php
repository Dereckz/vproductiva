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
//$originalDate = $_GET["fecha"];
$fecha= date("Y-m-d H:i:s");
$intento="1";
$iestatus="";

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
                //primer intento
             if($inforesultado["intento"]<=0){
                    $intento=1;
                    $iestatus=1;

             }
             else if($inforesultado["intento"]>=2)
             {
                //restear
                $validarvisto=mysqli_query($conn,
                "SELECT* FROM visto v
                INNER JOIN inscripcion i
                ON v.idAlumno=i.fkiIdUsuario
                WHERE v.idAlumno=" .$idusuario.
                " AND i.fkiIdeCurso=".$idcurso);

               
                while ($visto = mysqli_fetch_array($dataresultado))
                { 
                    $dataresultado = mysqli_query($conn,
                    "UPDATE visto  SET iEstatus=0 
                     WHERE idvisto=" .$visto["idVisto"]);

                }
                /* $dataresultado = mysqli_query($conn,
                "UPDATE  resuelto SET iEstatus=0 
                 WHERE idcurso=" .$idcurso.
                " AND idusuario=" .$idusuario.
                " AND idexamen=" .$idexamen ); */
                $iestatus=0;
               // if ($dataresultado== TRUE) {
                 
                    header("Location:index.php");
                 // } else{
                   // header("Location:resultado.php");
                  //}

             }
             else
             {//agrgar intentos
                $intento=$inforesultado["intento"]+1;
                $iestatus=1;
             }

             $data.=", intento=".$intento;
             $data.=", iestatus=".$iestatus;

             $INSERT[] = $conn->query("INSERT INTO resuelto set $data");
                
        }
  

   
        if(isset($INSERT)){
            header("Location:resultado.php?idex=".$idexamen."&idc=".$idcurso."&idu=".$idusuario."&i=".$intento);
          }else
          {
            header("Location:resultado.php");
           
          }
?>