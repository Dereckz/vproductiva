
<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        
        <title>Equidad y género</title>
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
    <h1 id="tituloprincipal">EQUIDAD Y GÉNERO</h1>
    <table  id=tablarecursos>
        <tr>
            <td id="imagentemario"><img src="img/equidad.png" id="imagentemar"></td>
            <td class="celdatop">
            <table id=tablacontenido>
                <tr> <td></td><td> <h3 id="descricpiontemario">
                En este curso tendrás conciencia y comprensión de las cuestiones relacionadas con la equidad y género en tu organización, así como en tu vida personal, a tener empatía y sensibilidad, desarrollarás habilidades de comunicación, apertura al cambio en la cultura organizacional, obtener mayor compromiso, acción y defensa. En un nivel más amplio, el impacto de tomar un curso de equidad de género puede contribuir a un cambio social positivo, al fomentar una sociedad más justa y equitativa para todas las personas.
                </br>"El cambio comienza con la educación y la acción."
                </h3> </td></tr>
                <tr> <td></td><td id=filatitulo> <h2>TEMARIO</h2> </td></tr>
                
                <!--<tr> <td id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar tus actividades diarias.</h4> </td></tr>  -->
                <?php
                 require("../../dev/conectar.php");
                $resultado = mysqli_query($conn,"SELECT c.cNombreCurso, m.cNombreModulo FROM curso c
                INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=18");
                $modulo=0;
                while ($consulta = mysqli_fetch_array($resultado))
                {
                    $modulo=$modulo+1;
                    echo '<tr> 
                            <td class=sangriavinetas></td>
                             <td class=titulostemario2><span id="nmodulo">Módulo '.$modulo. '.</span> </br> '.$consulta['cNombreModulo'] .'</td>
                          </tr>
                         <tr>
                            <td></td>
                            <td class=celdasvacias2>
                            </td>
                         </tr>';
                }
                
                ?>  
                <tr> 
                    <td>
                    </td>
                    <td >
                    <?php include('..\funct\functiones.php'); 
                    ?>
                   
                    </td>
                </tr>       
                
           
            </table> 
            </td>
        </tr>
    </table>
                
    </body>
</html> 
