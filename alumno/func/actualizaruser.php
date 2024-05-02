<?php


require("../../dev/conectar.php");

 $idusuario=$_POST["idusuario"];
$email=$_POST["email"];  
$nombre=$_POST["nombre"];
$apellidoparterno=$_POST["app"];
$apellidomaterno=$_POST["apm"];
$genero=$_POST["radio"];
$telefono=$_POST["celular"];
$textempresa=$_POST["buscar"];

$queyempresa = mysqli_query($conn, "select * from empresa where nombre like '%". $textempresa."%'");
$nameempresa = mysqli_fetch_array($queyempresa);
$numEmpresa= mysqli_num_rows($queyempresa);
        if($numEmpresa<1){
                $idempresa=61;
        }else{
                $idempresa=$nameempresa["idempresa"];
        }
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
                        header("Location: ../index.php");
                }elseif($buscartipo["fkidTipoUsuario"]==3){
                        header("Location: ../index.php");
                }
            }  
 

?>