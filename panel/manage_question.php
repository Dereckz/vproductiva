
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
  <link href="https://harvesthq.github.io/chosen/chosen.css" rel="stylesheet"/>
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
            <a class="collapse-item" href="encuestas.php">Administrar Encuestas</a>
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
            <h1 class="h3 mb-0 text-gray-800">Encuestas</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Encuestas</li>
              <li class="breadcrumb-item active" aria-current="page">Administrar</li>
            </ol>
          </div>

      <!-- Row -->   

      <?php include '..\dev\conectar.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM questions where id = ".$_GET['id'])->fetch_array();
	if  (!is_null($qry)){
		foreach($qry as $k => $v){
			$$k = $v;
		}			
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-question">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-sm-6 border-right">
						<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
						<input type="hidden" name="sid" value="<?php echo isset($_GET['sid']) ? $_GET['sid'] : '' ?>">
						<div class="form-group">
							<label for="" class="control-label">Preguntas</label>
							<textarea name="question" id="" cols="30" rows="4" class="form-control"><?php echo isset($question)? $question: '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Tipo de respuesta a la pregunta</label>
							<select name="type" id="type" class="custom-select custom-select-sm" onchange="mostrarInputs(this.value)">
								<?php if(isset($id)): ?>
								<option value="" disabled="" selected="">Porfavor selecciona aqui</option>
								<?php endif; ?>
                <option value="" disabled="" selected="">Porfavor selecciona aqui</option>
								<option value="radio_opt" <?php echo isset($type) && $type == 'radio_opt' ? 'selected':'' ?>> Respuesta Única /Radio Button</option>
								<option value="check_opt" <?php echo isset($type) && $type == 'check_opt' ? 'selected':'' ?>> Multiple Respuesta/Check Boxes</option>
								<option value="textfield_s" <?php echo isset($type) && $type == 'textfield_s' ? 'selected':'' ?>> Campo de Texto/ Text Area</option>
							</select>
						</div>
				</div>
					
				<div class="col-sm-6">
						<b>Preview</b>
					<div class="preview">
						<div id="tituloinicio">
            <p ><b>Selecciona la pregunta para las respuestas primero.</b></p>
            </div>
						

              <script>

								function mostrarInputs(dato) {
									
										if (dato == 'radio_opt') {
                      $('#tituloinicio').hide()
                      $("#radio_opt_clone").show();
                      $("#textfield_s_clone").hide();
                      $("#check_opt_clone").hide();
		 										 
										}
										 if	(dato == 'check_opt')
										{
                      $('#tituloinicio').hide()
                      $("#radio_opt_clone").hide();
                      $("#textfield_s_clone").hide();
                      $("#check_opt_clone").show();
										}
										 if (dato == 'textfield_s')
										{
                      $('#tituloinicio').hide()
                      $("#radio_opt_clone").hide();
                      $("#textfield_s_clone").show();
                      $("#check_opt_clone").hide();
										
										}

										
									}
								</script>
                 
                <div id="check_opt_clone"  style="display:none">
                <div class="callout callout-info">
                    <table width="100%" class="table">
                      <colgroup>
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                      </colgroup>
                      <thead>
                        <tr class="">
                          <th class="text-center"></th>

                          <th class="text-center">
                            <label for="" class="control-label">Etiqueta</label>
                          </th>
                          <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                          <td class="text-center">
                            <div class="icheck-primary d-inline" data-count = '1'>
                              <input type="checkbox" id="checkboxPrimary1" checked="">
                              <label for="checkboxPrimary1">
                              </label>
                            </div>
                          </td>

                          <td class="text-center">
                            <input type="text" class="form-control form-control-sm check_inp" name="label[]">
                          </td>
                          <td class="text-center"></td>
                      </tr>
                      <tr class="">
                          <td class="text-center">
                            <div class="icheck-primary d-inline" data-count = '2'>
                              <input type="checkbox" id="checkboxPrimary2" >
                              <label for="checkboxPrimary2">
                              </label>
                            </div>
                          </td>

                          <td class="text-center">
                            <input type="text" class="form-control form-control-sm check_inp" name="label[]">
                          </td>
                          <td class="text-center"></td>
                      </tr>
                    </tbody>
                    </table>
                    <div class="row">
                    <div class="col-sm-12 text-center">
                      <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))"><i class="fa fa-plus"></i> Add</button>
                    </div>
                    </div>
                  </div>
              </div>
              <div id="radio_opt_clone" style="display: none">
                <div class="callout callout-info">
                    <table width="100%" class="table">
                      <colgroup>
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                      </colgroup>
                      <thead>
                        <tr class="">
                          <th class="text-center"></th>

                          <th class="text-center">
                            <label for="" class="control-label">Etiqueta</label>
                          </th>
                          <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                          <td class="text-center">
                            <div class="icheck-primary d-inline" data-count = '1'>
                              <input type="radio" id="radioPrimary1" name="radio" checked="">
                              <label for="radioPrimary1">
                              </label>
                            </div>
                          </td>

                          <td class="text-center">
                            <input type="text" class="form-control form-control-sm check_inp"  name="label[]">
                          </td>
                          <td class="text-center"></td>
                      </tr>
                      <tr class="">
                          <td class="text-center">
                            <div class="icheck-primary d-inline" data-count = '2'>
                              <input type="radio" id="radioPrimary2" name="radio" >
                              <label for="radioPrimary2">
                              </label>
                            </div>
                          </td>

                          <td class="text-center">
                            <input type="text" class="form-control form-control-sm check_inp"  name="label[]">
                          </td>
                          <td class="text-center"></td>
                      </tr>
                    </tbody>
                    </table>
                    <div class="row">
                    <div class="col-sm-12 text-center">
                      <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))"><i class="fa fa-plus"></i> Agregar</button>
                    </div>
                    </div>
                  </div>
              </div>
              <div id="textfield_s_clone" style="display: none">
                <div class="callout callout-info">
                  <textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled=""  placeholder="Escribe algo aqui..."></textarea>
                </div>
              </div>

                  <div>
                  <a href="" id="add_question" onclick="add_question()" data-toggle="modal" class="btn btn-sm btn-primary">Agregar pregunta</a>
                  </div>
              </div>
            </div>
			   </div>
			</div>
		</div>
	</form>
