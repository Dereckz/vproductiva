<?php
 require("../dev/conectar.php");
 session_start();
 date_default_timezone_set('America/Mexico_City');

 $fecha = date("Y-m-d");
 $fechaactual = date("Y-m-d H:i:s");
 $horaActual = date("h:i:s");
 $idCliente="";
  //hacer consulta, con el id y la fecha de acces, para obtener informacion relacionada
    $sqlCliente   = ("SELECT *
                    FROM accesos WHERE idusuario=".$_SESSION["id"]."
                     and dfechaacceso like '%" . $fecha ."%';");

    $queryCliente = mysqli_query($conn, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    
    while ($dataCliente = mysqli_fetch_array($queryCliente)) { 
        $idCliente = $dataCliente["id"];
        $queryA = mysqli_query($conn,"UPDATE accesos SET dFechaCierre = NOW() 
        WHERE idusuario=".$_SESSION["id"]."
        ORDER BY dFechaAcceso DESC LIMIT 1; ");
    }
 
  
     
     if($queryA){
       //Removemos sesión.
       session_unset();
       //Destruimos sesión.
       session_destroy();              
       //Redirigimos pagina.
        header("Location:  ../index.html");
     }

?>