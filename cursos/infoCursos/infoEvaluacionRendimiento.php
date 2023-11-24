<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        
        <title>Evaluación del rendimiento</title>
    </head>
    <body>
    <header id="encabezado">
    	<!--<div id="logotipo">
    	<img src="img/logovproductiva2.png" id="logo"> 
    	</div>-->
    	<!--<h1 id="tituloprincipal">Valuacion Productiva</h1>-->
    	<ul id="menu">
            <li class="logo"><img src="../img/logob.png" id="logo"></li>
            <li class="menus"></li>
    	    <li class="menus"><a href="../../alumno/index.php" class="enlacemenu">Mi perfil</a></li>
    	    <li class="menus"><a href="../../alumno/cursos.php" class="enlacemenu">Catálogo de Cursos</a></li>
            <li class="menus"><a href="../../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>

    <div id="fondotemario">
    
    <img class="tituloscursos" src="../img/NameCurso.png" >
    <table  id=tablarecursos>
        <tr>
            <td><img src="img/etica.jpg" ></td>
            <td class="celdatop">
            <table id=tablacontenido>
                <tr> <td id=filatitulo colspan="2"> <h2>Contenido</h2> </td></tr>
                
                <!--<tr> <td id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar tus actividades diarias.</h4> </td></tr>  -->  
    
                <?php
                 require("../../dev/conectar.php");
                $resultado = mysqli_query($conn,"SELECT c.cNombreCurso, m.cNombreModulo FROM curso c
                INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=2");
                while ($consulta = mysqli_fetch_array($resultado))
                {
                    echo '<tr> <td class=sangriavinetas><img src="img/vineta.png" style= "width: 0.5em;"></td> <td class=titulostemario2>'.$consulta['cNombreModulo'] .'</td></tr>
                    <tr><td></td><td class=celdasvacias2></td></tr>';

                }
                ?>
                
            </table> 
            </td>
        </tr>
    </table>
    </body>
</html> 