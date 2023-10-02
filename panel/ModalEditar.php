<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['iIdUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="func/actualizaruser.php">
        <input type="hidden" name="idusuario" value="<?php echo $dataCliente['iIdUsuario']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre(s):</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $dataCliente['cNombre']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                  <input type="text" name="app" class="form-control" value="<?php echo $dataCliente['cApellidoP']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                  <input type="text" name="apm" class="form-control" value="<?php echo $dataCliente['cApellidoM']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Correo:</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $dataCliente['cCorreo']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="password" name="password" class="form-control" value="" >
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Telefono:</label>
                  <input type="number" name="celular" class="form-control" value="<?php echo $dataCliente['cTelefono']; ?>" >
                </div>
                <div>
                  <?php 
                    
                    if ($dataCliente["iGenero"]==0){
                      echo ' 
                      <input type="radio" name="radio" value="0" > Masculino<br>
                      <input type="radio" name="radio" value="1" checked=true> Femenino<br>
                      <input type="radio" name="radio" value="2"> No especificar<br>';
                    }elseif($dataCliente["iGenero"]==1){
                        echo ' 
                        <input type="radio" name="radio" value="0" checked=true> Masculino<br>
                        <input type="radio" name="radio" value="1"> Femenino<br>
                        <input type="radio" name="radio" value="2"> No especificar<br>';
                      }else{
                        echo ' 
                        <input type="radio" name="radio" value="0" > Masculino<br>
                        <input type="radio" name="radio" value="1"> Femenino<br>
                        <input type="radio" name="radio" value="2" checked=true> No especificar<br>';
                      }
                    
                    ?>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="">Fecha de alta</label>
                          <?php
                          echo '  <input type="date" name="fechaalta" class="form-control" value="'.$dataCliente["dFechaAlta"].'">';
                        ?>
                    </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" onclick="guardado_correctamente()">Guardar Cambios</button>
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
  'Se a actualizado correctamente.',
  'success'
)
  }

  </script>