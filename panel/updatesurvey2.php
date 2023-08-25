<?php
 
 include "..\dev\conectar.php";
 session_start();
 //echo 'test2'.$_POST['title'];

   $sql="UPDATE survey_set 
   SET
   title='".$_POST['title']."',
   description='".$_POST['description']."',
   start_date='".$_POST['start_date']."',
   end_date='".$_POST['end_date']."'
   WHERE ID=".$_POST['id'];

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

   /*  $qry = $conn->query("UPDATE `survey_set` 
    SET 
   `title`=".$_POST['title'].",'
   `description`=".$_POST['description'].",'
   `start_date`=".$_POST['start_date'].",'
   `end_date`=".$_POST['end_date'].",'
   WHERE ID=".$_POST['id']
   
    )->fetch_array(); */
   
    
 
 header("Location: http://localhost/vproductivam/panel/listsurvey.php");
                          
// include 'listsurvey.php';
?>