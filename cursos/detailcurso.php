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
    WHERE c.iIdCurso=".$idcursoseleccionado." and u.iIdUsuario=" . $_SESSION["id"]);

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
    if($numVisto>0 and $vistoa>0){
    
        while ($dataExamen = mysqli_fetch_array($existeexamen)) { 
           
            if ( $dataExamen['existe']<1){
      
                $constancia="";
                
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
    
            }else
            {
                $resultadoExamen=mysqli_query($conn,"SELECT *  FROM  resuelto 
                                                    WHERE idcurso=".$idcursoseleccionado.
                                                    " AND idusuario=" . $_SESSION["id"] .
                                                    " AND iEstatus=1");
                $numencuesta =mysqli_num_rows($resultadoExamen);
                $errores=0;
                  

                  
                    while ($intentos = mysqli_fetch_array($resultadoExamen)) { 

                        if ($intentos['correcta']==0 ){
                            $errores = $errores + 1;
                            $correcta=0;
                            $resres=$intentos['correcta'];
                            $intentosincorrectos=$intentos['intento'];

                        }elseif  ($intentos['correcta']==1 ){
                            $correcta=1;
                            $errores=0;
                            $intentoscorrectos=$intentos['intento'];
                        }else{
                            $correcta="";
                            $errores="";
                            $intentoscorrectos="";
                            $intentosincorrectos="";

                        }
        
                    }

                    if (  $correcta==1 & $intentoscorrectos<3 ){
                        $examen="";//"Bien hecho";
                        $constancia='<tr>
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
                
                                      
                    }else  if ($intentoscorrectos>2)
                    {   
                        $constancia="";
                        $examen="";
                        //"Restear";}
                        $constancia="";
                       /*   $constancia='<tr>
                        <td></td>
                        <td></td>
                            <td class=constancia>
                                <a href="../alumno/recoproductividad.php?curso=PRODUCTIVIDAD LABORAL&idCurso=1" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                DESCARGA TU CONSTANCIA<br>
                                </a>
                            </td>
                        </tr>
                     <tr>
                        <td colspan=3 class=celdasvacias>
                        </td>
                     </tr>';   */
                
                    } 
                    else if ($errores<=3){
                        $constancia="";

                        $examen='<tr>
                        <td></td>
                        <td></td>
                        <td class=constancia>
                            <a href="../cursos/evaluacion.php?idC='.$idcursoseleccionado.'" id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">

                            Realizar Examen<br>
                        </a></td></tr>
                       <tr><td colspan=3 class=celdasvacias></td></tr>'; 
                      
                      
                    }
               
              
    
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
        }
        else{
            $constancia="";
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
        $constancia="";
        $mensaje='';

    }


       
        echo $constancia;
        echo $examen;
        echo $mensaje;
    
    ?>
    