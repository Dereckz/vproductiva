<?php


$idcurso=1;
<<<<<<< HEAD

=======
>>>>>>> 5645901 (super)
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
    $link ='
    <div class="btnInscribirse">
        <a href="../../alumno/inscripcion.php?curso='.$idcurso.'&usuario='.$_SESSION["id"].'" 
        class="btnInscribirsebtn"
        class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
        INSCRIBIRSE</a>
    </div>';
    $i=0;
    while($i<count($arreglo)){

        if ($arreglo[$i]== $idcurso){
            $link ='<div class="btnInscribirse">
            <a href="#" id="" class="btnInscribirsebtn" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">INSCRITO</a></div>';  
            $i=count($arreglo);
        }
        else{
        $link ='<div class="btnInscribirse" class="btnInscribirsebtn">
        <a href="../../alumno/inscripcion.php?curso='.$idcurso.'&usuario='.$_SESSION["id"].'"  class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">INSCRIBIRSE</a></div>';
        } 
        $i++;       
    }

echo $link;

?>