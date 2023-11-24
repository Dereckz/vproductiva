


<!DOCTYPE html>
<html lang="en">
<link href="../img/LOGOVP.ico" rel="icon">
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['id']))
  header('location:../account/login.html');
	include 'header.php' 
?>

<style>
  
table{
    table-layout: fixed;
    width: 250px;
}

th, td {
    width: 100px;
    word-wrap: break-word;
}
  :root {
    --color-green: #00a878;
    --color-red: #fe5e41;
    --color-button: #fdffff;
    --color-black: #000;
}
.switch-button {
    display: inline-block;
}
.switch-button .switch-button__checkbox {
    display: none;
}
.switch-button .switch-button__label {
    background-color: var(--color-red);
    width: 2rem;
    height: 1rem;
    border-radius: 1rem;
    display: inline-block;
    position: relative;
}
.switch-button .switch-button__label:before {
    transition: .2s;
    display: block;
    position: absolute;
    width: 1rem;
    height: 1rem;
    background-color: var(--color-button);
    content: '';
    border-radius: 50%;
    box-shadow: inset 0px 0px 0px 1px var(--color-black);
}
.switch-button .switch-button__checkbox:checked + .switch-button__label {
    background-color: var(--color-green);
}
.switch-button .switch-button__checkbox:checked + .switch-button__label:before {
    transform: translateX(2rem);
}
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'topbar.php' ?>
  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
 
    <?php include 'func/cursos.php';?>
    <?php include 'func/surveyset.php';?>
    <?php

       require("../dev/conectar.php");
   


    $sqlCliente   = ("SELECT * FROM usuarios where usuarios.fkidTipoUsuario=2; ");
    $queryCliente = mysqli_query($conn, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    ?>


    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Capacitadores</h1>

            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Capacitadores</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>
          <div class="row">
                <div class="col-md-12 p-2">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
<!--'meri<<'-->
                            <td><b><?php echo $dataCliente['cNombreLargo']; ?><b></td>

                            <td><?php echo $dataCliente['cCorreo']; ?></td>
                            <?php if($dataCliente['iEstatus']==1) {?> 
                              <td><span  class="badge badge-success" > <a class="text-white" href="func/actualizarStatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=1">Activo<a></span></td> 
                            <?php }?> 
                            <?php if($dataCliente['iEstatus']==0) {?> 
                              <td><span  class="badge badge-danger"><a class="text-white" href="func/actualizarStatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=0">Inactivo</a></span></td> 
                            <?php }?> 
                            <td>
                              <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Eliminar
                              </button> -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Modificar
                              </button>
                              <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#cursomodal<?php echo $dataCliente['iIdUsuario']; ?>">
                                Agregar Curso
                              </button>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalsurvey<?php echo $dataCliente['iIdUsuario']; ?>">
                                Agregar Encuesta
                              </button>
                            </td>
                           <tr>
                            <?php   echo ''.cursodeusuario($dataCliente["iIdUsuario"]).'';?>
                            </tr> 
                            <tr>
                            <?php   echo ''.surveyactive($dataCliente["iIdUsuario"]).'';?>
                            </tr> 

                          </tr>
           

                              <!--Ventana Modal para Actualizar--->
                              <?php include('ModalEditar.php'); ?>
                              <!--Ventana Modal para la Alerta de Eliminar--->
                              <?php include('ModalEliminar.php'); ?>
                              <!--Ventana Modal para Agregar Encuesta--->
                              <?php include('ModalSurvey.php'); ?>
                              <!--Ventana Modal para Agregar Curso--->
                              <?php include('ModalCurso.php'); ?>

                         

                        <?php } ?>

                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
       
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>¿Estas seguro que deseas cerrar sesion?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                        <a href="../account/login.html" class="btn btn-primary">Cerrar Sesión</a>
                      </div>
                    </div>
                  </div>
          </div> 
                            
        </div>
         
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continuar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://desetecnologias.net/" target="_blank">Dese Tecnologias</a></b>
            </span>
          </div>
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
