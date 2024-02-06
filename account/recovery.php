<?php
require("../dev/conectar.php");
include "mcript.php";
$contrasena=$_POST["contrasena"];
$contrasenad=$_POST["contrasenad"];
$codigo=$_POST["id"];
$codigod=$desencriptar($_POST["id"]);

 if ($contrasena<>"" || $contrasenad<>""){
    if($contrasena==$contrasenad){
       
        $query="SELECT * FROM usuarios where cCorreo='$codigod' and iEstatus=1";
        $result=$conn->query($query);
        $row=$result->fetch_assoc();

        if($result->num_rows>0){
            $pass=password_hash(($contrasena), PASSWORD_DEFAULT); 
            $consulta ="UPDATE usuarios SET cPassword='$pass' 
                         WHERE iIdUsuario= ". $row["iIdUsuario"];
                                          $queryA = mysqli_query($conn,$consulta);


                if($queryA){
                "<script> 
                alert('Se ha actualizado correctamente su contraseña') ;       
                </script>";
                header("Location: login.html");
            }else{
                "<script> 
                alert('Hubo un error, intentelo mas tarde') ;       
                </script>";
                header("Location: login.html");
            }
        
        }

    }else{
        echo 
        "<script> 
             alert('Las contraseñas no coinciden, verifique.') ;
                   
        </script>";
    }
    header("Location: login.html");

}else{
    echo 
    "<script> 
         alert('Ingrese su contraseña, porfavor') ;
         
    </script>";
} 
?>