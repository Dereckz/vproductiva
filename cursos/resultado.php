<?php  session_start();?>
<!DOCTYPE html>
<link href="../img/LOGOVP.ico" rel="icon">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Resultado</title>
            <style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
    }
            </style>
    </head>
    <body>
    <header id="encabezado">
    	<ul id="menu">
            <li class="logo"><img src="img/logob.png" id="logo"></li>
            <li class="menus"></li>
    	    <li class="menus"><a href="../alumno/index.php" class="enlacemenu">Mi perfil</a></li>
    	    <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">Catálogo de Cursos</a></li>
            <li class="menus"><a href="../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>
    <div>
    <img class="tituloscursos" src="img/CJuridica.png" >
    </div>   
    <?php
    
         require("../dev/conectar.php");
         include "../panel/func/profile.php";

         $idexamen=$_GET["idex"];
         $idcurso=$_GET["idc"];
         $idusuario=$_GET["idu"];
         $examen = $conn->query("SELECT * FROM resuelto
         WHERE idexamen=$idexamen
         and idcurso=$idcurso
         and idusuario=$idusuario; ");
   
        $correcta = $conn->query("SELECT * FROM resuelto
        WHERE idexamen=$idexamen
        and idcurso=$idcurso
        and idusuario=$idusuario
        and correcta=1; ");

        $incorrecta = $conn->query("SELECT * FROM resuelto
        WHERE idexamen=$idexamen
        and idcurso=$idcurso
        and idusuario=$idusuario
        and correcta=0; ");

      
           $numpreguntas= mysqli_num_rows($examen);
          $numCorrecta= mysqli_num_rows($correcta);
          $numIncorrecta = mysqli_num_rows($incorrecta);

         while($row=$examen->fetch_assoc())	:  

            
        ?>

    <?php 
        endwhile
    ?>
                
    <body>

    <h1>Resultados</h1>
        <table id="customers">
        <tr>
            <th>Usuario</th>
            <th>Curso</th>
            <th>Preguntas</th>
            <th>Respuestas Correctas</th>
            <th>Respuestas incorrectas</th>
            <th>Puntuación</th>
            <th>Intentos</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION['NombreLargo'] ?></td>
            <td>Maria Anders</td>
            <td><?php echo $numpreguntas?></td>
            <td><?php echo $numCorrecta?></td>
            <td><?php echo $numIncorrecta?></td>
            <td>Puntuación</td>
            <td><?php echo $row['intento'] ?></td>
        </tr>
        </table>
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

