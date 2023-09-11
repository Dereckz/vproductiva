<?php 
    include("..\..\dev\conectar.php");
    session_start();
    $idu=$_GET['id'];
    $iEstatus=$_GET['status'];

                            $queryA = mysqli_query($conn,"UPDATE usuarios SET iEstatus = ".$iEstatus." WHERE iIdUsuario= ". $idu);
                                if($queryA){
                                    header("Location: http://localhost/vproductivam/panel/instructor.php");
                                }
                
 ?>