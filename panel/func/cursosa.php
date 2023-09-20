<?php

function curseactive()
{
  require("../dev/conectar.php");
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
  require("../dev/conectar.php");
    
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios where usuarios.fkidTipoUsuario=3;");
    
    while ($consulta = mysqli_fetch_array($resultado)) {
      
        if ($consulta["iEstatus"]=="1")
        {
              echo 
              '<tr>
              <td><a  id="aIdu" href="instructor_edit.php?idu='.$consulta["iIdUsuario"].'" >'.$consulta["iIdUsuario"].'</a></td>
                <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
                <td><span  class="badge badge-success text-dark"><a  href="func/updatestatus.php?id='.$consulta["iIdUsuario"].'&status=1"> Activo</a></span></td>
                <td><a class="btn btn-sm btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Agregar Curso</a></td>           
               </tr><tr>'
              ;
              echo ''.cursodeusuario($consulta["iIdUsuario"]).'</tr>';

        }else{
         
            echo 
            '<tr>
            <td><a  id="aIdu" href="instructor_edit.php?idu='.$consulta["iIdUsuario"].'" >'.$consulta["iIdUsuario"].'</a></td>
             <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
             <td><span class="badge badge-danger" ><a  href="func/updatestatus.php?id='.$consulta["iIdUsuario"].'&status=0">Inactivo</a></span></td>
            <td><a href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" class="btn btn-sm btn-primary">Agregar Curso</a></td>
            </tr>'
            ;

        }
        
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


function agregarcurso(){
    if (!isset($_POST["btnAsignar"])) {

  $_SESSION["curso"]=array();

  echo "estas aqui";

}

if (isset($_POST["btnAsignar"])) {

  $producto=$_REQUEST['mi_select'];

  echo "estas aca";



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
?>