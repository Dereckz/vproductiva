<?php  session_start();?>
<? echo $examendecurso;
                echo $intentost;
                ?>
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
    /*width: 100%;*/
    text-align: center;
    margin: 2% 5%;   
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
    background-color: #630ba3;
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
    <!--<div>
    <img class="tituloscursos" src="img/CJuridica.png" >
    </div> -->
    <?php
    
         require("../dev/conectar.php");
         include "../panel/func/profile.php";

         $idexamen=$_GET["idex"];
         $idcurso=$_GET["idc"];
         $idusuario=$_GET["idu"];

         $examen = $conn->query("SELECT * FROM preguntas
         WHERE idexamen=$idexamen  ");
   
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

      
         $numpreguntas= mysqli_num_rows($examen);
          $numCorrecta= mysqli_num_rows($correcta);
          $numIncorrecta = mysqli_num_rows($incorrecta);

         while($row=$correcta->fetch_assoc())	:  
            $intentost=$row['intento'];
            $cursotomado = $conn->query("SELECT * FROM curso where iIdCurso=".  $idcurso=$_GET["idc"]);
            while($curse=$cursotomado->fetch_assoc())	: 
                $examendecurso= $curse['cNombreCurso']; 
            endwhile
        ?>

    <?php 
        endwhile
    ?>
                
                
    <body>

    <h1 id="tituloeva">Resultados</h1>
        <table id="customers">
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
            <td><?php echo strtoupper($examendecurso)?></td>
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
                <a href="../reward/reconocimiento.php?idCurso='.$idcursoseleccionado.'" id="texconstancia" target="_blank" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">
                    Regresar al curso<br>
                </a>
            </td>
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

