<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "@rupe2021";//-----
$dbname = "vproductivabd"; 

 /* $dbhost = "localhost";
$dbuser = "desetec2_elchingon";
$dbpass = "VlzqrY1aP7D)";
$dbname = "desetec2_vproductivabd";
@rupe2021
 */



$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

?>