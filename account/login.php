<?php

session_start();

require("../dev/conectar.php");
$nombre =$_POST["username"];
$pass = $_POST["password"];
if ($stmt = $conn->prepare("SELECT iIdUsuario, cUsuario, cPassword, cNombre, cApellidoP, cnombrelargo, fkidTipoUsuario,iGenero FROM usuarios WHERE cUsuario= ? LIMIT 1")) {
 
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

        $tipo=$fila['fkidTipoUsuario'];

        if ($fila['fkidTipoUsuario']==1){

              header("Location: ../panel/index.php");

        }else if ($fila['fkidTipoUsuario']==2){

         header("Location: ../instructor/index.php");

        }else  if ($fila['fkidTipoUsuario']==3){
         header("Location: ../alumnos/index.php");
        }         
     } else {
       //header("Location: login.html");
         //echo 'La contraseña no es válida!' ;
         echo "<script> alert('La contraseña no es válida!');window.location= '../account/login.html' </script>";

          
     }

 } else {
     echo "<script> alert('Error al logarse');window.location= '../index.html' </script>";
    header("Location:  ../index.html");
}
 
?>