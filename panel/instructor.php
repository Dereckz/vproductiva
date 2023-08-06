
<?php include 'func/profile.php';?>
<?php include 'func/cursos.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="dt">
  <link href="../img/LOGOVP.ico" rel="icon">
  <title>VP - Panel</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>


<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../img/logovproductiva_text.png">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Incio</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Instructor
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Instructor</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Instructor</h6>
            <a class="collapse-item" href="instructor.php">Agregar</a>
           <!-- a class="collapse-item" href="buttons.html">Listar</a> -->
          <!--   <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
            <a class="collapse-item" href="modals.html">Modals</a>
            <a class="collapse-item" href="popovers.html">Popovers</a>
            <a class="collapse-item" href="progress-bar.html">Progress Bars</a> -->
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap2">
          <i class="far fa-fw fa-window-maximize"></i>
          <span> Alumnos</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Alumnos</h6>
            <a class="collapse-item" href="alumnos.php">Agregar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Encuestas</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Encuestas</h6>
            <a class="collapse-item" href="form_basics.html">Crear Encuesta</a>
            <a class="collapse-item" href="form_advanceds.html">Administrar Encuestas</a>
          </div>
        </div>
      </li>


      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Examples
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Example Pages</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
 <!--Sliderbar name user-->
 <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               
            <?php sessionuser()?>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ajustes
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Instrcutores</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Bootstrap UI</li>
              <li class="breadcrumb-item active" aria-current="page">Alerts</li>
            </ol>
          </div>
          <div class="row">
          <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Instructor</th>
                        <th>Curso</th>
                        <th>Estatus</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  registercurso(); ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
           
            </div>
           <!--  <div class="col-lg-6"> -->
              <!-- div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Alert with link</h6>
                </div>
                <div class="card-body">
                  <div class="alert alert-primary" role="alert">
                    A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if
                    you like.
                  </div>
                  <div class="alert alert-secondary" role="alert">
                    A simple secondary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if
                    you like.
                  </div>
                  <div class="alert alert-success" role="alert">
                    A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if
                    you like.
                  </div>
                  <div class="alert alert-danger" role="alert">
                    A simple danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if
                    you like.
                  </div>
                  <div class="alert alert-warning" role="alert">
                    A simple warning alert with <a href="#" class="alert-link">an example link</a>. Give it a click if
                    you like.
                  </div>
                  <div class="alert alert-info" role="alert">
                    A simple info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you
                    like.
                  </div>
                  <div class="alert alert-light" role="alert">
                    A simple light alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you
                    like.
                  </div>
                  <div class="alert alert-dark" role="alert">
                    A simple dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you
                    like.
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Row -->
          <!-- More Documentations Link -->
         <!--  <div class="row">
            <div class="col-lg-12 text-center">
              <p>
                For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/alerts/"
                  target="_blank"> bootstrap alert documentations.</a>
              </p>
            </div>
          </div> -->
          <!-- More Documentations Link -->

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
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div> 

          <!--modal agregar curso-->
          <form name="frmAgregar" method="post" action="cursos.php">
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
                <div class="modal-body">
                <label for="curso-names">Seleccione curso a Asignar:</label> 
                <select name="curso" id="curso">
                  <?php listcurso()?>
                </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                  <a  class="btn btn-primary" id ="btnAsignar" name ="btnAsingar">Asignar</a>
                </div>
              </div>
            </div>
          </div> 
          </form>
        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

<script>
var select = document.getElementById('btnAsignar');
    select.addEventListener('change',
            function(){
              var selectedOption = this.options[select.selectedIndex];
              console.log(selectedOption.value + ': ' + selectedOption.text);
            });
</script>
</html>
