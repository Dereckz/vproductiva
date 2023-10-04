
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark " style="background-color: #563d7c">

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
            <!--Sliderbar name user--> 
            <?php include 'func/profile.php';?>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li> 
              <li class="nav-item dropdown no-arrow">
             
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                     
                      <?php sessionuser()?>
                    </a>
             
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    
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