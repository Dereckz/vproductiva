<?php
 // session_start();
 
function curseactive()
{
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM Curso");
    
    while ($consulta = mysqli_fetch_array($resultado)) {
        $IdCurso=$consulta["iIdCurso"];

      echo'  <div class="col-xl-3 col-md-6 mb-4" >
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                     
                      <div class="text-xs font-weight-bold text-uppercase mb-1">'.$consulta["cNombreCurso"].'</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" >'.$consulta["cDescripcion"].'</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-apple-alt"></i></i> Activo</span>
                        <span>Instructor:</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i ><img width="50" height="50" src="'.$consulta["ricono"].'"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';

    } 
}
function registercurso()
{
    include "..\dev\conectar.php";
    
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios where usuarios.fkidTipoUsuario=2;");
    
    while ($consulta = mysqli_fetch_array($resultado)) {
      
        if ($consulta["iEstatus"]=="1")
        {
              echo 
              '<tr>
                <td><a  id="aIdu" href="javascript:void(0);" data-toggle="modal" data-target="#cantidadcurso">'.$consulta["iIdUsuario"].'</a></td>
                <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
                <td><span  class="badge badge-success"><a  href="func/actualizarStatus.php?id='.$consulta["iIdUsuario"].'&status=1"> Activo</a></span></td>
               <td>						
               <div class="row" >
               <div class="col-md-12">	
                 <span class="dropleft float-left">
                      <a class="	fas fa-wrench" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   Seleccion </a>  <div class="dropdown-menu" style="">
                      <a class="dropdown-item edit_question text-dark" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Agregar Curso</a>
                      <div class="dropdown-divider"></div>
                      <a  class="dropdown-item edit_question text-dark" href="javascript:void(0);" data-toggle="modal" data-target="#surveymodal" >Agregar Encuesta</a>
                    </div>
                 </span>	
               </div>	
             </div>
             </td> 
               </tr><tr>'
              ;
              echo ''.cursodeusuario($consulta["iIdUsuario"]).'</tr>';

        }else{
         
            echo 
            '<tr>
            <td><a href="javascript:void(0);" data-toggle="modal" data-target="#cantidadcurso">'.$consulta["iIdUsuario"].'</a></td>
             <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
            <td><span class="badge badge-danger" ><a  href="func/actualizarStatus.php?id='.$consulta["iIdUsuario"].'&status=0">Inactivo</a></span></td>
            <td>						
            <div class="row">
            <div class="col-md-12">	
              <span class="dropleft float-left">
              <a class="	fas fa-wrench" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   Seleccion </a>  <div class="dropdown-menu" style="">
                <div class="dropdown-menu" >
                   <a class="dropdown-item edit_question text-dark" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Agregar Curso</a>
                   <div class="dropdown-divider"></div>
                   <a  class="dropdown-item edit_question text-dark" href="javascript:void(0);" data-toggle="modal" data-target="#surveymodal" >Agregar Encuesta</a>
                 </div>
              </span>	
            </div>	
          </div>
          </td> 
            <tr>'
            ;

        }
        
    }
   
}
function listcurso()
{   session_start();
    include "..\dev\conectar.php";
    $resultado2 = mysqli_query($conn, "SELECT * FROM Curso");

    
    while ($consulta = mysqli_fetch_array($resultado2)) {
        $IdCurso=$consulta["iIdCurso"];
        echo ' <option value='.$IdCurso.'>'.$consulta["cNombreCurso"].'</option> ';

    }
  

    
}


function cursodeusuario($parametro1){
  include "..\dev\conectar.php";

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
        echo '<td>Profesor de:</td>';
      }
      while ($consulta = mysqli_fetch_array($result)) {
      
      echo
      '<td>'.($consulta["cNombreCurso"]).' </td>';
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
  include "..\dev\conectar.php";
    //idSurvey
  $resultado = mysqli_query($conn, "SELECT * FROM survey_set where fkiIdUsuario=".$id.";");
  while ($consulta = mysqli_fetch_array($resultado)) {
    $idSurvey=$consulta["id"];
    echo ' <option value='.$idSurvey.'>'.$consulta["title"].'</option> ';

}
}
function showAllSurvey()
{
  include "..\dev\conectar.php";
    //idSurvey
  $resultado = mysqli_query($conn, "SELECT * FROM survey_set ;");
  while ($consulta = mysqli_fetch_array($resultado)) {
    $idSurvey=$consulta["id"];
    echo ' <div>
    <label>
      <input type="checkbox" id="'.$idSurvey.'" name="'.$idSurvey.'" value="'.$consulta["title"].'" /> 
      '.$consulta["title"].'
    </label>
    </div>';

}
}
function addsurveyset(){

}
?>