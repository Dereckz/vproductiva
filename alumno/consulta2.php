<?php
session_start();


function infoCurso2($idarea )
{
    
    require("../dev/conectar.php");
    //include "sesiontime.php";
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
       $link =
       '<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">
            <a href="inscripcion.php?curso='. $consulta["iIdCurso"] .'&usuario='.$_SESSION["id"].'" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                Inscribirse
            </a>
        </div>';
       $i=0;
       while($i<count($arreglo)){
           if ($arreglo[$i]== $consulta['iIdCurso']){
               $link =
               '<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">        
                        <a href="#" id=""  class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                        Inscrito
                        </a>
               </div>';  
               $i=count($arreglo);
           }
           else{
           $link ='<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">
           <a href="inscripcion.php?curso='. $consulta["iIdCurso"] .'&usuario='.$_SESSION["id"].'"  class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
           Inscribirse
           </a></div>';
           } 
           $i++;       
       }

       $info =
       '<div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-2-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1">
            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
            <span class="u-custom-item u-file-icon u-icon u-text-palette-2-base u-icon-1 "><img src="' . $consulta['ricono'] . '" alt=""></span>
            <h4 class="u-text u-text-5">' . $consulta['cNombreCurso'] . '</h4> 
                <div style="margin: 0em 1em; padding-left: 1em; padding-bottom: 0.5em; margin-top: 2em;"> 
                    <a href="..\cursos\infoCursos\issue.php?namec='. $consulta['cNombreCurso']  .'&idc='. $consulta["iIdCurso"] .'"
                            class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                                    Ver temario del curso<br>
                    </a>
                </div>
       '.$link.'
       
     </div>
   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

   <script>

   document.getElementById("'. $consulta['iIdCurso'] .'").onclick = function() {
     if (confirm("Favor de confirmar la inscripción al curso")) {

       idfCurso = "'. $consulta['iIdCurso'] .'";
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

function incribirse($idcurso){
    
    require("../../dev/conectar.php");
    $inscrito = mysqli_query($conn, "SELECT c.iIdCurso 
    FROM curso c
    INNER JOIN inscripcion i ON i.fkiIdeCurso = c.iIdCurso
    INNER JOIN usuarios u ON u.iIdUsuario = i.fkiIdUsuario
    WHERE i.finalizado !=2 AND i.fkiIdUsuario=" . $_SESSION["id"]);


$arreglo= array();
while ($infoinscrito = mysqli_fetch_array($inscrito)) {

array_push($arreglo, $infoinscrito['iIdCurso']);


}


       //validar si esta inscrito en el curso
       $link ='<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">
       <a href="inscripcion.php? curso='.$idcurso.'&usuario='.$_SESSION["id"].'" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Inscribirse</a></div>';
       $i=0;
       while($i<count($arreglo)){
           if ($arreglo[$i]== $idcurso){
               $link ='<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">
               <a href="#" id="" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
               Inscrito
               </a>
               </div>';  
               $i=count($arreglo);
           }
           else{
           $link ='<div style="background-color: #00b0ff; border-radius: 25em; color: white; padding: 0em 1em; margin: 0em 1em;">
           <a href="inscripcion.php?curso='. $idcurso .'&usuario='.$_SESSION["id"].'"  class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Inscribirse</a></div>';
           } 
           $i++;       
       }
}

