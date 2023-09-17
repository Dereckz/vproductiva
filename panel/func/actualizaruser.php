<?php
include("..\..\dev\conectar.php");
$idusuario=$_POST["idusuario"];
$email=$_POST["email"];  
$nombre=$_POST["nombre"];
$apellidoparterno=$_POST["app"];
$apellidomaterno=$_POST["apm"];
$genero=$_POST["radio"];
$telefono=$_POST["celular"];
$fechaalta=$_POST["fechaalta"];

if (($_POST["password"])==""){
    $consulta="UPDATE Usuarios
        SET cNombre='".$nombre."'".
        ", cApellidoP='".$apellidoparterno."'".
        ", cApellidoM='".$apellidomaterno."'".
        ", cCorreo='".$email."'".
        ", iGenero='".$genero."'".
        ", cTelefono='".$telefono."'" .
        ", dFechaAlta='".$fechaalta."'" .
        " where iIdUsuario=".$idusuario;
}elseif(($_POST["password"])<>""){
        $pass=password_hash(($_POST["password"]), PASSWORD_DEFAULT); 
        $consulta="UPDATE Usuarios
                SET cNombre='".$nombre."'".
                ", cApellidoP='".$apellidoparterno."'".
                ", cApellidoM='".$apellidomaterno."'".
                ", cCorreo='".$email."'".
                ", iGenero='".$genero."'".
                ", dFechaAlta='".$fechaalta."'" .
                ", cTelefono='".$telefono."'" .
                ", cPassword='".$pass."'" .
            " where iIdUsuario=".$idusuario;
}
    $query = mysqli_query($conn,$consulta);


            if($query){
            echo '<script src="sweetalert2.all.min.js"></script>';
            echo'  <link href="sweetalert2.min.css" rel="stylesheet">';
            echo '<script type="text/javascript">';
            echo "Swal.fire(
                '¡Operación exitoso!',
                'Actualizado Correctamente.',
                'success'";
            echo "</script>";
            header("Location: http://localhost/vproductivam/panel/instructor.php");

            }


?>