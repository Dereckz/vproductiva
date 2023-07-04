<?php

include("..\dev\conectar.php");


$nombre =$_POST["username"];
$pass = $_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE cUsuario = '".$nombre."' and cPassword = '".$pass."'");
$nr = mysqli_num_rows($query);

if ($stmt = $conn->prepare("SELECT cusuario, cPassword FROM usuarios WHERE cUsuario= ? LIMIT 1")) {

    /* ligar parámetros para marcadores */
    // en este caso el nombre de usuario
    $stmt->bind_param("s", $nombre);
    /* ejecutamos la query */
    $stmt->execute();
    /* recuperamos los resultados */
    $result = $stmt->get_result();
    /* recuperamos la fila como un array asociativo */
    $fila = $result->fetch_assoc();


    // Verificar si la contraseña coincide
    if (password_verify($pass, $fila['cPassword'])) {
        echo '¡La contraseña es válida!';
        // hacer lo que corresponda
    } else {
        echo 'La contraseña no es válida.';
        // hacer lo que corresponda
    }



} else {
    echo 'Error al preparar la consulta SQL';
}
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