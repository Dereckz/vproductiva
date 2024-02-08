<?php


 /* $dbhost = "localhost";
$dbuser = "desetec2_elchingon";
$dbpass = "VlzqrY1aP7D)";
$dbname = "desetec2_vproductivabd";

 */

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