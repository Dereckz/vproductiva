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
    padding: 10px;
    
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #630ba3;
    color: white;
    padding-left: 100px;
    }
    .my-button {
    padding: 10px 20px;
    background-color: #2E49E1;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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

        

         $examen = $conn->query("SELECT * FROM preguntas
         WHERE idexamen=$idexamen ");
   
            $correcta = $conn->query("SELECT * FROM resuelto r
            INNER JOIN preguntas p
            ON p.idexamen= r.idexamen
            WHERE p.idexamen=$idexamen
            AND r.idusuario=$idusuario
            AND r.correcta=1;");

            $incorrecta = $conn->query("SELECT * FROM resuelto r
            INNER JOIN preguntas p
            ON p.idexamen= r.idexamen
            WHERE p.idexamen=$idexamen
            AND r.idusuario=$idusuario
            AND r.correcta=0; ");
             $examendecurso="";
             $intentost="";
            
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

<div style="padding-top: 100px; ;" >


<div style="padding-top: 5em; padding-left: 1.2em;" >

    <h1 id="tituloeva" style="text-align: center">Resultados</h1>
            <table id="customers" >
            <tr>
                <th>Usuario</th>
                <th>Curso</th>
                <th>Preguntas</th>
                <th>Respuestas Correctas</th>
                <th>Respuestas Incorrectas</th>
                <th>Puntuación</th>
                <th>Intentos</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION['NombreLargo'] ?></td>
                <td><?php echo ucwords($examendecurso)?></td>

                <td><?php echo $numpreguntas?></td>
                <td><?php echo $numCorrecta?></td>
                <td><?php echo $numIncorrecta?></td>
                <td></td>
                <td><?php echo $intentost ?></td>
            </tr>
            
            
            </table>
            <table id="regresarCurso">
            <tr>
            <td class=regresarCurso>
                <button class="my-button" >

                        <a class="text-white" href='../alumno/index.php' id="btnRegresarCurso">
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