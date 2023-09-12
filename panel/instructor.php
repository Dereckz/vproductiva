


<!DOCTYPE html>
<html lang="en">
<link href="../img/LOGOVP.ico" rel="icon">
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['id']))
	    header('location:login.php');
	include 'header.php' 
?>
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
    <?php include 'func/detalleuser.php';?>
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
<<<<<<< HEAD
            <h1 class="h3 ">Instructores</h1>
=======
            <h1 class="h3 mb-0 text-gray-800">Capacitadores</h1>
>>>>>>> origin/master
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Instructor</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>
          <div class="row">
          <div class="table-responsive">
                  <table id="idinstructor"class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Instructor</th>
                        <th>Estatus</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  detalleinstructor(); ?>
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
                        <a href="http://localhost/vproductivam/account/login.html" class="btn btn-primary">Cerrar Sesión</a>
                      </div>
                    </div>
                  </div>
                </div> 

          <!--modal agregar curso-->
         
          <div class="modal fade" id="cursomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Asignar Curso</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <form name="frmAgregar" method="post" action="http://localhost/vproductivam/panel/func/agregarcurso.php">  
                <div class="modal-body">
                <label for="curso-names">Seleccione curso a Asignar:</label> 
                <select name="cursoselect" id="cursoselect">
                      <!--?php listcurso()?--> 
                      <option value='1'>Productividad Laboral</option>
                      <option value='2'>Habilidades Blandas</option>
                      <option value='3'>Habilidades Digitales</option>
                      <option value='4'>Psicología</option>
                      <option value='5'>Salud, Higiene y Seguridad</option>
                      <option value='6'>Cultura Jurídica / derecho empresarial y corporativo</option>
                      <option value='7'>Finanzas</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-primary"  id ="btnAsignar" name ="btnAsignar"  >Agregar</button>
                  <a  class="btn btn-outline-primary" data-dismiss="modal">Salir</a>
                </div>
            </form>    
              </div>
            </div>
          </div>    
        </div>

        <!--Modal añadir Entrevista -->
        <div class="modal fade" id="surveymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Mandar Encuesta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <form name="frmSurveySet" method="post" action="http://localhost/vproductivam/panel/func/agregarsurvey.php">  
                        <div class="modal-body">
                        <label for="curso-names">Marque encuesta(s):</label> 
                       <div>
                         <?php showAllSurvey() ?> 
                       </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-outline-primary"  id ="btnSurvey" name ="btnSurvey"  >Agregar</button>
                          <a  class="btn btn-outline-primary" data-dismiss="modal">Salir</a>
                        </div>
                    </form>    
              </div>
            </div>
          </div>
          
                <!--Modal editar trabajador -->
        <div class="modal fade" id="usermodal" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Editar Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" id="manage-user">	
                <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
                          <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="name">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>">
                          </div>
                          <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required  autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                            <small><i>Leave this blank if you dont want to change the password.</i></small>
                          </div>
                      <div>

                      <div class="modal-footer">
                          <button type="submit" class="btn btn-outline-primary"  id ="btnSurvey" name ="btnSurvey"  >Agregar</button>
                          <a  class="btn btn-outline-primary" data-dismiss="modal">Salir</a>
                        </div>
	              </form>  
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
<script> 
// MiFuncionJS(){
//     Swal.fire(
//             'Operacion Exitosa',
//             '¡Se mando encuesta Correctamente!',
//             'success'
//           );
// }
      const table = document.getElementById("idinstructor");
      const modal = document.getElementById("manage-user");
      window.addEventListener("click", (e) => {
        console.log(e.target)
      });
    

    
  </script>
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
