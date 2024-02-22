<?php  session_start();?>

<!DOCTYPE html>
<link href="../img/LOGOVP.ico" rel="icon">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Resultado</title>

    </head>
    
    <header id="encabezado">
    	
    	<ul id="menu">
            <li class="logo"><img src="img/logob.png" id="logo"></li>
            <li class="menusvacio"></li>
    	    <li class="menus"><a href="../alumno/index.php" class="enlacemenu">MI PERFIL</a></li>
    	    <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">CATÁLOGO DE CURSOS</a></li>
            <li class="menus"><a href="../account/login.html" class="enlacemenu">SALIR</a></li>
    	</ul>
    </header>
    <style>
              
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    /*width: 100%;*/
    text-align: center;
    margin: 2% 0%;   
    
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 6px;
    
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #872362;
    color: white;
    /*padding-left: 100px;*/
    }
    .my-button {
    padding: 1em 3em;
    background-color: #2E49E1;
    color: white;
    border: none;
    border-radius: 5em;
    cursor: pointer;
    font-weight: 550;
    }

    .my-button:hover {
    background-color: #630ba3;
    }

    .my-button:active {
    background-color: #3e8e41;
    }  
    </style>
    <?php
    
         require("../dev/conectar.php");
         include "../panel/func/profile.php";

         $idexamen=$_GET["idex"];
         $idcurso=$_GET["idc"];
         $idusuario=$_GET["idu"];
         $intentost=$_GET["i"];

         $qod=10;
        

         $examen = $conn->query("SELECT * FROM preguntas
         WHERE idexamen=$idexamen ");
   
            $correcta = $conn->query("SELECT * FROM resuelto r
            INNER JOIN preguntas p
            ON p.idexamen= r.idexamen
            WHERE p.idexamen=$idexamen
            AND r.idusuario=$idusuario
            AND r.correcta=1
            AND r.intento= $intentost;");

            $incorrecta = $conn->query("SELECT * FROM resuelto r
            INNER JOIN preguntas p
            ON p.idexamen= r.idexamen
            WHERE p.idexamen=$idexamen
            AND r.idusuario=$idusuario
            AND r.correcta=0
            AND r.intento=$intentost;");
             
            $examendecurso="";
         
            
        $detallecurso = mysqli_query($conn, "SELECT * FROM curso WHERE iIdCurso=" .$idcurso);
        $infocurso = mysqli_fetch_array($detallecurso);
        $examendecurso= $infocurso['cNombreCurso']; 

        $numpreguntas= mysqli_num_rows($examen);
        $numCorrecta= mysqli_num_rows($correcta);
        $numIncorrecta = mysqli_num_rows($incorrecta);
       /*  if($numpreguntas==10){
            $qod=10;         
        }
        if($numpreguntas==15){
            $qod=15;            
        } */
         while($row=$correcta->fetch_assoc())	:  
            $intentost=$row['intento'];               
                
            ?>
   
    <?php 
        endwhile
    ?>
                

<body onload="deshabilitaRetroceso()">

<div style="padding-top: 3em;" >


<div id="margintopresul">

    <h1 id="tituloeva" style="text-align: center;">Resultados</h1>
            <table id="customers" >
            <tbody id="flexresult">
            <tr id="coldatos">
                <th>Usuario</th>
                <th>Curso</th>
                <th>Preguntas</th>
                <th>Respuestas Correctas</th>
                <th>Respuestas Incorrectas</th>
                 <th>Resultado</th> 
                <th>Intentos</th>
            </tr>
            <tr id="colresultados">
                <td><?php echo $_SESSION['NombreLargo'] ?></td>
                <td><?php echo mb_strtoupper($examendecurso)?></td>

                <td><?php echo $numpreguntas?></td>
                <td><?php echo ($numCorrecta/$numpreguntas)?></td>
                <td><?php echo ($numIncorrecta/$numpreguntas)?></td>
                <td><?php if($numCorrecta/$numpreguntas>6){echo 'APROBADO';}else{echo 'NO APROBADO';}?></td> 
                <td><?php echo $intentost ?></td>
            </tr>
            </tbody>
            
            </table>
           <?php 
            $dataareacurso = mysqli_query($conn, "SELECT * FROM areacursos a
                        INNER JOIN curso c
                        ON a.iIdAreaCursos=c.fkidAreaCurso
                        where c.iIdCurso=".$idcurso);
            $detallearea = mysqli_fetch_array($dataareacurso);
           ?> 
                <table id="regresarCurso">
                    <tr>
                    <td class=regresarCurso>
                        <button class="my-button" >

                                <a class="text-white" href="../cursos/detailcurso.php?pidc=<?php echo $idcurso?> &areacurso=<?php echo $detallearea["NombreArea"]?>&curso=<?php echo $detallearea["cNombreCurso"]?>" id="btnRegresarCurso">
                                Regresar al curso
                                <a>
                        </button>
                        </td>
                    </tr>
                </table>
</div>
    <!-- Start Footer -->

    </body>
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
 
</script>

<script>
function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){
        window.location.hash="";
    }
}
</script>