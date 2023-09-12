<?php
function detalleinstructor()
{
    include "..\dev\conectar.php";
    
    $resultado = mysqli_query($conn, "SELECT * FROM usuarios where usuarios.fkidTipoUsuario=2;");
    
    while ($consulta = mysqli_fetch_array($resultado)) {
      
        if ($consulta["iEstatus"]=="1")
        {
              echo 
              '<tr>
                  <td><a  id="aIdu" href="instructor_edit.php?idu='.$consulta["iIdUsuario"].'" >'.$consulta["iIdUsuario"].'</a></td>
                  <td>'.strtoupper($consulta["cNombreLargo"]).'</td>
                  <td><span  class="badge badge-success text-dark"><a  href="func/actualizarStatus.php?id='.$consulta["iIdUsuario"].'&status=1"> Activo</a></span></td>
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

        }else if (($consulta["iEstatus"]=="0")){
         
            echo 
            '<tr>
            <td><a  id="aIdu" href="instructor_edit.php?idu='.$consulta["iIdUsuario"].'" >'.$consulta["iIdUsuario"].'</a></td>
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
?>