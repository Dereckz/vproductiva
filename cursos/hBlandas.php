<?php
    include("..\dev\conectar.php");
    include "../panel/func/profile.php";
if (!isset($_SESSION)) {
    session_start();
}
    $resultado = mysqli_query($conn,"SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
    INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
      INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso 
  INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
  INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
  WHERE c.iIdCurso=2 and u.iIdUsuario=".$_SESSION["id"]);
while ($consulta = mysqli_fetch_array($resultado))
{
 
$check = mysqli_query($conn,"SELECT COUNT(*) as num FROM visto
WHERE idRecurso= ".$consulta['iIdRecurso']." and idAlumno=".$_SESSION["id"]." and estatus=1");
$info =mysqli_fetch_array($check);

     if($info['num'] > 0){
        $visto= '<input type="checkbox" name="cb-html5" checked disabled="disabled">';
     }
     else{
        $visto='';
     }

    echo $visto.'<a href="'.$consulta['cRuta'].'" id="'.$consulta['iIdRecurso'].'" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">'.$consulta['cNombreModulo'].'<br></a>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
    // se insertara el recurso y alumno mas estatus.
    document.getElementById("'.$consulta['iIdRecurso'].'").onclick = function(){

        idRecurso = "'.$consulta['iIdRecurso'].'";
        idAlumno = "' . $_SESSION["id"] . '";
        alert("Hey me tocaste");

       //Convertimos las variables de javascript en variables de PHP
        $( document ).ready(function() {
    // Definimos las variables de javascrpt
        var recurso = idRecurso;
        var alumno = idAlumno;
    // Ejecutamos AJAX
    $.post("visto.php",{"recurso":recurso,"alumno": alumno},function(respuesta){
            alert(respuesta);
           // location.reload();
        });
        });
    }

    </script>
    
    ';

    
}
?>