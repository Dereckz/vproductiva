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
?>