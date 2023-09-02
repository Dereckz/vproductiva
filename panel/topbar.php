
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <a class="nav-link text-white"  href="./" role="button"> <large><b>Dashboard Admin</b></large></a>
      </li>
    </ul>
         
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
            <!--Sliderbar name user-->
            <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php include 'func/profile.php';?>
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
  <!-- /.navbar -->
