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


function surveyactive($parametro1){
  require("../dev/conectar.php");

      $result = mysqli_query($conn, 
      "SELECT * FROM detallesurvey ds
      inner join survey_set st
      on ds.idSurvey=st.id
      INNER JOIN usuarios us
      on ds.idUsuario=us.iIdUsuario
      where us.iIdUsuario=".$parametro1.";");

    
      $row_cnt = mysqli_num_rows($result);
      if ($row_cnt>0){
        echo '<td> Cursos:</td>';
      }
      while ($consulta = mysqli_fetch_array($result)) {
      
      echo'<td>'.
      ($consulta["title"]) .
      '</td>';
      }

}


?>
















