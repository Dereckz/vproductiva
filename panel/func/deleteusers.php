<?php
 require("../dev/conectar.php");
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM usuarios WHERE iIdUsuario= '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);
?>