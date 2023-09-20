<?php

/* session_start(); */
function sessionuser()
{

    $NombreUsuario=$_SESSION["usuario"];
    $imgprofile=$_SESSION["img"];
    if (($imgprofile)==""){
                if ($_SESSION["iGenero"]=="1"){
                
                    echo '<img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 40px">              
                    <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
                }else{
                    echo '<img class="img-profile rounded-circle" src="img/girl.png" style="max-width: 40px">              
                    <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
                }
     }else{
        echo '<img class="img-profile rounded-circle" src="'.$imgprofile.'" style="max-width: 40px">              
        <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
     }

}

?>