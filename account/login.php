<?php

include("..\dev\conectar.php");


$nombre =$_POST["username"];
$pass = $_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE cUsuario = '".$nombre."' and cPassword = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: ../panel/index.html");
	//echo "Bienvenido:" .$nombre;
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'login.html' </script>";
}
	


?>