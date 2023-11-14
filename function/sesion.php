<?php

function acceso($usuarioid){
    require("../dev/conectar.php");

    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('Y-m-d');
    //hacer consulta, con el id y la fecha de acces, para obtener informacion relacionada
    
    $queryA = mysqli_query($conn,"INSERT INTO `accesos`(`idAccesos`, `dFechaAcceso`, `dFechaCierre`, `iAcceso`, `idUsuario`)
    VALUES ('0',".$fechaActual.",'',1,".$usuarioid.");");
        
        if($queryA){
    
        }
}

?>