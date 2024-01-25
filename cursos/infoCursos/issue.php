<?php session_start(); ?>

<?php $idc=$_GET["idc"]; ?>
<?php $namec=$_GET["namec"]; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        
        <title>Código de ética</title>
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
    <?php include("../../dev/conectar.php"); ?>    
   <?php
    $resultado = mysqli_query($conn, "SELECT * FROM curso where iIdCurso=".$idc);
    while ($consulta = mysqli_fetch_array($resultado)):
   ?>

    <h1 id="tituloprincipal"><?php echo $namec?></h1>
    <table  id=tablarecursos>
        <tr>
            <td id="imagentemario"><img src="<?php echo str_replace('../alumno/','',$consulta["ricono"]) ?>" id="imagentemar" alt="<?php echo str_replace('../alumno/','',$consulta["ricono"]) ?>"></td>
            <td class="celdatop">
            <table id=tablacontenido>
                <tr> <td></td><td> <h3 id="descricpiontemario">
                <?php echo $consulta["cDescripcion"]?>
                 
                </h3> </td></tr>
                <tr> <td></td><td id=filatitulo> <h2>TEMARIO</h2> </td></tr>
                
                <!--<tr> <td id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar tus actividades diarias.</h4> </td></tr>  -->
                <?php
                
                $resultado = mysqli_query($conn,"SELECT c.cNombreCurso, m.cNombreModulo FROM curso c
                INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=1");
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
                    <?php 
                    $inscrito = mysqli_query($conn, "SELECT c.iIdCurso , i.fkiIdUsuario
                    FROM curso c
                    INNER JOIN inscripcion i ON i.fkiIdeCurso = c.iIdCurso
                    INNER JOIN usuarios u ON u.iIdUsuario = i.fkiIdUsuario
                    WHERE i.finalizado !=2
                    AND c.iIdCurso=".$idc. 
                    " AND i.fkiIdUsuario=" . $_SESSION["id"]);

                    $arreglo= array();
                        while ($infoinscrito = mysqli_fetch_array($inscrito)) {
                        
                        array_push($arreglo, $infoinscrito['iIdCurso']);
                        
                        
                        } 
    $link ='
    <div class="btnInscribirse">
        <a href="../../alumno/inscripcion.php?curso='.$idc.'&usuario='.$_SESSION["id"].'" 
        class="btnInscribirsebtn"
        class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
        INSCRIBIRSE</a>
    </div>';
    $i=0;
    while($i<count($arreglo)){

        if ($arreglo[$i]== $idc){
            $link ='<div class="btnInscribirse">
            <a href="#" id="" class="btnInscribirsebtn" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
            INSCRITO
            </a>
            </div>';  
            $i=count($arreglo);
        }
        else{
        $link =
        '<div class="btnInscribirse" class="btnInscribirsebtn">
            <a href="../../alumno/inscripcion.php?curso='.$idc.'&usuario='.$_SESSION["id"].'" 
             class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                INSCRIBIRSE
            </a>
        </div>';
        } 
        $i++;       
    }

echo $link;
                   
                    ?>
                   
                    </td>
                </tr>       
                
           
            </table> 
            </td>
        </tr>
    </table>
    <?php
    endwhile
    ?>
                
    </body>
</html> 
