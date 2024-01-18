<?php
    require("../dev/conectar.php");
    include "../panel/func/profile.php";
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Productividad Laboral</title>
    </head>
    <body>
    <header id="encabezado">
    	<!--<div id="logotipo">
    	<img src="img/logovproductiva2.png" id="logo"> 
    	</div>-->
    	<!--<h1 id="tituloprincipal">Valuacion Productiva</h1>-->
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
        <tr> <td colspan=3 id=filatitulo> <h2>Código de ética en la empresa</h2> </td></tr>    
        <!--<tr> <td colspan=3 id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar al máximo tus labores diarias.</h4> </td></tr> -->  
    
        <?php

$resultado = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
    INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
    INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
    INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
    INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
    WHERE c.iIdCurso=1 and u.iIdUsuario=" . $_SESSION["id"]);

$resultadoVisto = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
INNER JOIN visto v ON r.iIdRecurso = v.idRecurso
WHERE c.iIdCurso=1 and v.idAlumno=" . $_SESSION["id"]." GROUP BY iIdRecurso");

$existeexamen = mysqli_query($conn,"SELECT count(*) as existe FROM resuelto");


$numMudulo= mysqli_num_rows($resultado);
$numVisto = mysqli_num_rows($resultadoVisto);
$numexiste =mysqli_num_rows($existeexamen);




while ($consulta = mysqli_fetch_array($resultado)) {

    $check = mysqli_query($conn, "SELECT COUNT(*) as num FROM visto
    WHERE idRecurso= " . $consulta['iIdRecurso'] . " and idAlumno=" . $_SESSION["id"] . " and estatus=1");
    $info = mysqli_fetch_array($check);

    if ($info['num'] > 0) {
        $visto = '<td class=temario><img src="img/checkcompleto.png" style="width: 2.4em; margin-left: 0.6em;"></td>';
    } else {
        $visto = '<td class=temario><img src="img/checkvacio.png" style="width: 2.4em;"></td>';
    }

    echo 
    '<tr> 
        <td class=iconorecursocelda> '.$visto.'</td> 
        <td class=fondotemario>
            <a class=titulostemario  href="'.$consulta['cRuta'].'" id="'.$consulta['iIdRecurso'].'" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">'.$consulta['cNombreModulo'].'
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

}
$examen ="";
$masDedos='';
if($numMudulo==$numVisto){
    while ($dataExamen = mysqli_fetch_array($existeexamen)) { 
        if ( $dataExamen['existe']<1){

            $constancia="";
            $examen='
            <tr>
             <td></td>
<<<<<<< HEAD
=======
             <td></td>
>>>>>>> 5645901 (super)
                <td class=constancia>
                    <a href="../cursos/evaluacion.php?idC=1" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                    Realizar Examen<br>
                    </a>
                </td>
            </tr>
            <tr><td     colspan=3 class=celdasvacias></td></tr>';

        }else
        {
            $resultadoExamen=mysqli_query($conn,"SELECT *  FROM  resuelto where idcurso=1  and idusuario=" . $_SESSION["id"] );
            $numencuesta =mysqli_num_rows($resultadoExamen);
                $errores=0;
               
            while ($intentos = mysqli_fetch_array($resultadoExamen)) { 
                if ($intentos['correcta']==0 ){
                    $errores = $errores + 1;
                    $correcta=0;
                    $resres=$intentos['correcta'];
                }elseif  ($intentos['correcta']==1 ){
                    $correcta=1;
                    $errores=0;
                }

            }
                if (  $correcta==1 ){
                    $examen="Bien hecho";
                    $constancia='<tr>
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
                 </tr>';   
            
                
                  
                }else  if ($errores>=3)
                {   
                    $constancia="";
                    $examen="Restear";
                   /*  $constancia='<tr>
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
                 </tr>';  */
            
                }else if ($errores<3){
                    $constancia="";
                    $examen='<tr><td></td><td class=constancia><a href="../cursos/evaluacion.php?idC=1" id="texconstancia"class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Realizar Examen<br></a></td></tr>
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
echo $examen;
echo $constancia;
echo $mensaje;

?>

    
    </table>
  </div>
    </body>
</html>


