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
  div.cardgroup{
    padding-top: 50px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 50px;
  }

  table{
      table-layout: fixed;
      width: 250px;
  }
  
  th, td {
      width: 100px;
      word-wrap: break-word;
  }
</style>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

  
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

    <?php
     require("../dev/conectar.php");

      $sqlCliente   = ("SELECT * FROM usuarios where usuarios.fkidTipoUsuario=2; ");
      $queryCliente = mysqli_query($conn, $sqlCliente);
      $cantidad     = mysqli_num_rows($queryCliente);
    ?>


    <!-- Main content -->

    <?php include 'func/cursos.php';?>
    <?php include 'func/detalleuser.php';?>
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Informacion General</h1>

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Panel</li>
            </ol>
          </div>
        
          <div class="row" style="padding-left: 50px;">
            
            
           <?php  $resultado = mysqli_query($conn, "SELECT * FROM areacurso"); ?>

          
              <?php  while ($consulta = mysqli_fetch_array($resultado)) {
                    $IdCurso=$consulta["iIdCurso"]; ?>

              <div class="card" style="width: 15rem; padding-right: 1%">
                <img width="300" height="200"  src="<?php echo $consulta["ricono"]?>"class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $consulta["cNombreCurso"]?></h5>
                 <!--  <p class="card-text"><?php echo $consulta["cDescripcion"]?></p> -->
                
                </div>
              </div>
          
     
            <?php } ?>
                 
          </div>
          <!-- ?php curseactive();?-->

                <div class="col-md-12 p-2">
         
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Genero</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo strtoupper($dataCliente['cNombreLargo']); ?></td>
                            <td><?php echo $dataCliente['cCorreo']; ?></td>
                            <?php if($dataCliente['iEstatus']==1) {?> 
                              <td><span  class="badge badge-success" > <a class="text-white" href="/func/actualizarStatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=1">Activo<a></span></td> 
                            <?php }?> 
                            <?php if($dataCliente['iEstatus']==0) {?> 
                              <td><span  class="badge badge-danger"><a class="text-white" href="/func/actualizarStatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=0">Inactivo</a></span></td> 
                            <?php }?> 
                            <td><?php echo $dataCliente['cTelefono']; ?></td>
                            <?php if($dataCliente['iGenero']==0) {?> 
                            <td>Femenino</td>
                            <?php }?> 
                            <?php if($dataCliente['iGenero']==1) {?> 
                            <td>Masculino</td>
                            <?php }?> 
                            <?php if($dataCliente['iGenero']>=2) {?> 
                            <td>No definido</td>
                            <?php }?> 
                           <tr>
                            <?php   echo ''.cursodeusuario($dataCliente["iIdUsuario"]).'';?>
                            </tr> 

                          </tr>
                           
                        <?php } ?>

                    </table>
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
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://desetecnologias.net/" target="_blank">Dese Tecnologias</a></b>
            </span>
          </div>
        </div>
    </footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<

<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
