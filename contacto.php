<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="sweetalert2.min.css" rel="stylesheet">
<?php
require('dev/conectar.php');
date_default_timezone_set('America/Mexico_City');
 
$fechaActual = date("d-m-Y h:i:s");

$nombre=($_POST["name"]);
$apellidos=($_POST["apellido"]);
$email=($_POST["email"]);
$telefono=($_POST["numero"]);

$queryC = mysqli_query($conn,"INSERT INTO `contacto`(`idcontacto`, `nombre`, `apellidos`, `correo`, `telefono`, `estatus`)
VALUES ('0','$nombre','$apellidos','$email','$telefono','1');");
 if($queryC){
    echo '<script>
        Swal.fire({
        title: "Gracias por escribirnos, en breve nos comunicamos con usted.",
        icon: "success"
    }).then(function() {
        window.location = "index.html";
    });
       
    </script>';
    '<script language="javascript">alert("Gracias por escribirnos, en breve nos comunicamos con usted. ");</script>';
    header('Location: index.html');          
}else{
    echo '<script>
        Swal.fire({
        title: "Hubo un error, vuelve a intentarlo nuevamente",
        icon: "error"
    }).then(function() {
        window.location = "../index.html";
    });
       
    </script>'; 
    '<script language="javascript">alert("Hubo un error, vuelve a intentarlo nuevamente");</script>';
    header('Location: index.html');          
}

?>