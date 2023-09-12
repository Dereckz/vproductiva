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

    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
 
    <?php include 'func/cursos.php';?>
    <?php include 'func/detalleuser.php';?>
<style>
  .container{
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px 30px;
  border-radius: 5px;
}

.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
  margin-bottom: 10px;
}

.container .title::before{
  content: '';
  position: absolute;
  margin-top: 5px;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  
}
.container form .account-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

form .account-details .form-group{
  margin-bottom: 15px;
  width: 100%;
  margin-right: 20px;
}
.account-details .form-group .form-title{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.account-details .form-group input{
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 1px;
  transition: all 0.3s ease;
}

.container form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

form .user-details .form-group{
  width: calc(100% / 3 - 25px);
  margin-right: 20px;
}

.user-details .form-group .form-title{
  font-weight: 500;
  margin-bottom: 5px;
}

.user-details .form-group input{
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 1px;
  transition: all 0.3s ease;
  margin-bottom: 10px;
}

.form-group input:focus,
.form-group input:valid{
  border-color: #2e8b57;
}



form .button{
  height: 45px;
  margin: 45px 0;
}

form .button input{
  height: 100%;
  width: 100%;
  outline: none;
  color: #fff;
  border: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 5px;
  letter-spacing: 1px;
  background: #007bff;
}

form .button input::hover{
  background: #3cb371;
}

@media(max-width: 584px){
  .container{
    max-width: 100%;
  }
  form .account-details .form-group{
    margin-bottom: 15px;
    width: 100%;
  }
  form .user-details .form-group{
    margin-bottom: 15px;
    width: 100%;
  }
  form .form-radio .category{
    width: 100%;
  }
  .container{
    max-height: 300px;
    overflow-y: scroll;
  }
}
.gender {
  display: light;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */


</style>

    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 ">Instructores</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Instructor</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>

          <?php 
              include "..\dev\conectar.php";
                  
              $resultado = mysqli_query($conn, "SELECT * FROM usuarios where usuarios.iIdUsuario=".$_GET["idu"].";");
              
              while ($consulta = mysqli_fetch_array($resultado)) {
              ?>
              

          <div class="container" id="container">
            <div class="title">Editar</div>
            <form action="" id="users">
              
              <div class="account-details">
                <div class="form-group">
                  <label class="form-title" for="">Email</label>
                  <?php  echo '  <input type="email" value="'.$consulta["cCorreo"].'" name="email" required> ' ?>
                 
                </div>
                <div class="form-group">
                  <label class="form-title" for="">Password</label>
                  <input type="password"  name="password" placeholder="Enter your password" required>
                </div>
            
              </div>
              
              <div class="user-details">
                <div class="form-group">
                  <label class="form-title" for="">Nombre(s)</label>
               <?php  echo '<input type="text" name="nombre" id="Nombre" placeholder="Enter first name" value="'.$consulta["cNombre"].'" required>' ?>
                </div>
                <div class="form-group">
                  <label class="form-title" for="">Apellido Paterno</label>
                  <?php  echo '<input type="text" name="app" placeholder="Enter middle name" value="'.$consulta["cApellidoP"].'" required>' ?>
                </div>
                <div class="form-group">
                  <label class="form-title" for="">Apellido Materno</label>
                  <?php  echo ' <input type="text" name="apm" placeholder="Enter last name" value="'.$consulta["cApellidoM"].'" required>' ?>
                </div>
              </div>

       
              <div>
                  <label class="gender">Masculino  &nbsp;
                  <?php 
                    if ($consulta["iGenero"]==0){
                      echo ' <input type="radio"  name="radio" checked=true>';
                    }else
                    {
                      echo ' <input type="radio"  name="radio" >';
                    }
                    ?>
               
                <span class="checkmark"></span>
              </label>
                  
              <label class="gender">Femenino  &nbsp;
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
                  <label class="gender">No especificar
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
              </div>

        <div class="form-group">
            <label class="form-title" for="">Fecha de alta</label>
            <input type="date" >
          </div>

          <?php 
              }
            ?>
        <div class="button">
          <input type="submit" value="Actualizar">
        </div>
      </form>
    </div>

     </div>          
    </div>
          

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabelLogout"
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

        </div>
         

  </div>


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

<
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
