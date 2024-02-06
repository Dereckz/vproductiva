<?php
require("../dev/conectar.php");
include "mcript.php";
$contrasena=$_POST["contrasena"];
$contrasenad=$_POST["contrasenad"];
$codigo=($_POST["id"]);
$codigod=$desencriptar($_POST["id"]);

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

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
                    echo '.';
                    echo "<script> 
                            alert('Se ha actualizado correctamente su contraseña') ;     
                            window.location='login.html'; 
                        </script>";
                     
              
            }else{
                echo '.';
                echo   "<script> 
                            alert('Hubo un error, intentelo mas tarde') ;       
                            window.location='login.html'; 
                        </script>";
                        
            }       
        }else{
            echo '.';
                echo   "<script> 
                            alert('Hubo un error, intentelo mas tarde.') ;       
                            window.location='login.html'; 
                        </script>";
        }
    }else{
        echo '.';
        echo "<script> 
                alert('No coiciden las contraseñas') ;     
                window.location='login.html'; 
            </script>";  
      
    }   
}else{
    echo '.';
    echo 
    "<script> 
         alert('Ingrese su contraseña, porfavor') ;   
         window.location='login.html'; 
    </script>";
   
     
} 
?>