<?php  session_start();?>

<!DOCTYPE html>
<link href="../img/LOGOVP.ico" rel="icon">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Resultado</title>

    </head>
    
    <header id="encabezado">
    	
    	<ul id="menu">
            <li class="logo"><img src="img/logob.png" id="logo"></li>
            <li class="menus"></li>
    	    <li class="menus" style="background-color: #872362;"><a href="../alumno/index.php" class="enlacemenu" style="color: white;" >Mis Cursos</a></li>
    	    <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">Catálogo de Cursos</a></li>
            <li class="menus"><a href="../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>
    <style>
              
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    /*width: 100%;*/
    text-align: center;
    margin: 2% 5%;   
    
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
    background-color: #630ba3;
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
    background-color: #45a049;
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

         while($row=$correcta->fetch_assoc())	:  
            $intentost=$row['intento'];               
                
            ?>

    <?php 
        endwhile
    ?>
                

<body onload="deshabilitaRetroceso()">

<div style="padding-top: 4.5em;" >


<div style="padding-top: 5em; padding-left: 7%;" >

    <h1 id="tituloeva" style="text-align: center; margin-right: 1.1em;">Resultados</h1>
            <table id="customers" >
            <tr>
                <th>Usuario</th>
                <th>Curso</th>
                <th>Preguntas</th>
                <th>Respuestas Correctas</th>
                <th>Respuestas Incorrectas</th>
                <!-- <th>Puntuación</th> -->
                <th>Intentos</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION['NombreLargo'] ?></td>
                <td><?php echo ucwords($examendecurso)?></td>

                <td><?php echo $numpreguntas?></td>
                <td><?php echo ($numCorrecta/10)?></td>
                <td><?php echo ($numIncorrecta/10)?></td>
               <!--  <td></td> -->
                <td><?php echo $intentost ?></td>
            </tr>
            
            
            </table>
           <?php 
            $dataareacurso = mysqli_query($conn, "SELECT * FROM areacursos a
                        INNER JOIN curso c
                        ON A.iIdAreaCursos=C.fkidAreaCurso
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