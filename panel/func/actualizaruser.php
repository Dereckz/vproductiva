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
$idempresa=$_POST["empresa"];

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
        ", fkidempresa='".$idempresa."'" .
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
                ", fkidempresa='".$idempresa."'" .
                 " where iIdUsuario=".$idusuario;
}
    $query = mysqli_query($conn,$consulta);


            if($query){
                $datausuario = mysqli_query($conn, "SELECT * FROM  usuarios WHERE iIdUsuario =".$idusuario);
                $buscartipo = mysqli_fetch_array($datausuario);
                if($buscartipo["fkidTipoUsuario"]==2){
                        header("Location: ../instructor.php");
                }elseif($buscartipo["fkidTipoUsuario"]==3){
                        header("Location: ../alumnos.php");
                }
           


            }


?>