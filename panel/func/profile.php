<?php
session_start();
function sessionuser()
{
    $NombreUsuario=$_SESSION["Nombre"];
    
    echo '<img class="img-profile rounded-circle" src="img/girl.png" style="max-width: 60px">              
    <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';

}

?>