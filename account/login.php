<?php
 session_start();
include("..\dev\conectar.php");


$nombre =$_POST["username"];
$pass = $_POST["password"];
//$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE cUsuario = '".$nombre."' and cPassword = '".$pass."'");
//$nr = mysqli_num_rows($query);



/* $Sql_Query = "select cusuario, cPassword from usuarios where cUsuario = '$nombre'";
     
     $result = mysqli_query($conn,$Sql_Query);
     $row = mysqli_fetch_array($result);
     
        if(mysqli_num_rows($result) > 0){
           if(password_verify($pass, $row['cPassword'])==1){
              echo "Logeado exitosamente";
              //procedes a asignar cookies o sesiones dependiendo de tu proyecto
           }else{
              echo "Error de inicio de sesion, contraseña invalida->";
           }
        }else{
           echo "No hay usuarios registrado con ese nombre ";
        } */

 
if ($stmt = $conn->prepare("SELECT iIdUsuario, cUsuario, cPassword, cNombre, cnombrelargo, fkidTipoUsuario,iGenero FROM usuarios WHERE cUsuario= ? LIMIT 1")) {
// Start the session


///* ligar parámetros para marcadores */
// en este caso el nombre de usuario
     $stmt->bind_param("s", $nombre);
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
        $tipo=$fila['fkidTipoUsuario'];

        if ($fila['fkidTipoUsuario']==1){

              header("Location: ../panel/index.php");

        }else if ($fila['fkidTipoUsuario']==3){

         header("Location: ../alumno/index.php");

        }else  if ($fila['fkidTipoUsuario']==2){
         header("Location: ../instructor/index.php");
        }         
     } else {
       //header("Location: login.html");
         //echo 'La contraseña no es válida!' ;
         echo "<script> alert('La contraseña no es válida!');window.location= 'https://desetecnologias.net/account/login.html' </script>";
          
     }

 } else {
     echo "<script> alert('Error al logarse');window.location= '../index.html' </script>";
    header("Location:  ../index.html");
}
 
?>