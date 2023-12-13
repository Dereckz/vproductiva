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



        $pass=password_hash(($_POST["password"]), PASSWORD_DEFAULT); 
        $consulta="INSERT INTO usuarios (`iIdUsuario`, `fkidTipoUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `cCorreo`, `cUsuario`, `cPassword`, `cTelefono`, `cCodigo`, `dFechaAlta`, `iGenero`, `cProfile`, `iEstatus`)
                VALUES (0,2,'".$nombre."'".
                ", '".$apellidoparterno."'".
                ", '".$apellidomaterno."'".
                ", '".$nombre."' ' ".$apellidoparterno." ' '".$apellidomaterno."'".
                ", '".$email."'".
                ", '".$email."'".
                ", '".$pass."'" .
                ",'".$telefono."'" .
                ",''" .
                ",'".$fechaalta."'" .
                ", '".$genero."'".
                ", '',1);";
               

         $query = mysqli_query($conn,$consulta);


            if($query){
     
            header("Location: ../instructor.php");


            }


?>