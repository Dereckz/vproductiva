<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        
        <title>Finanzas</title>
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
    	    <li class="menus"><a href="../alumno/index.php" class="enlacemenu">Mi perfil</a></li>
    	    <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">Catalogo de Cursos</a></li>
            <li class="menus"><a href="../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>
  <div>
   
    
    <img class="tituloscursos" src="img/Finanzas.png" >
    <table id=tablarecursos>

        <?php
    require("../dev/conectar.php");
    include "../panel/func/profile.php";
if (!isset($_SESSION)) {
    session_start();
}
    $resultado = mysqli_query($conn,"SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
    INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
    INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso 
  INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
  INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
  WHERE c.iIdCurso=7 and u.iIdUsuario=".$_SESSION["id"]);

$resultadoVisto = mysqli_query($conn, "SELECT r.iIdRecurso,c.cNombreCurso, m.cNombreModulo,r.cRuta FROM usuarios u
INNER JOIN inscripcion i ON u.iIdUsuario = i.fkiIdUsuario
  INNER JOIN curso c ON i.fkiIdeCurso = c.iIdCurso
INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso
INNER JOIN recurso r ON  m.iIdModulo = r.fkiIdModulo
INNER JOIN visto v ON r.iIdRecurso = v.idRecurso
WHERE c.iIdCurso=7 and v.idAlumno=" . $_SESSION["id"]." GROUP BY iIdRecurso");

$numMudulo= mysqli_num_rows($resultado);
$numVisto = mysqli_num_rows($resultadoVisto);

while ($consulta = mysqli_fetch_array($resultado))
{
 
$check = mysqli_query($conn,"SELECT COUNT(*) as num FROM visto
WHERE idRecurso= ".$consulta['iIdRecurso']." and idAlumno=".$_SESSION["id"]." and estatus=1");
$info =mysqli_fetch_array($check);

     if($info['num'] > 0){
        $visto= '<td class=temario><img src="img/checkcompleto.png" style="width: 2.4em; margin-left: 0.6em;"></td>';
     }
     else{
        $visto='<td class=temario><img src="img/checkvacio.png" style="width: 2.4em;"></td>';
     }

     echo '<tr> <td class=iconorecursocelda><img class=iconorecurso src="img/recursovideo.png"></td> <td class=fondotemario><a class=titulostemario  href="'.$consulta['cRuta'].'" id="'.$consulta['iIdRecurso'].'" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">&nbsp;&nbsp;&nbsp;'.$consulta['cNombreModulo'].'</a></td> '.$visto.' </tr>
        <tr><td colspan=3 class=celdasvacias></td></tr>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
    // se insertara el recurso y alumno mas estatus.
    document.getElementById("'.$consulta['iIdRecurso'].'").onclick = function(){

        idRecurso = "'.$consulta['iIdRecurso'].'";
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
$masDedos='';
if($numMudulo==$numVisto){
    $constancia='<tr><td></td><td class=constancia><a href="../alumno/reconocimiento.php?curso=FINANZAS&idCurso=6" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Obtén tu constancia<br></a></td></tr>
                 <tr><td colspan=3 class=celdasvacias></td></tr>';

    $consCur = mysqli_query($conn, "SELECT * FROM  inscripcion WHERE fkiIdeCurso = 7 and fkiIdUsuario =".$_SESSION["id"]);
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
    $mensaje= '<tr><td></td><td class=notacurso>Nota: Este curso ya fue tomado anteriormente.</td></tr>';
}
else{
    $mensaje='';
}
echo $constancia;
echo $mensaje;
?>
    
    </table>
  </div>
    </body>
</html>


