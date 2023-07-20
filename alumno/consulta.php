<?php

// Función para obterner la información del alumno datos personales.
function informacion()
{
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE iIdUsuario=2");
    while ($consulta = mysqli_fetch_array($resultado)) {

        echo '<h3 class="u-text u-text-2 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;">' . $consulta['cNombreLargo'] . '</h3>
        <table class="u-text u-text-3 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" style="will-change: transform, opacity; animation-duration: 1500ms;">
        <tr><td>Nombre: </td><td>' . $consulta['cNombre'] . '</td></tr>
        <tr><td>Apellido paterno: </td><td>' . $consulta['cApellidoP'] . '</td></tr>
        <tr><td>Apellido materno: </td><td>' . $consulta['cApellidoM'] . '</td></tr>
        </table>
        ';
    }
}

function miCurso()
{

    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT c.cNombreCurso, c.ruta, c.ricono FROM inscripcion i
    INNER JOIN usuarios u ON I.fkiIdUsuario = U.iIdUsuario
    INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
    WHERE i.fkiIdUsuario=2");
    while ($consulta = mysqli_fetch_array($resultado)) {
        echo '
         <div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-3-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-video-cover u-white u-list-item-4 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4"><span class="u-custom-item u-file-icon u-icon u-text-palette-3-base u-icon-4 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="' . $consulta['ricono'] . '" alt=""></span>
              <h4 class="u-text u-text-8"> ' . $consulta['cNombreCurso'] . '</h4>
              <a href="' . $consulta['ruta'] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-3-base u-text-body-color u-text-hover-palette-3-base u-top-left-radius-0 u-top-right-radius-0 u-btn-5">Entrar</a>
            </div>
          </div>
          '
        ;
    }
}

function curso()
{
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM curso");
    //$datos = mysqli_fetch_all($resultado);
    $info="";
    $cur1="";
    $cur2="";
    $cur3="";
    $cur4="";
    $contador=1;

    while ($consulta = mysqli_fetch_array($resultado)) {
         $info='<div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-2-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-custom-item u-file-icon u-icon u-text-palette-2-base u-icon-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="' . $consulta['ricono'] . '" alt=""></span>
        <h4 class="u-text u-text-5">' . $consulta['cNombreCurso'] . '</h4> <a href="' . $consulta['ruta'] . '" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Ver curso</a>
        <a href="#" id="'.$consulta["iIdCurso"].'" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Inscribirse</a>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>

    document.getElementById("1").onclick = function() {
      if (confirm("Favor de confirmar la inscripción al curso")) {
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "1";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "2";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "3";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "4";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "5";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "6";
        idfUsuario = "2";

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
        //var urlOriginal = document.getElementById("btnc").href;
        //var urlNuevo = "inscripcion";
        //document.getElementById("btnc").setAttribute("href", urlNuevo);

        idfCurso = "7";
        idfUsuario = "2";

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

    if($contador ==1 ){
       $cur1 = $info;
    } elseif ($contador ==2){
      $cur2 = $info;
    }
    elseif ($contador ==3){
      $cur3 = $info;
    }
    elseif ($contador ==4){
      $cur4 = $info;
    }
    elseif ($contador ==5){
      $cur5 = $info;
    }
    elseif ($contador ==6){
      $cur6 = $info;
    }
    elseif ($contador ==7){
      $cur7 = $info;
    }

    $contador= $contador+1;
    
    }
    echo $cur1;
    echo $cur2;
    echo $cur3;
    echo $cur4;
    echo $cur5;
    echo $cur6;
    echo $cur7;
 // foreach ($datos as $valor){
   
  //}

}
