<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        
        <title>Organización del tiempo</title>
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
    	    <li id="miperfilfondo" class="menus"><a href="../../alumno/cursos.php" id="miperfil" class="enlacemenu">Catálogo de Cursos</a></li>
            <li class="menus"><a href="../../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>

    <div id="fondotemario">
    
    <!--<img class="tituloscursos" src="../img/etica.png" >-->
    <h1 id="tituloprincipal">ORGANIZACIÓN DEL TIEMPO Y PRODUCTIVIDAD ASOCIADA</h1>
    <table  id=tablarecursos>
        <tr>
            <td id="imagentemario"><img src="img/organizacion.png" id="imagentemar"></td>
            <td class="celdatop">
            <table id=tablacontenido>
                <tr> <td></td><td> <h3 id="descricpiontemario">
                Este curso está diseñado para dotarte de habilidades para gestionar eficazmente tu tiempo y aumentar tu productividad en todos los aspectos de la vida, tanto personal como profesional, a través de una combinación de teoría y práctica. Explorarás métodos y herramientas probadas para optimizar la gestión del tiempo y lograr resultados más eficientes.
                </br>"Aprende a ser más productivo sin perder el equilibrio.”  
                </h3> </td></tr>
                <tr> <td></td><td id=filatitulo> <h2>TEMARIO</h2> </td></tr>
                
                <!--<tr> <td id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar tus actividades diarias.</h4> </td></tr>  -->
                <?php
                 require("../../dev/conectar.php");
                $resultado = mysqli_query($conn,"SELECT c.cNombreCurso, m.cNombreModulo FROM curso c
                INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=4");
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
