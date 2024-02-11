

<meta charset='utf-8'>
<?php  session_start();?>
<!DOCTYPE html>
<link href="../img/LOGOVP.ico" rel="icon">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Evaluación</title>
       
    </head>
    <style>
             html {
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    }
            *, *:before, *:after {
            -webkit-box-sizing: inherit;
            -moz-box-sizing: inherit;
            box-sizing: inherit;
            /*border: 1px solid black;*/
            }



                header #title {
                font-size: 1.5em;
                text-align: center;
                font-family: 'Bangers', cursive;
                color: white;
                letter-spacing: 0.10em;
                }

                .container {
                    
                width: 75%;
                align-self: center;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                margin-top: 10px;
                padding: 50px;
                border: 5px solid #0E7FC5;
                border-radius: 50px;
                margin-bottom: 20px;
                background-color: rgba(255,255,255,0.95);
                }

                .container p {
                font-family: 'Bangers', cursive;
                text-align: center;
                border: 2px solid #0E7FC5;
                border-radius: 10px;
                padding: 10px;
                }

                #description {
                align-self: center;
                }

                #survey-form {
                    padding-top: 2%;
                    padding-left: 10%;
                    padding-right: 10%;
                    padding-bottom: 10%;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                align-content: space-between;
                font-family: 'Aldrich', sans-serif;
                }

                #survey-form #about-you{
                display: grid;
                grid-template-columns: 1fr 4fr;
                grid-template-rows: auto auto auto;
                grid-row-gap: 10px;
                justify-items: stretch;
                align-items: stretch;
                }

                #survey-form #about-you label {
                padding: 8px;
                }

                .required {
                color: red;
                }

                fieldset {
                    
                border: 2px solid #0E7FC5;
                }

                #survey-form #favorite-movie-options div {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                }

                #survey-form #favorite-movie-options div label {
                margin: 4px;
                }

                #survey-form #favorite-avenger-options div{
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: repeat(6, auto);
                }

                #survey-form #favorite-avenger-options div label {
                margin: 4px;
                }

                #survey-form #dropdown {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: 1fr;
                }

                .form-item-margin {
                margin: 10px;
                }

                #textarea {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: 1fr;
                }

                #submit {
                padding: 10px;
                font-family: 'Aldrich', sans-serif;
                font-size: 1.25em;
                font-weight: bold;
                border: 1px solid #0E7FC5;
                background-color: #0E7FC5;
                border-radius: 5px;
                color: white;
                }

                #submit:hover {
                background-color: #0f73c4;
                }

                footer {
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: red;
                color: white;
                font-family: 'Aldrich', sans-serif;
                padding-top: 10px;
                }

                footer p {
                font-weight: bold;
                }

                .footer-link {
                padding: 0 15px 0 15px;
                }

                .footer-link:link,
                .footer-link:active,
                .footer-link:visited {
                text-decoration: none;
                color: #f9f9f9;
                }

                .footer-link:hover {
                color: #0f73c4;
                }

                @media only screen and (max-width: 500px) {
                #survey-form #about-you{
                    display: flex;
                    flex-direction: column;
                }
                }

                @media only screen and (max-width: 365px) {
                #survey-form #favorite-avenger-options div{
                    display: flex;
                    flex-direction: column;
                }
                }

    </style>
   <body onload="deshabilitaRetroceso()">
    <header id="encabezado">
    	
    	<ul id="menu">
            <li class="logo"><img src="img/logob.png" id="logo"></li>
            <li class="menusvacio"></li>
    	    <li class="menusevaluacion"><a href="../alumno/index.php" class="enlacemenu">MI PERFIL</a></li>
    	    <li class="menusevaluacion"><a href="../alumno/cursos.php" class="enlacemenu">CATÁLOGO DE CURSOS</a></li>
            <li class="menusevaluacion"><a href="../account/login.html" class="enlacemenu">SALIR</a></li>
    	</ul>
    </header>
    <!--<div>
        <img class="tituloscursos" src="img/CJuridica.png" >
    </div> -->

    <?php
   
        $idCurso =$_GET['idC'];
         require("../dev/conectar.php");
         include "../panel/func/profile.php";

         $intentos="";

        /*  $examen = $conn->query("SELECT * FROM resuelto
         WHERE idexamen=$idexamen
         and idcurso=$idcurso
         and idusuario=$idusuario; ");
         $numpreguntas= mysqli_num_rows($examen); */
        ?>

            

