<?php 

require("../../dev/conectar.php");

    session_start();
    $idu=$_GET['id'];
    $iEstatus=$_GET['status'];
  
     if  ($iEstatus==0){
        //echo 'ID='.$idu. ' estatus='.$iEstatus;
       $queryA = mysqli_query($conn,"UPDATE usuarios SET iEstatus = 1 WHERE iIdUsuario= ". $idu);
       
    } else{
        $queryA = mysqli_query($conn,"UPDATE usuarios SET iEstatus = 0 WHERE iIdUsuario= ". $idu);
       // echo 'ID='.$idu. ' estatus='.$iEstatus;

    }
        if($queryA){
            header("Location: ../alumnos.php");
        }
                
 ?>