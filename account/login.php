<?php

include("..\dev\conectar.php");


$nombre =$_POST["username"];
$pass = $_POST["password"];
$hashes ='$2y$10$NgW6Be55prEnSjd6kfGT0eIxdvZiNWarMXcOCblsu1eA3.KBmO7cm';
$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE cUsuario = '".$nombre."' and cPassword = '".$pass."'");
$nr = mysqli_num_rows($query);


$Sql_Query = "select cusuario, cPassword from usuarios where cUsuario = '$nombre'";
     
     $result = mysqli_query($conn,$Sql_Query);
     $row = mysqli_fetch_array($result);
     
        if(mysqli_num_rows($result) > 0){
           if(password_verify($pass, $hashes)==1){
              echo "Logeado exitosamente";
              //procedes a asignar cookies o sesiones dependiendo de tu proyecto
           }else{
              echo "Error de inicio de sesion, contraseña invalida->".$pass."-" .$row['cPassword']."";
           }
        }else{
           echo "No hay usuarios registrado con ese nombre ";
        }


// if ($stmt = $conn->prepare("SELECT cusuario, cPassword FROM usuarios WHERE cUsuario= ? LIMIT 1")) {

//     /* ligar parámetros para marcadores */
//     // en este caso el nombre de usuario
//     $stmt->bind_param("s", $nombre);
//     /* ejecutamos la query */
//     $stmt->execute();
//     /* recuperamos los resultados */
//     $result = $stmt->get_result();
//     /* recuperamos la fila como un array asociativo */
//     $fila = $result->fetch_assoc();


//     // Verificar si la contraseña coincide
//     if ($fila && password_verify($pass, $fila['cPassword'])) {
//         echo '¡La contraseña es válida! ' ;
//         // hacer lo que corresponda
//     } else {
//         echo 'La contraseña no es válida!'.password_verify($pass, $fila['cPassword']).'' ;
//         // hacer lo que corresponda
//     }



// } else {
//     echo "<script> alert('Error');window.location= 'login.html' </script>";
// }
/* if($nr == 1)
{
	header("Location: ../panel/index.html");
	//echo "Bienvenido:" .$nombre;
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'login.html' </script>";
} */
	


?>