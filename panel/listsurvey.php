
<?php include 'func/profile.php';?>
<?php include 'func/survey.php';?>
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
            <a class="collapse-item" href="instructor.php">Administrar</a>
           <!--  <a class="collapse-item" href="buttons.html">Asignar Curso</a> -->
          <!--   <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
            <a class="collapse-item" href="modals.html">Modals</a>
            <a class="collapse-item" href="popovers.html">Popovers</a>
            <a class="collapse-item" href="progress-bar.html">Progress Bars</a>S -->
          </div>
        </div>
      </li>
      <li class="nav-item" >
        <a  class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap2" >
          <i class="far fa-fw fa-window-maximize"></i>
          <span > Alumnos</span>
        </a>
          <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" >Alumnos</h6>
           <a class="collapse-item" href="alumnos.php">Administrar</a> 
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
            <a class="collapse-item" href="listsurvey.php">Listar Encuesta</a>
            <a class="collapse-item" href="new_survey.php" >Administrar Encuestas</a>
          </div>
        </div>
      </li>

  
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
                  <i class="fas fa-
                  sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
            <h1 class="h3 mb-0 text-gray-800">Encuestas</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Encuestas</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>

          <!-- Row -->
          <?php include "..\dev\conectar.php"; ?>
              <div class="col-lg-12">
                <div class="card card-outline card-primary">
                  <div class="card-header">
                    <div class="card-tools">
                      <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./new_survey2.php?page=new_survey"><i class="fa fa-plus"></i> Add New Survey</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                      <colgroup>
                        <col width="5%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="15%">
                      </colgroup>
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT * FROM survey_set order by date(start_date) asc,date(end_date) asc ");
                        while($row= $qry->fetch_assoc()):
                        ?>
                        <tr>
                          <th class="text-center"><?php echo $i++ ?></th>
                          <td><b><?php echo ucwords($row['title']) ?></b></td>
                          <td><b class="truncate"><?php echo $row['description'] ?></b></td>
                          <td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
                          <td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
                          <td class="text-center">
                                <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        Action
                                      </button>
                                      <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_survey" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                                      </div> -->
                                      <div class="btn-group">
                                         <!--  <a href="edit_survey.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat"> -->
                                         <a href="new_survey.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">   
                                         <i class="fas fa-edit"></i>
                                          </a>
                                          <a  href="./view_survey.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-flat">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                          <button type="button" class="btn btn-danger btn-flat delete_survey" data-id="<?php echo $row['id'] ?>">
                                            <i class="fas fa-trash"></i>
                                          </button>
                                      </div>
                          </td>
                        </tr>	
                      <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <script>
                  $(document).ready(function(){
                    $('#list').dataTable()
                  $('.delete_survey').click(function(){
                  _conf("Are you sure to delete this survey?","delete_survey",[$(this).attr('data-id')])
                  })
                  })
                  function delete_survey($id){
                    start_load()
                    $.ajax({
                      url:'ajax.php?action=delete_survey',
                      method:'POST',
                      data:{id:$id},
                      success:function(resp){
                        if(resp==1){
                          alert_toast("Data successfully deleted",'success')
                          setTimeout(function(){
                            location.reload()
                          },1500)

                        }
                      }
                    })
                  }
              </script>

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

                    <!--modal agregar encuesta-->
         
          <div class="modal fade" id="surveyaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Agregar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="fl titulo">
                  <label>Titulo:</label>
                  <input name="titulo" type="text" size="26">
                </div>
              </div>
            </div>
          </div> 
        
        <!---Container Fluid-->
      </div>
            
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://desetecnologias.net/" target="_blank">Dese Tecnologias</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>