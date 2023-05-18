<?php 
header( 'Content-Type: text/html;charset=utf-8' );
function ejecutarSQLCommand($commando){
  $mysqli = new mysqli("localhost", "root", "", "vproductivabd");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s
", $mysqli->connect_error);
    exit();
}

if ( $mysqli->multi_query($commando)) {
     if ($resultset = $mysqli->store_result()) {
    	while ($row = $resultset->fetch_array(MYSQLI_BOTH)) {
    	}
    	$resultset->free();
     }   
}