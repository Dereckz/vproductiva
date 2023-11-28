


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
    width: 200px;
    word-wrap: break-word;
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

  <?php include 'func/cursosa.php';?>
  <?php include 'func/surveyset.php';?>
  <?php
  require("../dev/conectar.php");

    $sqlCliente   = ("SELECT * FROM usuarios where usuarios.fkidTipoUsuario=3; ");
    $queryCliente = mysqli_query($conn, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    ?>

    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Alumnos</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>
          <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Acción</th>
                          <th scope="col">Tiempo de Conexión</th>
                          <th scope="col">Ultima de Conexión</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>

                            <td><?php echo strtoupper($dataCliente['cNombreLargo']); ?></td>

                            <td><?php echo $dataCliente['cCorreo']; ?></td>
                            <?php if($dataCliente['iEstatus']==1) {?> 
                              <td><span  class="badge badge-success" > <a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=1">Activo<a></span></td> 
                            <?php }?> 
                            <?php if($dataCliente['iEstatus']==0) {?> 
                              <td><span  class="badge badge-danger"><a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=0">Inactivo</a></span></td> 
                            <?php }?> 
                            <td>
                          <!--    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Eliminar
                              </button> -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Modificar
                              </button>
                              <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#cursomodal<?php echo $dataCliente['iIdUsuario']; ?>">
                                Agregar Curso
                              </button>
                              
                            </td>
                          
                            <?php 
                            $sqlacceso   = ("SELECT * FROM accesos where idUsuario=".$dataCliente['iIdUsuario']." ORDER BY dFechaAcceso DESC LIMIT 1;");
                            $queryacceso = mysqli_query($conn, $sqlacceso);
                            while ($dataacceso = mysqli_fetch_array($queryacceso)) {
                              $fechaInicio = new DateTime($dataacceso['dFechaAcceso']);
                              $fechaFin = new DateTime($dataacceso['dFechaCierre']);
                              $intervalo = $fechaInicio->diff($fechaFin);
                              ?>

                            <td><?php echo $intervalo->h . " horas, " . $intervalo->i . " minutos y " . $intervalo->s . " segundos"; ?></td>
                            <td><?php echo $dataacceso['dFechaAcceso']; ?></td>
                           <?php }?>
                           
                          </tr>
           

                              <!--Ventana Modal para Actualizar--->
                              <?php include('ModalEditar.php'); ?>
                              <!--Ventana Modal para la Alerta de Eliminar--->
                              <?php include('ModalEliminar.php'); ?>
                              <!--Ventana Modal para Agregar Curso--->
                              <?php include('ModalCurso.php'); ?>

                         

                        <?php } ?>

                    </table>
                  </div>
                <div class="card-footer"></div>
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
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
        //Ocultar mensaje
        setTimeout(function() {
          $("#contenMsjs").fadeOut(1000);
        }, 3000);

        $('.btnBorrar').click(function(e) {
          e.preventDefault();
          var id = $(this).attr("id");

          var dataString = 'id=' + id;
          url = "func/deleteusers.php";
          $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function(data) {
              window.location.href = "alumnos.php";
             $('#respuesta').html(data);
             alert (‘ mensaje de texto‘)
            }
          });
          return false;

        });


      });
    </script>

<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
