<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
        $(document).ready(function(){

            $('.search-box input[type="text"]').on('keydown', function(e) {
            if(e.key == 'Enter' || e.key == 'Tab') {
              
                e.preventDefault();
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                  
                    resultDropdown.empty();
                }
            }
            $('#buscar').blur(function(){
        //Capturar el id del elemento que pierde el foco
        let idElemento = $(this).prop('id');
      // alert ("Has dejado de escribir "+idElemento);
        //Mostrar el id en consola
        var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
        $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
    });
    });
        });
</script>
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $consulta['iIdUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información.
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="func/actualizaruser.php">
      <div class="search-box">
        <input type="hidden" name="idusuario" value="<?php echo $consulta['iIdUsuario']; ?>">

            <div class="modal-body" id="cont_modal">
           
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre(s):</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $consulta['cNombre']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                  <input type="text" name="app" class="form-control" value="<?php echo $consulta['cApellidoP']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                  <input type="text" name="apm" class="form-control" value="<?php echo $consulta['cApellidoM']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Correo:</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $consulta['cCorreo']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Empresa Asociada:</label>
                   <input for="recipient-name" id="buscar" name="buscar" class="form-control" type="text" autocomplete="off" value="<?php echo  $nameempresa['nombre'] ?>" required oninvalid="setCustomValidity('Si no esta asociado a una, ingresa NA')" 
                    oninput="setCustomValidity('')"/>
                <div class="result"></div>
                <div>
                 <br>
                <div class="form-group">
                  <label  class="col-form-label">Telefono:</label>
                  <input type="number" name="celular" class="form-control" value="<?php echo $consulta['cTelefono']; ?>" >
                </div>
                <div class="form-group" hidden>
                  <label for="recipient-name" class="col-form-label">tipoususerio:</label>
                  <input type="text" name="tipo" class="form-control" value="<?php echo $consulta['fkidTipoUsuario']; ?>" >
                </div>
                <div>
       
                  <?php 
                    if ($consulta["iGenero"]==0){
                    
                      echo ' 
                      <input type="radio" name="radio" value="0" checked=true> Femenino<br>
                      <input type="radio" name="radio" value="1" > Masculino<br>
                      <input type="radio" name="radio" value="2"> No especificar<br>';
                    }elseif($consulta["iGenero"]==1){
                        echo ' 
                        <input type="radio" name="radio" value="0"> Femenino<br>
                        <input type="radio" name="radio" value="1" checked=true> Masculino<br>
                        <input type="radio" name="radio" value="2"> No especificar<br>';
                      }else{
                        echo ' 
                        <input type="radio" name="radio" value="0" > Masculino<br>
                        <input type="radio" name="radio" value="1"> Femenino<br>
                        <input type="radio" name="radio" value="2" checked=true> No especificar<br>';
                      }
                    
                    ?>
                    </div>
                    <br>
                </div>  
            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"   onclick="guardado_correctamente()">Guardar Cambios</button>
              </div>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
<script>
    function guardado_correctamente() {
      Swal.fire(
    '¡Operación Exitosa!',
    'Se a agregado correctamente.',
    'success'
  )
    }

  </script>