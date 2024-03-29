


<!DOCTYPE html>
<html lang="en">
<link href="../img/LOGOVP.ico" rel="icon">

  
<?php session_start() ?>
<?php 

  require("../dev/conectar.php");

	if(!isset($_SESSION['id']))
  header('location:../account/login.php');
	include 'header.php' 
?>
          <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
  

    $sqlCliente   = ("SELECT * FROM usuarios u
                      INNER JOIN empresa e on
                      u.fkidempresa=e.idempresa
                      where u.fkidTipoUsuario=3; ");
    $queryCliente = mysqli_query($conn, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    $usuariosal= array();
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
            <!-- links para exportar a excel -->
            <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
            <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
            <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
            <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

          <div>
          <?php $tipousuario =3?>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addInstructor<?php echo $tipousuario ?>">
              Agregar Nuevo
          </button>
            <button id="btnImprimir" class="btn btn-primary" onclick="window.print();">
            <i class="fas fa-print"></i> Imprimir P&aacute;gina
            </button>
         
            <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Exportar datos a Excel
            </button>
          </div>
         
          <div class="row">
            
                <div >
                <table id="tabla" class="table table-border table-hover">
                   <thead>
                        <tr>
                        
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Empresas</th>
                          <th scope="col">Acción</th> 
                          <th scope="col">Tiempo de Conexión</th>
                          <th scope="col">Ultima de Conexión</th>
                          <th scope="col" hidden>tipo</th>
                        </tr>
                  </thead>
                <tbody>
                
                <?php
                     while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                     
                          <tr>
                          
                            <td><?php echo strtoupper($dataCliente['cNombreLargo']); ?></td>

                            <td><?php echo $dataCliente['cCorreo']; ?></td>
                            <?php if($dataCliente['iEstatus']==1) {?> 
                              <td style="padding-left: 20px;"><span  class="badge badge-success" > <a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=1">Activo<a></span></td> 
                            <?php }?> 
                            <?php if($dataCliente['iEstatus']==0) {?> 
                              <td><span  class="badge badge-danger"><a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=0">Inactivo</a></span></td> 
                            <?php }?>
                           <td>
                           <?php if ($dataCliente['idempresa']==0){
                                echo "N/A"; 
                           } else{
                            echo $dataCliente['nombre']; 
                           }
                           ?>
                           </td>  
                            <td>
                        <!--  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Eliminar
                              </button>  -->
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
                            $rowsa=mysqli_num_rows($queryacceso);

                            if($rowsa>0){
                              while ($dataacceso = mysqli_fetch_array($queryacceso)) {
                                $fechaInicio = new DateTime($dataacceso['dFechaAcceso']);
                                $fechaFin = new DateTime($dataacceso['dFechaCierre']);
                                $intervalo = $fechaInicio->diff($fechaFin);  
                                $tiempodecoenxion=$intervalo->h . " horas, " . $intervalo->i . " minutos y " . $intervalo->s . " segundos";                                       
                              ?>
                              <td><?php echo $tiempodecoenxion ;?></td>
                              <td><?php echo $dataacceso['dFechaAcceso']; ?></td>
                              <td hidden>3</td>
                           <?php }   
                          }else{?>
                              <td>0</td>
                              <td>0000-00-00</td>
                              <td hidden>3</td>
                          <?php } ?>
                           
                          </tr>
                              <?php include('ModalAgregar.php'); ?>
                              <!--Ventana Modal para Actualizar--->
                              <?php include('ModalEditar.php'); ?>
                              <!--Ventana Modal para la Alerta de Eliminar--->
                              <?php include('ModalEliminar.php'); ?>
                              <!--Ventana Modal para Agregar Curso--->
                              <?php include('ModalCurso.php'); ?>
                <?php  }?>
                </tbody>
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
                        <a href="../account/login.php" class="btn btn-primary">Cerrar Sesión</a>
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

<!-- script para exportar a excel -->
<script>
  $(document).ready(function() {
    $('#tabla').DataTable({
           
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            }
        });
} );

    const $btnExportar = document.querySelector("#btnExportar"),
    $tabla = document.querySelector("#tabla");
    const fechaDeHoy = new Date();
   
    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte_Usuarios_Alumnos" , //Nombre del archivo de Excel
            sheetname: "Usuarios", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });


</script>

<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
