<?php

require("../../dev/conectar.php");

$idusuario=$_POST["idusuario"];
$email=$_POST["email"];  
$nombre=$_POST["nombre"];
$apellidoparterno=$_POST["app"];
$apellidomaterno=$_POST["apm"];
$genero=$_POST["radio"];
$telefono=$_POST["celular"];
$fechaalta=$_POST["fechaalta"];

if (($_POST["password"])==""){
    $consulta="UPDATE usuarios
        SET cNombre='".$nombre."'".
        ", cApellidoP='".$apellidoparterno."'".
        ", cApellidoM='".$apellidomaterno."'".
        ", cNombreLargo='".$nombre."' ' ".$apellidoparterno." ' '".$apellidomaterno."'".
        ", cCorreo='".$email."'".
        ", iGenero='".$genero."'".
        ", cTelefono='".$telefono."'" .
        ", dFechaAlta='".$fechaalta."'" .
        " where iIdUsuario=".$idusuario;
}elseif(($_POST["password"])<>""){
        $pass=password_hash(($_POST["password"]), PASSWORD_DEFAULT); 
        $consulta="UPDATE usuarios
                SET cNombre='".$nombre."'".
                ", cApellidoP='".$apellidoparterno."'".
                ", cApellidoM='".$apellidomaterno."'".
                ", cNombreLargo='".$nombre."' ' ".$apellidoparterno." ' '".$apellidomaterno."'".
                ", cCorreo='".$email."'".
                ", iGenero='".$genero."'".
                ", dFechaAlta='".$fechaalta."'" .
                ", cTelefono='".$telefono."'" .
                ", cPassword='".$pass."'" .
                 " where iIdUsuario=".$idusuario;
}
    $query = mysqli_query($conn,$consulta);


            if($query){
     
            header("Location: ../instructor.php");


            }


?>