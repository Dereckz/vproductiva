<?php

require("../../dev/conectar.php");
echo 'entro';
/* $idusuario=$_POST["idusuario"];
$email=$_POST["email"];  
$nombre=$_POST["nombre"];
$apellidoparterno=$_POST["app"];
$apellidomaterno=$_POST["apm"];
$genero=$_POST["radio"];
$telefono=$_POST["celular"];
$idempresa=$_POST["empresa"];

                $consulta="UPDATE usuarios
                        SET cNombre='".$nombre."'".
                        ", cApellidoP='".$apellidoparterno."'".
                        ", cApellidoM='".$apellidomaterno."'".
                        ", cNombreLargo='".$nombre."' ' ".$apellidoparterno." ' '".$apellidomaterno."'".
                        ", cCorreo='".$email."'".
                        ", iGenero='".$genero."'".
                        ", cTelefono='".$telefono."'" .
                        ", fkidempresa='".$idempresa."'" .
                        " where iIdUsuario=".$idusuario;

                 $query = mysqli_query($conn,$consulta);


            if($query){
                $datausuario = mysqli_query($conn, "SELECT * FROM  usuarios WHERE iIdUsuario =".$idusuario);
                $buscartipo = mysqli_fetch_array($datausuario);
                if($buscartipo["fkidTipoUsuario"]==2){
                        header("Location: ../instructor.php");
                }elseif($buscartipo["fkidTipoUsuario"]==3){
                        header("Location: ../alumnos.php");
                }
            } */


?>