<?php
//  include "..\dev\conectar.php";
//  $qry = $conn->query("UPDATE `survey_set` SET 
// `title`=".$_GET['title'].",'
// `description`=".$_GET['description'].",'
// `start_date`=".$_GET['start_date'].",'
// `end_date`=".$_GET['end_date'].",'
// WHERE ID=".$_GET['id']

//  )->fetch_array();
//include 'listsurvey.php';
?>
<?php

 include "..\dev\conectar.php";
 session_start();

 $fechaActual = date('Y-m-d');
   
 //echo $fechaActual;
   $sql="INSERT INTO `survey_set`(`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`) 
                  VALUES ('0','".$_POST['title']."','".$_POST['description']."','" .$_SESSION["id"]."','".$_POST['start_date']."','".$_POST['end_date']."','".$fechaActual."');";
  
   if(mysqli_query($conn, $sql)){
      echo '<script> swal({
         title: "Wrong information",
         text: "Sorry, your login information is not in our system. Please check your username/email correctly.",
         confirmButtonText: "Okay"}).then(function() {
             window.location = "/listsurvey.php";
         }); 
         </script>';
   }else {
      echo '<script>
        Swal.fire({
         icon: "error",
         title: "Oops...",
         text: "¡La contraseña no coincide!",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         }).then(function(result){
            if(result.value){                   
             window.location = "../xUsuarios.php";
            }
         });
        </script>';
      //echo "ERROR: No se ejecuto $sql. " . mysqli_error($conn);
  }

  
 
 header("Location: http://localhost/vproductivam/panel/listsurvey.php");
                          
?>
  
 