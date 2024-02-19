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
                <li class="logo"><a href="../alumno/index.php"><img src="img/logob.png" id="logo"></a></li>
                <li class="menusvacio"></li>
                <li class="menus"><a href="../alumno/index.php" class="enlacemenu" >MI PERFIL</a></li>
                <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">CATÁLOGO DE CURSOS</a></li>
                <li class="menus"><a href="../account/login.html" class="enlacemenu">SALIR</a></li>
            </ul>
        </header>
    <div>
   
        <!--<img class="tituloscursos" src="img/PLaboral.png" >-->
        <table id=tablarecursos>

        <tr> <td colspan=3 id=filatitulo> <h2><?php echo $cursoname?></h2> </td></tr>    
       
<?php
    
    try{
        if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
            header( "Location: https://valuacionproductiva.mx/" );
        }else{

            $resultado = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta,r.cNombreRecurso,r.cFormato,c.fkidAreaCurso FROM usuarios u
            INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
            INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
            INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
            INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
            WHERE c.iIdCurso=".$idcursoseleccionado.
            " AND u.iIdUsuario=" . $_SESSION["id"].
            " ORDER BY m.fkiIdCurso");
        
            $resultadoVisto = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
            INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
            INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
            INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
            INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
            INNER JOIN visto v ON r.iIdRecurso = v.idRecurso
            WHERE c.iIdCurso=".$idcursoseleccionado.
            " AND v.idAlumno=" . $_SESSION["id"].
            " AND v.estatus=1 ".
            " GROUP BY iIdRecurso");
        
            $existeexamen = mysqli_query($conn,"SELECT count(*) as existe 
                                                FROM resuelto 
                                                WHERE iestatus=1 
                                                AND idcurso=".$idcursoseleccionado);
        
        
            $numMudulo= mysqli_num_rows($resultado);
            $numVisto = mysqli_num_rows($resultadoVisto);
            $numexiste =mysqli_num_rows($existeexamen);
            $modulo=0;
        
            $result="";
        
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
        
                  
                   
                    //if(  $consulta['cFormato']=="mp4"){
        
                        $archivoconextension= explode('/',$consulta['cRuta']);
                        $url='r='.$archivoconextension[3];
                        $recursourl=str_replace($archivoconextension[3],$consulta['cNombreCurso'],$url);
                       
                        $rutarrecuso='view.php?irc='.$consulta["iIdRecurso"].'&'.$recursourl;
                  //  }else{
        
                        
                    //    $rutarrecuso= $consulta['cRuta'];
                    //}
                         
                    echo 
                    '<tr> 
                        <td class=iconorecursocelda> '.$visto.'</td> 
                        <td class=fondotemario>
                            <a class=titulostemario  href="'.$rutarrecuso.'" id="'.$consulta['iIdRecurso'].'" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
        
                            Módulo '.$modulo.'.<br><span id="titulotema"> '.$consulta['cNombreModulo'].'</span>
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
            $mensaje="";
            
            if($numMudulo==$numVisto){
        
                $intentoscorrectos="";
                  
                        if ( $numexiste==0){
                            $constancia="";
                            $examen="";                 
                        }else
                        {
                            $resultadoExamen=mysqli_query($conn,"SELECT *  FROM  resuelto 
                                                                WHERE idcurso=".$idcursoseleccionado.
                                                                " AND idusuario=" . $_SESSION["id"] .
                                                                " AND iEstatus=1
                                                                 AND intento=(SELECT MAX(intento) FROM resuelto 
                                                                              WHERE iEstatus=1 
                                                                              AND idcurso=" .$idcursoseleccionado.
                                                                              " AND idusuario=". $_SESSION["id"] .");");
                          
                            $totalpreguntas =mysqli_num_rows($resultadoExamen);
                            $errores=0;
                            $aciertos=0;
        
                                while ($intentos = mysqli_fetch_array($resultadoExamen)) { 
        
                                    if ($intentos['correcta']==0 ){
                                        $errores =intval($errores) + 1;
                                        $correcta=0;
                                    }if  ($intentos['correcta']==1 ){
                                        $correcta=1;
                                        $errores=0;
                                        $aciertos=intval($aciertos)+1;
                                    }else{
                                        $correcta="";
                                        $errores="";
                                    }            
                                }
        
                                $dataintentos=mysqli_query($conn,"SELECT *  FROM  resuelto 
                                WHERE idcurso=".$idcursoseleccionado.
                                " AND idusuario=" . $_SESSION["id"] .
                                " AND iEstatus=1
                                 AND intento=(SELECT MAX(intento) FROM resuelto 
                                                WHERE iEstatus=1 
                                                AND idcurso=" .$idcursoseleccionado.
                                                " AND idusuario=".$_SESSION["id"].")
                                                LIMIT 1;");
                                               
                                $intentosresultados = mysqli_fetch_array($dataintentos);
                                $haydatos=mysqli_num_rows($dataintentos);
        
                                if($haydatos>0){
                                   
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
                                                                <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia2" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                                DESCARGA TU CONSTANCIA<br>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                     <tr>
                                                        <td colspan=3 class=celdasvacias>
                                                        </td>
                                                    </tr>';   
                                                    $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion 
                                                    WHERE fkiIdeCurso = ".$idcursoseleccionado.
                                                    " AND fkiIdUsuario =".$_SESSION["id"]);
                                                    $idIns= mysqli_fetch_array($consCur);
                                                    $numins=mysqli_num_rows($consCur);
                                                                
                                                    $masDedos=$idIns["finalizado"];
                            
        
                                                    date_default_timezone_set('America/Mexico_City');
                                                    $fecha = date("Y-m-d");
                                                    $fechafor = strval($fecha);
        
                                                     if(($idIns['cDescripcion'])== null){
                                                    
                                                    $act = "UPDATE inscripcion SET cDescripcion = '$fechafor' WHERE iIdInscripcion =".$idIns['iIdInscripcion'];
                                                        if (mysqli_query($conn, $act)) {
                                                            //echo "Se actualizo correctamente el registro";
                                                        } else {
                                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                        }
                                                    }
                                            
                                                    if($masDedos==3){
                                                        $mensaje= '<tr><td></td><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
                                                    }
                                                    else{
                                                        $mensaje='';
                                                    }
                                                }else{
                                                    $constancia="";
                                                    $examen=
                                                    '<tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class=constancia>
                                                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                            id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                            EVALÚA TUS CONOCIMIENTOS<br>
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
                                                                    <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia2" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                                    DESCARGA TU CONSTANCIA<br>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                         <tr>
                                                            <td colspan=3 class=celdasvacias>
                                                            </td>
                                                        </tr>';   
        
                                                        $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion 
                                                        WHERE fkiIdeCurso = ".$idcursoseleccionado.
                                                        " AND fkiIdUsuario =".$_SESSION["id"]);
                                                        $idIns= mysqli_fetch_array($consCur);
                                                        $numins=mysqli_num_rows($consCur);
                                                                    
                                                        $masDedos=$idIns["finalizado"];
                                
            
                                                        date_default_timezone_set('America/Mexico_City');
                                                        $fecha = date("Y-m-d");
                                                        $fechafor = strval($fecha);
            
                                                        if(($idIns['cDescripcion'])== null){
                                                        
                                                        $act = "UPDATE inscripcion SET cDescripcion = '$fechafor' WHERE iIdInscripcion =".$idIns['iIdInscripcion'];
                                                            if (mysqli_query($conn, $act)) {
                                                                //echo "Se actualizo correctamente el registro";
                                                            } else {
                                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                            }
                                                        }
                                                
                                                        if($masDedos==3){
                                                            $mensaje= '<tr><td></td><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
                                                        }
                                                        else{
                                                            $mensaje='';
                                                        }
                                                    }else{
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
                                                                     
                                                                     } else{
                                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
                                                                      }
                                                        } 
                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
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
                                                    echo '<script type="text/JavaScript"> location.reload(); </script>';
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
                                                                <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'"   id="texconstancia2" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                                DESCARGA TU CONSTANCIA<br>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                     <tr>
                                                        <td colspan=3 class=celdasvacias>
                                                        </td>
                                                    </tr>';   
        
                                                    $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion 
                                                    WHERE fkiIdeCurso = ".$idcursoseleccionado.
                                                    " AND fkiIdUsuario =".$_SESSION["id"]);
                                                    $idIns= mysqli_fetch_array($consCur);
                                                    $numins=mysqli_num_rows($consCur);
                                                                
                                                    $masDedos=$idIns["finalizado"];
                            
        
                                                    date_default_timezone_set('America/Mexico_City');
                                                    $fecha = date("Y-m-d");
                                                    $fechafor = strval($fecha);
        
                                                    if(($idIns['cDescripcion'])== null){
                                                    
                                                    $act = "UPDATE inscripcion SET cDescripcion = '$fechafor' WHERE iIdInscripcion =".$idIns['iIdInscripcion'];
                                                        if (mysqli_query($conn, $act)) {
                                                            //echo "Se actualizo correctamente el registro";
                                                        } else {
                                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                        }
                                                    }
                                            
                                                    if($masDedos==3){
                                                        $mensaje= '<tr><td></td><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
                                                    }
                                                    else{
                                                        $mensaje='';
                                                    }
                                                }else{
                                                    $constancia="";
                                                    $examen=
                                                    '<tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class=constancia>
                                                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                            id="texconstancia" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">    
                                                            EVALÚA TUS CONOCIMIENTOS<br>
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
                                                                    <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia2" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                                    DESCARGA TU CONSTANCIA<br>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                         <tr>
                                                            <td colspan=3 class=celdasvacias>
                                                            </td>
                                                        </tr>';   
                                                        $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion 
                                                        WHERE fkiIdeCurso = ".$idcursoseleccionado.
                                                        " AND fkiIdUsuario =".$_SESSION["id"]);
                                                        $idIns= mysqli_fetch_array($consCur);
                                                        $numins=mysqli_num_rows($consCur);
                                                                    
                                                        $masDedos=$idIns["finalizado"];
                                
            
                                                        date_default_timezone_set('America/Mexico_City');
                                                        $fecha = date("Y-m-d");
                                                        $fechafor = strval($fecha);
            
                                                        if(($idIns['cDescripcion'])== null){
                                                        
                                                        $act = "UPDATE inscripcion SET cDescripcion = '$fechafor' WHERE iIdInscripcion =".$idIns['iIdInscripcion'];
                                                            if (mysqli_query($conn, $act)) {
                                                                //echo "Se actualizo correctamente el registro";
                                                            } else {
                                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                            }
                                                        }
                                                
                                                        if($masDedos==3){
                                                            $mensaje= '<tr><td></td><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
                                                        }
                                                        else{
                                                            $mensaje='';
                                                        }
                                                    }else{
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
                                                                     
                                                                     } else{
                                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
                                                                      }
                                                        } 
                                                        echo '<script type="text/JavaScript"> location.reload(); </script>';
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
                                                            "DELETE FROM  resuelto 
                                                            WHERE idcurso=" .$idcursoseleccionado.
                                                          " AND idusuario=" . $_SESSION["id"]); 
                                                             
                                                             } else{
                                                                echo '<script type="text/JavaScript"> location.reload(); </script>';
                                                              }
                                                } 
                                                echo '<script type="text/JavaScript"> location.reload(); </script>';
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
                                                    id="texconstancia" 
                                                    class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                    EVALÚA TUS CONOCIMIENTOS
                                                    <br>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr><td     colspan=3 class=celdasvacias></td></tr>';
                                    }else{
                                        $examen=".";
        
                                    }
                                    
                               }else{
                                    if($numVisto>0){
                                        $examen='
                                        <tr>
                                        <td></td>
                                        <td></td>
                                            <td class=constancia>
                                                <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" 
                                                id="texconstancia" target="_self" 
                                                class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                                EVALÚA TUS CONOCIMIENTOS
                                                <br>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr><td     colspan=3 class=celdasvacias></td></tr>';  
                                    }else{
                                        $examen=""
                                    ;
                                    }
                            
                               
                               }
                              
                        }
        
                       
            }else{
                
                $constancia="";
                $examen="";
                $mensaje='';
        
            }
        
                echo $constancia;
                echo $examen;
                echo $mensaje;
        }

    }catch(ex){
        header( "Location: https://valuacionproductiva.mx/" );
    }
  
        
    
    ?>
    </table>
      </div>
        <section id="footer">
            <div id="divfooter">
                <div id="logopie">
                    <img src="../img/logob2.png" id="imglogopie">
                </div>
                <div id="texto1pie">
                    <p id="parrafodireccion" class="parrafosfooter">Dirección: Av. Paseo de las Palmas 830, Int. 102-1.
                    Lomas de Chapultepec V Sección. Miguel Hidalgo.
                    Ciudad de México. C.P. 11000. México.</p>
                    <p class="parrafosfooter">Teléfono: 55-104-680-95</p>
                    <p class="parrafosfooter">Correo electrónico: valuacionproductiva9@gmail.com</p>
                </div>
                <div id="texto2pie">
                    <p class="parrafosfooter"><a href="../alumno/indexterminos.html" class="parrafosfooter" id="terminosycon">Terminos y Condiciones</a></p>
                    <p id="parrafoter" class="parrafosfooter">© 2024 VALUACIÓN PRODUCTIVA Y
                    COMPETITIVA EN MATERIA LABORAL A.C.</p>
                </div>
            </div>
        
        </section>
    </body>
</html>

    