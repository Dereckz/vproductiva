<?php


function showAllSurvey(){
  require("../dev/conectar.php");
  
  $resultado = mysqli_query($conn, "SELECT * FROM survey_set;");


  while ($consulta = mysqli_fetch_array($resultado)) {

    $idSurvey=$consulta["id"];

    echo ' <div>
    <
    <label>
      
      '.$consulta["title"].'
    </label>
    </div>';
 
  }

}

?>
















