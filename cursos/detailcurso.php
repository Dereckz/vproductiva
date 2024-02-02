<?php
    require("../dev/conectar.php");
    include "../panel/func/profile.php";
    if (!isset($_SESSION)) {
        session_start();
    }
    $idcursoseleccionado=$_GET["pidc"];
    $tituloarea=$_GET["areacurso"];
    $cursoname=$_GET["curso"];

?>      

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title><?php echo $tituloarea ?></title>
        <link href="../img/LOGOVP.ico" rel="icon">
    </head>
    <body>
        <header id="encabezado">
            
            <ul id="menu">
                <li class="logo"><img src="img/logob.png" id="logo"></li>
                <li class="menus"></li>
                <li class="menus" style="background-color: #872362;"><a href="../alumno/index.php" class="enlacemenu" style="color: white;" >Mis Cursos</a></li>
                <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">Catálogo de Cursos</a></li>
                <li class="menus"><a href="../account/login.html" class="enlacemenu">Salir</a></li>
            </ul>
        </header>
    <div>
   
        <!--<img class="tituloscursos" src="img/PLaboral.png" >-->
        <table id=tablarecursos>
            <tr> <td colspan=3 id=filatitulo> <h2><?php echo $cursoname?></h2> </td></tr>    
       
<?php
    $resultado = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta,c.fkidAreaCurso FROM usuarios u
    INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
    INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
    INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
    INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
    WHERE c.iIdCurso=".$idcursoseleccionado." and u.iIdUsuario=" . $_SESSION["id"].
    " ORDER BY m.fkiIdCurso");

    $resultadoVisto = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
    INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
    INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
    INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
    INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
    INNER JOIN visto v ON r.iIdRecurso = v.idRecurso
    WHERE c.iIdCurso=".$idcursoseleccionado." and v.idAlumno=" . $_SESSION["id"]." GROUP BY iIdRecurso");

    $existeexamen = mysqli_query($conn,"SELECT count(*) as existe 
                                        FROM resuelto 
                                        WHERE iestatus=1 
                                        AND idcurso=".$idcursoseleccionado);


    $numMudulo= mysqli_num_rows($resultado);
    $numVisto = mysqli_num_rows($resultadoVisto);
    $numexiste =mysqli_num_rows($existeexamen);
    $modulo=0;

    while ($consulta = mysqli_fetch_array($resultado)) {
            $modulo=$modulo+1;
            $check = mysqli_query($conn, "SELECT COUNT(*) as num FROM visto
                                        WHERE idRecurso= " . $consulta['iIdRecurso'] 
                                        . " and idAlumno=" . $_SESSION["id"] 
                                        ." and estatus=1");
            $info = mysqli_fetch_array($check);

            if ($info['num'] > 0) {
                $visto = 
                '<td class=temario>
                    <img src="img/checkcompleto.png" style="width: 2.4em; margin-left: 0.6em;">
                </td>';
            } else {
                $visto = 
                '<td class=temario>
                    <img src="img/checkvacio.png" style="width: 2.4em;">
                </td>';
            }
       
            echo 
            '<tr> 
                <td class=iconorecursocelda> '.$visto.'</td> 
                <td class=fondotemario>
                    <a class=titulostemario  href="'.$consulta['cRuta'].'" id="'.$consulta['iIdRecurso'].'" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                    Modulo '.$modulo.':<br> '.$consulta['cNombreModulo'].'
                    </a></td> 
                </tr>
             <tr>
                <td colspan=3 class=celdasvacias></td>
             </tr>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
            <script>
            // se insertara el recurso y alumno mas estatus.
            document.getElementById("' . $consulta['iIdRecurso'] . '").onclick = function(){
        
                idRecurso = "' . $consulta['iIdRecurso'] . '";
                idAlumno = "' . $_SESSION["id"] . '";
                //alert("Hey me tocaste");
        
               //Convertimos las variables de javascript en variables de PHP
                $( document ).ready(function() {
            // Definimos las variables de javascrpt
                var recurso = idRecurso;
                var alumno = idAlumno;
            // Ejecutamos AJAX
            $.post("visto.php",{"recurso":recurso,"alumno": alumno},function(respuesta){
                    alert(respuesta);
                    location.reload();
                });
                });
            }
        
            </script>
        
            ';
        
   
    }//fin while

    $examen ="";
    $masDedos='';
    $constancia="";
    $correcta=0;

    if($numMudulo==$numVisto){
      
        $consultavistotodo= mysqli_query($conn,"SELECT * FROM modulo m
        INNER JOIN recurso r
        on m.iIdModulo=r.fkiIdModulo
        INNER JOIN visto v
        on v.idRecurso=r.iIdRecurso
        WHERE m.fkiIdCurso=".$idcursoseleccionado.
        " AND v.estatus=1;");

        $vistoa = mysqli_fetch_array($consultavistotodo); 
        $numvisto=mysqli_num_rows($consultavistotodo);
        $intentoscorrectos="";

        if($numVisto>0 ){
        
           /*  while ($dataExamen = mysqli_fetch_array($existeexamen)) { 
            } */
                if ( $numexiste==0){
        
                    $constancia="";
                  $examen="";
                   /*  $examen='
                    <tr>
                    <td></td>
                    <td></td>
                        <td class=constancia>
                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                            id="texconstancia" target="_blank" 
                            class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                            Realizar Examen
                            <br>
                            </a>
                        </td>
                    </tr>
                    <tr><td     colspan=3 class=celdasvacias></td></tr>';   */
        
                }else
                {
                    $resultadoExamen=mysqli_query($conn,"SELECT *  FROM  resuelto 
                                                        WHERE idcurso=".$idcursoseleccionado.
                                                        " AND idusuario=" . $_SESSION["id"] .
                                                        " AND iEstatus=1
                                                         AND intento=(SELECT MAX(intento) FROM resuelto where iEstatus=1);");
                    $totalpreguntas =mysqli_num_rows($resultadoExamen);
                    $errores=0;
                    $aciertos=0;

                        while ($intentos = mysqli_fetch_array($resultadoExamen)) { 

                            if ($intentos['correcta']==0 ){
                                $errores = $errores + 1;
                                $correcta=0;
                            }elseif  ($intentos['correcta']==1 ){
                                $correcta=1;
                                $errores=0;
                                $aciertos=$aciertos+1;
                            }else{
                                $correcta="";
                                $errores="";
                            }            
                        }

                        $dataintentos=mysqli_query($conn,"SELECT *  FROM  resuelto 
                        WHERE idcurso=".$idcursoseleccionado.
                        " AND idusuario=" . $_SESSION["id"] .
                        " AND iEstatus=1
                         AND intento=(SELECT MAX(intento) FROM resuelto where iEstatus=1)
                         LIMIT 1;");
                        $intentosresultados = mysqli_fetch_array($dataintentos);
                        $haydatos=mysqli_num_rows($dataintentos);
                        if($haydatos>0 || !isset($haydatos)){
                            if($totalpreguntas==15){
                                switch ($intentosresultados["intento"]) {
                                    case 1:
                                        if($aciertos>11){
                                            $examen="";
                                            $constancia=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                    <td class=constancia>
                                                        <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                        DESCARGA TU CONSTANCIA<br>
                                                        </a>
                                                    </td>
                                                </tr>
                                             <tr>
                                                <td colspan=3 class=celdasvacias>
                                                </td>
                                            </tr>';   
                                        }else{
                                            $constancia="";
                                            $examen=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                <td class=constancia>
                                                    <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                    id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                    Realizar Examen<br>
                                                    </a>
                                                </td>
                                            </tr>
                                        <tr><td colspan=3 class=celdasvacias></td></tr>'; 
                                        }
                                       
                                    break;
                                    case 2:
                                        if($aciertos>11){
                                            $examen="";
                                            $constancia=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                    <td class=constancia>
                                                        <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                        DESCARGA TU CONSTANCIA<br>
                                                        </a>
                                                    </td>
                                                </tr>
                                             <tr>
                                                <td colspan=3 class=celdasvacias>
                                                </td>
                                            </tr>';   
                                        }else{
                                            $constancia="";
                                            $examen=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                <td class=constancia>
                                                    <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                    id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                    Realizar Examen<br>
                                                    </a>
                                                </td>
                                            </tr>
                                        <tr><td colspan=3 class=celdasvacias></td></tr>'; 
                                        }
                                       
                                    break;
                                    case 3:
                                        $examen="";
                                        $constancia="";
                                        $validarvisto=mysqli_query($conn,
                                        "SELECT* FROM visto v
                                        INNER JOIN inscripcion i
                                        ON v.idAlumno=i.fkiIdUsuario
                                        WHERE v.idAlumno=" .$_SESSION["id"].
                                        " AND i.fkiIdeCurso=".$idcursoseleccionado);
    
                                    
                                        while ($visto = mysqli_fetch_array($validarvisto))
                                        { 
                                            $dataresultado = mysqli_query($conn,
                                            "UPDATE visto  SET estatus=0 
                                            WHERE idvisto=" .$visto["idVisto"]);
                                                if ($dataresultado== TRUE) {
                                                    $dataresultad2 = mysqli_query($conn,
                                                    "DELETE FROM  resuelto 
                                                     WHERE idcurso=" .$idcursoseleccionado.
                                                    " AND idusuario=" . $_SESSION["id"]); 
                                                        $iestatus=0;
                                                  
                                                      
                                                     } else{
                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
                                                      }
                                        }
                                       
                                    break;
                                    
                                    default:
                                    $examen="";
                                    $constancia="";
                                   
                                }
                            }else if($totalpreguntas==10){
                                switch ($intentosresultados["intento"]) {
                                    case 1:
                                        if($aciertos>6){
                                            $examen="";
                                            $constancia=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                    <td class=constancia>
                                                        <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                        DESCARGA TU CONSTANCIA<br>
                                                        </a>
                                                    </td>
                                                </tr>
                                             <tr>
                                                <td colspan=3 class=celdasvacias>
                                                </td>
                                            </tr>';   
                                        }else{
                                            $constancia="";
                                            $examen=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                <td class=constancia>
                                                    <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                    id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                    Realizar Examen1<br>
                                                    </a>
                                                </td>
                                            </tr>
                                        <tr><td colspan=3 class=celdasvacias></td></tr>'; 
                                        }
                                       
                                    break;
                                    case 2:
                                        if($aciertos>6){
                                            $examen="";
                                            $constancia=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                    <td class=constancia>
                                                        <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                        DESCARGA TU CONSTANCIA<br>
                                                        </a>
                                                    </td>
                                                </tr>
                                             <tr>
                                                <td colspan=3 class=celdasvacias>
                                                </td>
                                            </tr>';   
                                        }else{
                                            $constancia="";
                                            $examen=
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                <td class=constancia>
                                                    <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                    id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                    Realizar Examen2<br>
                                                    </a>
                                                </td>
                                            </tr>
                                        <tr><td colspan=3 class=celdasvacias></td></tr>'; 
                                        }
                                       
                                    break;
                                    case 3:
                                       
                                         $validarvisto=mysqli_query($conn,
                                        "SELECT* FROM visto v
                                        INNER JOIN inscripcion i
                                        ON v.idAlumno=i.fkiIdUsuario
                                        WHERE v.idAlumno=" .$_SESSION["id"].
                                        " AND i.fkiIdeCurso=".$idcursoseleccionado);
    
                                    
                                        while ($visto = mysqli_fetch_array($validarvisto))
                                        { 
                                            $dataresultado = mysqli_query($conn,
                                            "UPDATE visto  SET estatus=0 
                                            WHERE idvisto=" .$visto["idVisto"]);
                                                if ($dataresultado== TRUE) {
                                                    $dataresultad2 = mysqli_query($conn,
                                                    "UPDATE  resuelto SET iEstatus=0 
                                                     WHERE idcurso=" .$idcursoseleccionado.
                                                    " AND idusuario=" . $_SESSION["id"]); 
                                                        $iestatus=0;
                                                  
                                                      
                                                     } else{
                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
                                                      }
                                        } 
                                       
                                    break;
                                    
                                    default:
                                    $examen="";
                                    $constancia="";
                                   
                                }
                            }else if($totalpreguntas==0){
                                $examen='
                                    <tr>
                                    <td></td>
                                    <td></td>
                                        <td class=constancia>
                                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                            id="texconstancia" target="_blank" 
                                            class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                            Realizar Examen
                                            <br>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr><td     colspan=3 class=celdasvacias></td></tr>';
                            }else{
                                $examen=".";

                            }
                            
                       }else{
                      /*   $examen='
                    <tr>
                    <td></td>
                    <td></td>
                        <td class=constancia>
                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                            id="texconstancia" target="_blank" 
                            class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                            Realizar Examen
                            <br>
                            </a>
                        </td>
                    </tr>
                    <tr><td     colspan=3 class=celdasvacias></td></tr>';    */
                       }
                      
                }

            
                $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion WHERE fkiIdeCurso = 1 and fkiIdUsuario =".$_SESSION["id"]);
                $idIns= mysqli_fetch_array($consCur);
            
                $masDedos=$idIns['finalizado'];
            
                date_default_timezone_set('America/Mexico_City');
                $fecha = date("Y-m-d");
                $fechafor = strval($fecha);
            
                if($idIns['cDescripcion'] ==''){
                $act = "UPDATE inscripcion SET cDescripcion = '".$fechafor."' WHERE iIdInscripcion =".$idIns['iIdInscripcion'];
                    if (mysqli_query($conn, $act)) {
                        //echo "Se actualizo correctamente el registro";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
        }else{
                $constancia="";
                $examen="";
        }
        if($masDedos==3){
            $mensaje= '<tr><td></td><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
        }
        else{
            $mensaje='';
        }
    }else{
        
        $constancia="";
        $examen="";
        $mensaje='';

    }

        echo $constancia;
        echo $examen;
        echo $mensaje;
    
    ?>
    