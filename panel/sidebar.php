
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #563d7c">
    <div class="dropdown">
   	<a href="" class="brand-link" data-toggle="dropdown" aria-expanded="true" style="background-color: #563d7c">

        <!-- <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 38px;height:50px"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0,1).substr($_SESSION['login_lastname'], 0,1)) ?></span> -->
        <span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['Nombre']. ' '.$_SESSION['ApellidoP']) ?></span>

      </a>
      
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>    
        <?php if($_SESSION['Tipo'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="instructor.php" class="nav-link nav-new_user tree-item">

                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Capacitador </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="alumnos.php" class="nav-link nav-user_list tree-item">

                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Alumnos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_survey nav-view_survey">
              <i class="nav-icon fa fa-poll-h"></i>
              <p>
                Encuestas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./panel.php?page=new_survey" class="nav-link nav-new_survey tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Agregar Nueva Encuesta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./panel.php?page=survey_list" class="nav-link nav-survey_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Administrar</p>

                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_survey nav-view_survey">
            <i class="bi bi-person-lines-fill"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
</svg></i>
              <p>
                Contacto
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="./contacto.php" class="nav-link nav-new_survey tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>contacto</p>
                </a>
              </li>
             
            </ul>
          </li>

        
         
        
          <li class="nav-item">
            <a href="./panel.php?page=survey_report" class="nav-link nav-survey_report">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Reporte de Encuesta
              </p>
            </a>
          </li>     
        <?php else: ?>
          <li class="nav-item">
            <a href="./panel.php?page=survey_widget" class="nav-link nav-survey_widget nav-answer_survey">
              <i class="nav-icon fas fa-poll-h"></i>
              <p>
                Lista de Encuestas
              </p>
            </a>
          </li>  
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
  </script>