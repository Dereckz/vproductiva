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
    //$resultado = mysqli_query($conn, "SELECT * FROM `detallecurso` INNER JOIN usuarios on fkiIdUsuario=iIdUsuario where usuarios.fkidTipoUsuario=2;");
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios where usuarios.fkidTipoUsuario=2;");
    
    while ($consulta = mysqli_fetch_array($resultado)) {
        //$IdCurso=$consulta["iIdCurso"];

        if ($consulta["iEstatus"]=="1")
        {
          $result = mysqli_query($conn, "SELECT * FROM detallecurso  where fkiIdUsuario=".$consulta["iIdUsuario"].";");
          mysqli_data_seek ($result, 0);
          $extraido= mysqli_fetch_array($result);
          if (is_null($extraido)){
              echo 
              '<tr>
              <td><a href="#">'.$consulta["iIdUsuario"].'</a></td>
              <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
              <td>N/A</td>
              <td><span class="badge badge-success">Activo</span></td>
              <td><a class="btn btn-sm btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Detalle</a></td>
            </tr>';

          }else{
            
              echo 
              '<tr>
              <td><a href="#">'.$consulta["iIdUsuario"].'</a></td>
              <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
              <td>'.$extraido["fkiIdCurso"].'</td>
              <td><span class="badge badge-success">Activo</span></td>
              <td><a class="btn btn-sm btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Detalle</a></td>
              </tr>';
          }

        }else{
            echo 
            '<tr>
            <td><a href="#">'.$consulta["iIdUsuario"].'</a></td>
            <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
            <td>S/N</td>
            <td><span class="badge badge-danger">Inactivo</span></td>
            <td><a href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" class="btn btn-sm btn-primary">Detalle</a></td>
            </tr>';

        }
        
    }
   
}
function listcurso()
{   session_start();
    include "..\dev\conectar.php";
    $resultado = mysqli_query($conn, "SELECT * FROM Curso");

    
    while ($consulta = mysqli_fetch_array($resultado)) {
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

?>