</div>
<script>
  $(function add_question(){
    const type=document.querySelector("#type")
    $.ajax({
			url:'ajax.php?action=save_question',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
  })
</script>




<script>
	function new_check(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="checkbox" id="checkboxPrimary'+count+'"><label for="checkboxPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function new_radio(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="radio" id="radioPrimary'+count+'" name="radio"><label for="radioPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function check_opt(){
		var check_opt_clone = $('#check_opt_clone').clone()
		$('.preview').html(check_opt_clone.html())
	}
	function radio_opt(){
		var radio_opt_clone = $('#radio_opt_clone').clone()
		$('.preview').html(radio_opt_clone.html())
	}
	function textfield_s(){
		var textfield_s_clone = $('#textfield_s_clone').clone()
		$('.preview').html(textfield_s_clone.html())
	}
	$('[name="type"]').change(function(){
		window[$(this).val()]()
	})
	$(function () {
	$('#manage-question').submit(function(e){
		e.preventDefault()
		start_load()
		// $('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_question',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})

  })


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
         
          <div class="modal fade" id="surveyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="container-fluid">
	<form action="" id="manage-question">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-sm-6 border-right">
						<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
						<input type="hidden" name="sid" value="<?php echo isset($_GET['sid']) ? $_GET['sid'] : '' ?>">
						<div class="form-group">
							<label for="" class="control-label">Question</label>
							<textarea name="question" id="" cols="30" rows="4" class="form-control"><?php echo isset($question)? $question: '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Question Answer Type</label>
							<select name="type" id="type" class="custom-select custom-select-sm">
								<?php if(isset($id)): ?>
								<option value="" disabled="" selected="">Please Select here</option>
								<?php endif; ?>
								<option value="radio_opt" <?php echo isset($type) && $type == 'radio_opt' ? 'selected':'' ?>>Single Answer/Radio Button</option>
								<option value="check_opt" <?php echo isset($type) && $type == 'check_opt' ? 'selected':'' ?>>Multiple Answer/Check Boxes</option>
								<option value="textfield_s" <?php echo isset($type) && $type == 'textfield_s' ? 'selected':'' ?>>Text Field/ Text Area</option>
							</select>
						</div>
						
				</div>
				<div class="col-sm-6">
					<b>Preview</b>
					<div class="preview">
						<?php if(!isset($id)): ?>
						<p><b>Select Question Answer type first.</b></p>
						<?php else: ?>
							<div class="callout callout-info">
							<?php if($type != 'textfield_s'): 
								$opt= $type =='radio_opt' ? 'radio': 'checkbox';
							?>
						      <table width="100%" class="table">
						      	<colgroup>
						      		<col width="10%">
						      		<col width="80%">
						      		<col width="10%">
						      	</colgroup>
						      	<thead>
							      	<tr class="">
								      	<th class="text-center"></th>

								      	<th class="text-center">
								      		<label for="" class="control-label">Label</label>
								      	</th>
								      	<th class="text-center"></th>
							     	</tr>
						     	</thead>
						     	<tbody>
						     		<?php  
						     		$i = 0;
						     		foreach(json_decode($frm_option) as $k => $v):
						     			$i++;
						     		?>
						     		<tr class="">
								      	<td class="text-center">
								      		<div class="icheck-primary d-inline" data-count = '<?php echo $i ?>'>
									        	<input type="<?php echo $opt ?>" id="<?php echo $opt ?>Primary<?php echo $i ?>" name="<?php echo $opt ?>" checked="">
									        	<label for="<?php echo $opt ?>Primary<?php echo $i ?>">
									        	</label>
									        </div>
								      	</td>

								      	<td class="text-center">
								      		<input type="text" class="form-control form-control-sm check_inp"  name="label[]" value="<?php echo $v ?>">
								      	</td>
								      	<td class="text-center"></td>
							     	</tr>
						     		<?php  endforeach; ?>

						     	</tbody>
						      </table>
						      <div class="row">
						      <div class="col-sm-12 text-center">
						      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="<?php echo $type ?>($(this))"><i class="fa fa-plus"></i> Add</button>
						      </div>
						      </div>
						    </div>
						</div>

						<?php else: ?>
								<textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled="" placeholder="Write Something here..."></textarea>
						<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://harvesthq.github.io/chosen/docsupport/jquery-3.2.1.min.js"></script>
<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script>
  $(document).ready(function(){
	$('#manage_survey').submit(function(e){
    e.preventDefault();
        Swal.fire({
        title: 'Informacion Guardada',
        icon: 'success',
        width: 600,
        timer: 1500,
        padding: '3em',
        color: '#716add',
        backdrop: `
          rgba(0,0,123,0.4)
          left top
          no-repeat ` 
         }); 
    
	});
});
  </script> -->

</body>

</html>