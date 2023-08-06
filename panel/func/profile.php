<?php
session_start();


function sessionuser()
{
    //1 Man
    //2 Woman

    $NombreUsuario=$_SESSION["Nombre"];
    if ($_SESSION["iGenero"]=="1"){
       
        echo '<img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">              
        <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
    }else{
        echo '<img class="img-profile rounded-circle" src="img/girl.png" style="max-width: 60px">              
        <span class="ml-2 d-none d-lg-inline text-white small" id="name_nav">'.$NombreUsuario.'</span>';
    }
    

}

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

            echo 
            '<tr>
            <td><a href="#">'.$consulta["iIdUsuario"].'</a></td>
            <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
            <td>'.'$IdCurso'.'</td>
            <td><span class="badge badge-success">Activo</span></td>
            <td><a class="btn btn-sm btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" >Detalle</a></td>
           </tr>';
        }else{
            echo 
            '<tr>
            <td><a href="#">'.$consulta["iIdUsuario"].'</a></td>
            <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
            <td>'.$IdCurso.'</td>
            <td><span class="badge badge-danger">Inactivo</span></td>
            <td><a href="javascript:void(0);" data-toggle="modal" data-target="#cursomodal" class="btn btn-sm btn-primary">Detalle</a></td>
            </tr>';

        }
        
    }
   
}

?>