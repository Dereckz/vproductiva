<?php
session_start();


function sessionuser()
{
    //1 Man
    //2 Woman

    $NombreUsuario=$_SESSION["Nombre"];
    if ($_SESSION["iGenero"]=="1"){
       
        echo '<img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">              
        <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
    }else{
        echo '<img class="img-profile rounded-circle" src="img/girl.png" style="max-width: 60px">              
        <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
    }
    

}

?>