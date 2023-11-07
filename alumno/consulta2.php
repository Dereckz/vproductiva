<?php
session_start();


function infoCurso2($idarea )
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

    $resultado = mysqli_query($conn, "SELECT * FROM curso where fkidAreaCurso=".$idarea);
    //$datos = mysqli_fetch_all($resultado);
    $info = "";
    $cur = "";
   
   
   

   while ($consulta = mysqli_fetch_array($resultado)) {
    $ruta=$consulta["ruta"];

       //validar si esta inscrito en el curso
       $link ='<a href="inscripcion.php?curso='. $consulta["iIdCurso"] .'&usuario='.$_SESSION["id"].'" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;Inscribirse</a>';
       $i=0;
       while($i<count($arreglo)){
           if ($arreglo[$i]== $consulta['iIdCurso']){
               $link ='<a href="#" id="" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inscrito</a>';  
               $i=count($arreglo);
           }
           else{
           $link ='<a href="inscripcion.php?curso='. $consulta["iIdCurso"] .'&usuario='.$_SESSION["id"].'"  class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;&nbsp;Inscribirse</a>';
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

   <script>

   document.getElementById("8").onclick = function() {
     if (confirm("Favor de confirmar la inscripción al curso")) {

       idfCurso = "8";
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

   document.getElementById("9").onclick = function() {
     if (confirm("Favor de confirmar la inscripción al curso")) {

       idfCurso = "9";
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

   document.getElementById("10").onclick = function() {
     if (confirm("Favor de confirmar la inscripción al curso")) {

       idfCurso = "10";
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

   document.getElementById("11").onclick = function() {
     if (confirm("Favor de confirmar la inscripción al curso")) {

       idfCurso = "11";
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

    echo $info;

   }
   
 
}
?>