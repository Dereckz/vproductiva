<?php

/*
$dbhost = "localhost";
$dbuser = "valuaci4_administradorbd";
$dbpass = "MK7GwJ.NiF{4";
$dbname = "valuaci4_valuacionproductivabd";

 */
 
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "@rupe2021";
 $dbname = "vproductivabd"; 
 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

?>