<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vproductivabd";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE cUsuario = '".$nombre."' and cPassword = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: ../content/index.htm	l");
	//echo "Bienvenido:" .$nombre;
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "No ingreso"; 
	echo "<script> alert('Error');window.location= 'login.html' </script>";
}
	


?>