<?php
include "../panel/func/profile.php";
if (!isset($_SESSION)) {
    session_start();
}

// Función para obterner la información de los datos personales del alumno.
function informacion()
{
    require("../dev/conectar.php");

    // para saber los cursos terminados
    $final=0;
    for ($i=1; $i<=7; $i++){
        

            $terminado = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta 
            FROM usuarios u
            INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
            INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
            INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
            INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
            WHERE c.iIdCurso=".$i." and u.iIdUsuario=" . $_SESSION["id"]);
        
            $nterminado = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta 
            FROM usuarios u
            INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
            INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
            INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
            INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
            INNER JOIN visto v ON r.iIdRecurso = v.idRecurso
            WHERE c.iIdCurso=".$i." and v.idAlumno=" . $_SESSION["id"]." GROUP BY iIdRecurso");
             $numMudulo= mysqli_num_rows($terminado);
             $numTerminado = mysqli_num_rows($nterminado);
      


   
        if ($numMudulo==$numTerminado && $numMudulo>0 && $numTerminado>0){
            $final=$final+1;
        }
    }
   
        $cInscrito= mysqli_query($conn,"SELECT * FROM curso c
        INNER JOIN inscripcion i ON i.fkiIdeCurso = c.iIdCurso
        INNER JOIN usuarios u ON u.iIdUsuario = i.fkiIdUsuario
        WHERE i.finalizado !=2 AND i.fkiIdUsuario=". $_SESSION["id"]);
        
        $nInscrito= mysqli_num_rows($cInscrito);
        
       
   
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE iIdUsuario=" . $_SESSION["id"]);
    while ($consulta = mysqli_fetch_array($resultado)) {

        echo '
        
                    <table class="u-text u-text-3 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;">
                    <tr>        
                    <form action="subir.php" method="POST" enctype="multipart/form-data">
                    <td rowspan=6 style="text-align: center; font-size: 0.8em;"><img id=fotoperfil src="'.$consulta['cProfile'].'" width="42%"><div id="div_file"><input type="file" name="file1" id="file1"> 
                    <p id="texto">
                    Subir foto</p>
                    </div>
                    <br>
                    <button type="submit">Guardar</button>
                    </td>
                    <td width="65%" colspan=2><h3 class="u-text u-text-2 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;">' . $consulta['cNombreLargo'] . '</h3></td>
                    </tr>

                    </form>
                    <tr><td colspan=2><p class="u-text u-text-3 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;"> Correo: ' . $consulta['cCorreo'] . '</p></td></tr>
                    <tr><td width="3%"><img src="img/docusin.png" width="90%"></td><td><p class="u-text u-text-3 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;"> Cursos Inscritos: '.$nInscrito.'</p></td></tr>
                    <tr><td width="3%"><img src="img/docu.png" width="90%"></td><td><p class="u-text u-text-3 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;">Cursos Finalizados: '.$final.'</p></td></tr>    
                    </table>
                    ';


    }

}

function miCurso()
{

    require("../dev/conectar.php");
    $info = "";
    $cur1 = "";
    $cur2 = "";
    $cur3 = "";
    $cur4 = "";
    $cur5 = "";
    $cur6 = "";
    $cur7 = "";
    $contador = 1;

    
        $resultado = mysqli_query($conn, 
        "SELECT c.iIdCurso, c.cNombreCurso, c.ruta, c.ricono 
        FROM curso c
        INNER JOIN inscripcion i ON i.fkiIdeCurso = c.iIdCurso
        INNER JOIN usuarios u ON u.iIdUsuario = i.fkiIdUsuario
        WHERE i.finalizado !=2 AND i.fkiIdUsuario=" . $_SESSION["id"]);
       
       while ($consulta = mysqli_fetch_array($resultado)) {
        $info = '
         <div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-3-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-video-cover u-white u-list-item-4 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4"><span class="u-custom-item u-file-icon u-icon u-text-palette-3-base u-icon-4 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="' . $consulta['ricono'] . '" alt=""></span>
              <h4 class="u-text u-text-8"> ' . $consulta['cNombreCurso'] . '</h4>
              <a href="' . $consulta['ruta'] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-3-base u-text-body-color u-text-hover-palette-3-base u-top-left-radius-0 u-top-right-radius-0 u-btn-5">Entrar</a>
              <a href="#" id="' . $consulta["iIdCurso"] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-3-base u-text-body-color u-text-hover-palette-3-base u-top-left-radius-0 u-top-right-radius-0 u-btn-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eliminar</a>
            </div>
          </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>

    document.getElementById("1").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "1";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }
    </script>

    <script>

    document.getElementById("2").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "2";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("3").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "3";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("4").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "4";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("5").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "5";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("6").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "6";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }

    }

    </script>

    <script>

    document.getElementById("7").onclick = function() {
      if (confirm("Favor de confirmar que desea salir del curso")) {

        idfCurso = "7";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("salirCurso.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>
          ';

        if ($contador == 1) {
            $cur1 = $info;
        } elseif ($contador == 2) {
            $cur2 = $info;
        } elseif ($contador == 3) {
            $cur3 = $info;
        } elseif ($contador == 4) {
            $cur4 = $info;
        } elseif ($contador == 5) {
            $cur5 = $info;
        } elseif ($contador == 6) {
            $cur6 = $info;
        } elseif ($contador == 7) {
            $cur7 = $info;
        }

        $contador = $contador + 1;
    }
  
   
   
    echo $cur1;
    echo $cur2;
    echo $cur3;
    echo $cur4;
    echo $cur5;
    echo $cur6;
    echo $cur7;

}

/*function curso()
{
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM curso");
    //$datos = mysqli_fetch_all($resultado);
    $info = "";
    $cur1 = "";
    $cur2 = "";
    $cur3 = "";
    $cur4 = "";
    $cur5 = "";
    $cur6 = "";
    $cur7 = "";
    $contador = 1;

    while ($consulta = mysqli_fetch_array($resultado)) {
        $info = '<div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-2-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-custom-item u-file-icon u-icon u-text-palette-2-base u-icon-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="' . $consulta['ricono'] . '" alt=""></span>
        <h4 class="u-text u-text-5">' . $consulta['cNombreCurso'] . '</h4> <a href="' . $consulta['ruta'] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Ver curso</a>
        <a href="#" id="' . $consulta["iIdCurso"] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Inscribirse</a>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>

    document.getElementById("1").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "1";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("2").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "2";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("3").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "3";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("4").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "4";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("5").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "5";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("6").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "6";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("7").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "7";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>
    ';

        if ($contador == 1) {
            $cur1 = $info;
        } elseif ($contador == 2) {
            $cur2 = $info;
        } elseif ($contador == 3) {
            $cur3 = $info;
        } elseif ($contador == 4) {
            $cur4 = $info;
        } elseif ($contador == 5) {
            $cur5 = $info;
        } elseif ($contador == 6) {
            $cur6 = $info;
        } elseif ($contador == 7) {
            $cur7 = $info;
        }

        $contador = $contador + 1;

    }
    echo $cur1;
    echo $cur2;
    echo $cur3;
    echo $cur4;
    echo $cur5;
    echo $cur6;
    echo $cur7;
}
*/
function infoCurso()
{
    require("../dev/conectar.php");
    
    
        $inscrito = mysqli_query($conn, "SELECT c.iIdCurso
        FROM curso c
        INNER JOIN inscripcion i ON i.fkiIdeCurso = c.iIdCurso
        INNER JOIN usuarios u ON u.iIdUsuario = i.fkiIdUsuario
        WHERE i.finalizado !=2 AND i.fkiIdUsuario=" . $_SESSION["id"]);

        //$ci=mysqli_num_rows($inscrito);
        // arreglo para recorrer los cursos donde el usuario ya esta inscrito
        $arreglo= array();
        while ($infoinscrito = mysqli_fetch_array($inscrito)) {
        
        array_push($arreglo, $infoinscrito['iIdCurso']);
        //echo $infoinscrito['iIdCurso'];
    }
 
   
 
   

    $resultado = mysqli_query($conn, "SELECT * FROM curso");
    //$datos = mysqli_fetch_all($resultado);
    $info = "";
    $cur1 = "";
    $cur2 = "";
    $cur3 = "";
    $cur4 = "";
    $cur5 = "";
    $cur6 = "";
    $cur7 = "";

    $ruta1="../cursos/infopLaboral.php";
    $ruta2="../cursos/infohBlandas.php";
    $ruta3="../cursos/infohDigitales.php";
    $ruta4="../cursos/infopsicologia.php";
    $ruta5="../cursos/infosahase.php";
    $ruta6="../cursos/infocJuridica.php";
    $ruta7="../cursos/infofinanzas.php";

    $contador = 1;

    while ($consulta = mysqli_fetch_array($resultado)) {
        if ($contador == 1) {
            $ruta = $ruta1;
        } elseif ($contador == 2) {
            $ruta = $ruta2;
        } elseif ($contador == 3) {
            $ruta = $ruta3;
        } elseif ($contador == 4) {
            $ruta = $ruta4;
        } elseif ($contador == 5) {
            $ruta = $ruta5;
        } elseif ($contador == 6) {
            $ruta = $ruta6;
        } elseif ($contador == 7) {
            $ruta = $ruta7;
        }

        //validar si esta inscrito en el curso
        $link ='<a href="#" id="' . $consulta["iIdCurso"] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;Inscribirse</a>';
        $i=0;
        while($i<count($arreglo)){
            if ($arreglo[$i]== $consulta['iIdCurso']){
                $link ='<a href="#" id="" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inscrito</a>';  
                $i=count($arreglo);
            }
            else{
            $link ='<a href="#" id="' . $consulta["iIdCurso"] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;Inscribirse</a>';
            } 
            $i++;       
        }

        $info = '<div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-2-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-custom-item u-file-icon u-icon u-text-palette-2-base u-icon-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="' . $consulta['ricono'] . '" alt=""></span>
        <h4 class="u-text u-text-5">' . $consulta['cNombreCurso'] . '</h4> <a href="' . $ruta. '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Ver curso</a>
        '.$link.'
        
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>

    document.getElementById("1").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "1";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("2").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "2";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("3").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "3";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("4").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "4";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("5").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "5";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("6").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "6";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>

    <script>

    document.getElementById("7").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {

        idfCurso = "7";
        idfUsuario = "' . $_SESSION["id"] . '";

    //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var curso = idfCurso;
        var alumn = idfUsuario;

    // Ejecutamos AJAX
    $.post("inscripcion.php",{"curso":curso,"usuario": alumn},function(respuesta){
            alert(respuesta);
            location.reload();
        });
        });

        } else {
        urlNuevo = "#";
    }
    }

    </script>
    ';

        if ($contador == 1) {
            $cur1 = $info;
        } elseif ($contador == 2) {
            $cur2 = $info;
        } elseif ($contador == 3) {
            $cur3 = $info;
        } elseif ($contador == 4) {
            $cur4 = $info;
        } elseif ($contador == 5) {
            $cur5 = $info;
        } elseif ($contador == 6) {
            $cur6 = $info;
        } elseif ($contador == 7) {
            $cur7 = $info;
        }

        $contador = $contador + 1;

    }
    echo $cur1;
    echo $cur2;
    echo $cur3;
    echo $cur4;
    echo $cur5;
    echo $cur6;
    echo $cur7;
}
