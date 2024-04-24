
<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="style-rs.css">
        <link rel="stylesheet" href="style2.css">
        <!--<link rel="stylesheet" href="../../homecursos/nicepage.css" media="screen" class="u-static-style">
        <link rel="stylesheet" href="../../homecursos/nicepage(1).css" media="screen">
        <link rel="stylesheet" href="../../styles/stylemenu.css">
        <link rel="stylesheet" href="../../styles/style-rs.css">
        <link rel="stylesheet" href="../../homecursos/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        -->
        <title>Código de ética</title>
    </head>
    <body>
    <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="../index.html">

           <img src="../../img/logob.png" id="logoinicio" alt="VProductiva Logo">
           <!-- <h1>Valuación Productiva</h1>-->
          </a>
        </div>
        <div class="navbar" class="nav-list">
          <div class="menu-toggle">&#9776;</div>
          <ul class="menu">
            <li class="fondoinicio"><a href="../../index.html" data-after="Home" class="headermenucursos" >INICIO</a></li>
            <!-- <li><a href="#services" data-after="Service">Servicios</a></li>-->
            <li class="fondoinicio" id="fondoinicio" ><a href="../../indexcursos.html" data-after="Projects" class="headermenucursos" style="color: white;">CURSOS</a></li>
            <li class="fondoinicio"><a href="../../indexacerca.html" data-after="About" class="headermenucursos">NOSOTROS</a></li>
            <li class="fondoinicio"><a href="../../indexcontacto.html" data-after="Contact" class="headermenucursos">CONTACTO</a></li>
            <!--<li><a href="account/register.html" data-after="Login">Login</a></li> -->
            <li class="fondoinicio"><a href="../../account/login.php" data-after="Login" class="headermenucursos" id="menuingresar">INGRESAR</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>  
  <script src="../styles/menu.js"></script>
  <!-- End Header -->

    <div id="fondotemario">
    
    <!--<img class="tituloscursos" src="../img/etica.png" >-->
    <h1 id="tituloprincipal">CÓDIGO DE ÉTICA EN LA EMPRESA</h1>
    <table  id=tablarecursos>
        <tr>
            <td id="imagentemario"><img src="img/etica.png" id="imagentemar"></td>
            <td class="celdatop">
            <table id=tablacontenido>
                <tr> <td></td><td> <h3 id="descricpiontemario">
                    En un mundo empresarial que valora la integridad y la ética, nuestro curso de Código de Ética en las Empresas se rige como la guía esencial para construir una cultura organizacional sólida y ética. Este curso está diseñado para líderes, empresarios y profesionales comprometidos con la construcción de empresas que no solo prosperen financieramente, sino que también sean respetadas y admiradas por su ética y responsabilidad social.  
                </br>"La ética no solo mejora tu empresa, mejora tu legado.”  
                </h3> </td></tr>
                <tr> <td></td><td id=filatitulo> <h2>TEMARIO</h2> </td></tr>
                
                <!--<tr> <td id=filainstrucciones> <h4> En este curso aprenderas las habilidades necesarias para optimizar tus actividades diarias.</h4> </td></tr>  -->
                <?php
                 require("../../dev/conectar.php");
                $resultado = mysqli_query($conn,"SELECT c.iIdCurso,c.cNombreCurso, m.cNombreModulo FROM curso c
                INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=1");
                $modulo=0;
                $idcurso="";
                while ($consulta = mysqli_fetch_array($resultado))
                {
                    $modulo=$modulo+1;
                    $idcurso=$consulta["iIdCurso"];
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
                    <!-- <-?php include('..\funct\btninscripcion.php?idc='.$idcurso); 
                    ?>-->
                    <div class="btnInscribirse">
                    <a href="../../account/login.php" 
                    class="btnInscribirsebtn" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                    INSCRIBIRSE</a>
                    </div>
                   
                    </td>
                </tr>       
                
           
            </table> 
            </td>
        </tr>
    </table>
    <!-- Start Footer -->
  <section id="footer">
    <div id="divfootercursos">
      <div id="logopiecursos">
        <img src="../../img/logob2.png" id="imglogopie">
      </div>
      <div id="texto1piecursos">
        <p id="parrafodireccion" class="parrafosfooter">Dirección: Av. Paseo de las Palmas 830, Int. 102-1.
          Lomas de Chapultepec V Sección. Miguel Hidalgo.
          Ciudad de México. C.P. 11000. México.</p>
          <p class="parrafosfooter">Teléfono: 55-104-680-95</p>
          <p class="parrafosfooter">Correo electrónico: valuacionproductiva9@gmail.com</p>
      </div>
      <div id="texto2pie">
        <p class="parrafosfooter"><a href="indexterminos.html" class="parrafosfooter" id="terminosycon">Terminos y Condiciones</a></p>
          <p id="parrafoter" class="parrafosfooter">© 2024 VALUACIÓN PRODUCTIVA Y
            COMPETITIVA EN MATERIA LABORAL A.C.</p>
      </div>
    </div>
  </section>
  <!-- End Footer  -->
                
    </body>
</html> 
