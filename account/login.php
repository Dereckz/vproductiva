<?php
 date_default_timezone_set('America/Mexico_City');
 
 $fechaActual = date("d-m-Y h:i:s");
session_start();
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
require("../dev/conectar.php");
require("../function/sesion.php");
$nombre =$_POST["username"];
$pass = $_POST["password"];
if ($stmt = $conn->prepare("SELECT iIdUsuario, cUsuario, cPassword, cNombre, cApellidoP, cnombrelargo, fkidTipoUsuario,iGenero, cProfile FROM usuarios WHERE cUsuario= ? LIMIT 1")) {
 
// Start the session


///* ligar parámetros para marcadores */
// en este caso el nombre de usuario

     $stmt->bind_Param("s", $nombre);

//     /* ejecutamos la query */
     $stmt->execute();
//     /* recuperamos los resultados */
     $result = $stmt->get_result();
//     /* recuperamos la fila como un array asociativo */
     $fila = $result->fetch_assoc();

    // Verificar si la contraseña coincide
     if ($fila && password_verify($pass, $fila['cPassword'])) {

        $_SESSION["id"] =$fila["iIdUsuario"];
        $_SESSION["usuario"] = $fila["cUsuario"];
        $_SESSION["Tipo"]=$fila["fkidTipoUsuario"];
        $_SESSION["Nombre"]=$fila['cNombre'];
        $_SESSION["ApellidoP"]=$fila['cApellidoP'];
        $_SESSION["NombreLargo"]=$fila["cnombrelargo"];
        $_SESSION["iGenero"]=$fila["iGenero"];
        $_SESSION["img"]=$fila["cProfile"];
        $_SESSION['tiempo']=time();
        $_SESSION['acceso']=$fechaActual;
       
        $tipo=$fila['fkidTipoUsuario'];
        
        

        if ($fila['fkidTipoUsuario']==1){

              header("Location: ../panel/index.php");

        }else if ($fila['fkidTipoUsuario']==2){

         header("Location: ../instructor/index.php");

        }else  if ($fila['fkidTipoUsuario']==3){
          acceso($fila["iIdUsuario"]);
         
        }         
     } else {
       //header("Location: login.html");
         //echo 'La contraseña no es válida!' ;
         //echo "<script> alert('La contraseña no es válida!');window.location= '../account/login.html' </script>";
         echo '.';
         echo '<script>
             Swal.fire({
             title: "Las contraseña o el usuario no son correctos, verfique.",
             timer: 1800,
             icon: "warning"
             }).then(function() {
                 window.location = "login.html";
             });
         
         </script>';
          
     }

 } else {
    // echo "<script> alert('Error al logarse');window.location= '../index.html' </script>";
    //header("Location:  ../index.html");
    echo '.';
    echo '<script>
        Swal.fire({
        title: "Hubo un error al tratar de logearse, intente mas tarde",
        timer: 1500,
        icon: "error"
        }).then(function() {
            window.location = "login.html";
        });
    
    </script>';
}
 
?>