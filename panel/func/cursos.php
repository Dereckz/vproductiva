<?php
 // session_start();
 
function curseactive()
{

  require("../dev/conectar.php");
    $resultado = mysqli_query($conn, "SELECT * FROM curso");
   

    while ($consulta = mysqli_fetch_array($resultado)) {
        $IdCurso=$consulta["iIdCurso"];

      echo'  <div class="col-xl-3 col-md-6 mb-4" >
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">

                    <div class="h5 mb-0 font-weight-bold text-gray-800" >'.$consulta["cNombreCurso"].'</div>
                      <div class="text-xs font-weight-bold text-uppercase mb-1">'.$consulta["cDescripcion"].'</div>

                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-apple-alt"></i></i> Activo</span>
                        <span>Instructor:</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i ><img width="60" height="60" src="'.$consulta["ricono"].'"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>';

    } 
}

function listcurso()
{   session_start();

  require("../dev/conectar.php");
    $resultado2 = mysqli_query($conn, "SELECT * FROM Curso");


    while ($consulta = mysqli_fetch_array($resultado2)) {
        $IdCurso=$consulta["iIdCurso"];
        echo ' <option value='.$IdCurso.'>'.$consulta["cNombreCurso"].'</option> ';

    }

    
}


function cursodeusuario($parametro1){

  require("../dev/conectar.php");


  $result = mysqli_query($conn, 
          "SELECT u.iIdUsuario,dc.iIdDetalleCurso,c.iIdCurso, u.cNombreLargo,c.cNombreCurso,c.cDescripcion
          FROM detallecurso as dc INNER JOIN usuarios as u 
          on dc.fkiIdUsuario=u.iIdUsuario 
          INNER JOIN curso c
          on c.iIdCurso=dc.fkiIdCurso
          where u.iIdUsuario=".$parametro1.";");

      //mysqli_data_seek ($result, 0);
      //$extraido= mysqli_fetch_array($result);
      $row_cnt = mysqli_num_rows($result);
      if ($row_cnt>0){
        echo '<td> Profesor de:</td>';

      }
      while ($consulta = mysqli_fetch_array($result)) {
      
      echo'<td>'.
      ($consulta["cNombreCurso"]) .
      '</td>';
      }

}


function updatestatus($id){
  // include "..\dev\conectar.php";

  // $result = mysqli_query($conn, 
  //                         'UPDATE usuarios SET iEstatus=1 WHERE iIdUsuario='.$id.';');
  //                         mysqli_data_seek ($result, 0);
  //               //$extraido= mysqli_fetch_array($result);
  //               if (!$resultado) {
  //                 header("Location: http://localhost/vproductivam/panel/instructor.php");
  //               }
  echo 'ide--'.$id;
}

function showSurvey($id)
{
  require("../dev/conectar.php");

    //idSurvey
  $resultado = mysqli_query($conn, "SELECT * FROM survey_set where fkiIdUsuario=".$id.";");
  while ($consulta = mysqli_fetch_array($resultado)) {
    $idSurvey=$consulta["id"];
    echo ' <option value='.$idSurvey.'>'.$consulta["title"].'</option> ';

}
}


?>