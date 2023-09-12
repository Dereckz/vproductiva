<?php
include("..\..\dev\conectar.php");
$idusuario=$_POST["idusuario"];
$email=$_POST["email"];
$pass=password_hash(($_POST["password"]), PASSWORD_DEFAULT);   
$nombre=$_POST["nombre"];
$apellidoparterno=$_POST["app"];
$apellidomaterno=$_POST["apm"];
$genero=$_POST["radio"];
$fechaalta=$_POST["fechaalta"];

$query = mysqli_query($conn,"UPDATE Usuarios
                            SET cNombre='".$nombre."'".
                            ", cApellidoP='".$apellidoparterno."'".
                            ", cApellidoM='".$apellidomaterno."'".
                            ", cCorreo='".$email."'".
                            ", iGenero='".$genero."'".
                            ", dFechaAlta='".$fechaalta."'" .
                            ", cPassword='".$pass."'" .
                        " where iIdUsuario=".$idusuario);
            if($query){
            echo '<script src="sweetalert2.all.min.js"></script>';
            echo'  <link href="sweetalert2.min.css" rel="stylesheet">';
            echo '<script type="text/javascript">';
            echo "Swal.fire(
                '¡Operación exitoso!',
                'Actualizado Correctamente.',
                'success'";
            echo "</script>";
            header("Location: http://localhost/vproductivam/panel/instructor_edit.php?idu=".$idusuario);

            }


?>