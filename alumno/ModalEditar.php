<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
                  <label for="recipient-name" class="col-form-label">Telefono:</label>
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
                   <div>
                   <select name="empresa" id="empresa">
                          <option>Empresa procedente</option>
                            <?php
                                require("../dev/conectar.php");
                                $dataempresa = mysqli_query($conn,"SELECT * FROM empresa");
                                $empresaasignada=mysqli_query($conn, "SELECT * FROM empresa e
                                inner join usuarios u
                                on e.idempresa=u.fkidempresa
                                where u.iIdUsuario=".$consulta['iIdUsuario']);
                                $infoempresa = mysqli_fetch_array($empresaasignada);
                                while ($empresa = mysqli_fetch_array($dataempresa)) { 
                                  if($infoempresa["idempresa"]==$empresa['idempresa']){
                                    echo '<option selected="true" value="'.$empresa['idempresa'].'">'.$empresa['nombre'].'</option>';
                                  }else{
                                  echo '<option value="'.$empresa['idempresa'].'">'.$empresa['nombre'].'</option>';
                                }
                                }
                            ?>
                      </select>
                   </div> 
                 
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary"   onclick="guardado_correctamente()">Guardar Cambios</button>
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