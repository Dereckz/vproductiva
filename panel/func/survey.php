<?php



function encuestaslist()
{
   
    include "..\dev\conectar.php";
   
    $req = mysqli_query($conn, "SELECT * FROM encuestas ORDER BY id DESC");
    while($result = mysqli_fetch_object($req)){


        echo '<td>'.$result->id.'</td>
              <td><a href="survey.php?id='.$result->id.'">'.$result->titulo.'</a></td>
              <td>'.$result->fecha.'</td>';
        //echo '<li><a href="encuesta.php?id='.$result->id.'">'.$result->titulo.'</a></li>';
    }
}
?>