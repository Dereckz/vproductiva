<?php

require("../../dev/conectar.php");
$tipousuario=$_POST["tiposuario"];
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
                VALUES (0,".$tipousuario.",'".$nombre."'".
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
                if ($tipousuario==2){
                        header("Location: ../instructor.php");

                }
                else if($tipousuario==3){
                        header("Location: ../alumnos.php");

                }

                
           

            }


?>