<?php
         $query="SELECT * FROM examen WHERE idcurso=".$idCurso. " and iEstatus=1" ;
         $resultado = mysqli_query($conn,$query);
         while ($consulta = mysqli_fetch_array($resultado))
            { 
                $q2="SELECT * FROM preguntas p             
                where p.idexamen=".$consulta["idExamen"]." order by p.orden ASC;";
                $examen=mysqli_query($conn,$q2);
                $nPreguntas = mysqli_num_rows($examen);
                $contadorpreguntas=0;
               
                $letrarespuesta;
                ?>
   
            <section class="u-align-left u-clearfix u-grey-5 u-section-2" id="carousel_0852">
                <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                   
                   
                    
                    <form id="survey-form" action="exam_aswer.php" method="get" >
                    <H2 > <span><?php echo $consulta['nombre'] ?> </span></H2>

                    <input id="idcurso" type="hidden" name="idC" value= <?php echo $idCurso ?>>
                    <input id="idusuario" type="hidden" name="idU" value= <?php  echo $_SESSION["id"] ?>>
                    <input id="idexamen" type="hidden" name="idEx" value= <?php  echo $consulta['idExamen'] ?>>
                    <div style="text-align: right">
                            <label>Fecha:</label>
                            <input id="fecha" name="fecha" type="datetime"  disabled 
                            value="<?php $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE); echo $formatter->format(time());?>">
                    </div>                 
                        <?php  while ($preguntas = mysqli_fetch_array($examen)){  ?>
                            <?php $contadorpreguntas=$contadorpreguntas+1 ?>  
                            <?php $q3="SELECT * FROM respuesta r where r.idpregunta=".$preguntas["idpreguntas"].";";?>
                            <?php  $examen2=mysqli_query($conn,$q3);?>
                            <?php  $contadorespuestas=0;?>    
                                    <!-- begin radio buttons-->
                                    <fieldset class="form-item-margin" id="favorite-movie-options">
                                        <legend> <?php  echo $contadorpreguntas.'.- '. $preguntas['pregunta']?></legend>

                                        <input type="hidden" name="idpregunta[<?php  echo $preguntas["idpreguntas"]?>]" value=<?php echo $preguntas["idpreguntas"]?>>

                                        <?php while ($respuesta = mysqli_fetch_array($examen2)){ ?> 
                                            <?php $contadorespuestas=$contadorespuestas+1 ?>
                                            <?php switch ($contadorespuestas) {
                                                case 1:
                                                    $letrarespuesta="A)";
                                                    break;
                                                case 2:
                                                    $letrarespuesta="B)";
                                                    break;
                                                case 3:
                                                    $letrarespuesta="C)";
                                                    break;
                                                case 4:
                                                    $letrarespuesta="D)";
                                                    break;
                                            }?> 
                                            <?php if ($preguntas['tipo']=='radio'){?>
                                                <div>
                                                    <label for="the-avengers">
                                                    <input id="the-avengers" type="radio" name="idrespuesta[<?php echo $contadorpreguntas?>]" value=<?php echo $respuesta['idrespuesta'] ?> required>
                                                    <?php echo $letrarespuesta. $respuesta['respuesta'] ?>
                                                    </label>
                                                </div>
                                            <?php }elseif($preguntas['tipo']=='checkbox'){?>
                                                    <div>
                                                        <label for="black-panther">
                                                            <input id="black-panther" type="checkbox" name=<?php echo $respuesta['idrespuesta'] ?> value=<?php echo $respuesta['respuesta'] ?> required>
                                                            <?php echo $letrarespuesta. $respuesta['respuesta'] ?>
                                                        </label>
                                                    </div>
                                            <?php }?>
                                        <?php }?>

                                    </fieldset>
                                    <!-- enalign-items: center;d radio buttons -->

            
                        <?php }?>
                
                        <button class="form-item-margin" id="submit" type="submit"  form="survey-form">Enviar Evaluación</button>
                    </form>
                </div>
            </section>
            
        <?php }?>
        <!-- Start Footer -->
  <section id="footer">
    <div id="divfooter">
      <div id="logopie">
        <img src="../img/logob2.png" id="imglogopie">
      </div>
      <div id="texto1pie">
        <p id="parrafodireccion" class="parrafosfooter">Dirección: Av. Paseo de las Palmas 830, Int. 102-1.
          Lomas de Chapultepec V Sección. Miguel Hidalgo.
          Ciudad de México. C.P. 11000. México.</p>
          <p class="parrafosfooter">Teléfono: 55-104-680-95</p>
          <p class="parrafosfooter">Correo electrónico: valuacionproductiva9@gmail.com</p>
      </div>
      <div id="texto2pie">
        <p class="parrafosfooter"><a href="../alumno/indexterminos.html" class="parrafosfooter" id="terminosycon">Terminos y Condiciones</a></p>
          <p id="parrafoter" class="parrafosfooter">© 2024 VALUACIÓN PRODUCTIVA Y
            COMPETITIVA EN MATERIA LABORAL A.C.</p>
      </div>
    </div>
  </section>
  <!-- End Footer  -->
    </body>
</html>
<script  type="text/javascript">
  function confirmar_examen() {
        Swal.fire({
        title: '¿Desea mandar respuesta?',
        text: 'Una vez aceptado, ya no puede volver a cambiar las respuesas.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Mandar Respuestas'
        }).then((result) => {
        if (result.isConfirmed) {
            //window.location.href="exam_aswer.php";
            Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
        }
        })
   
  }
  
  function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){
        window.location.hash="";
    }
}

  </script>

