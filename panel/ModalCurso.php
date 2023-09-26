<div class="modal fade" id="cursomodal<?php echo $dataCliente['iIdUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Asignar Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form name="frmAgregar" method="post" action="func/agregarcurso.php">  
                    <div class="modal-body">
                    <label for="curso-names">Seleccione curso a Asignar:</label> 
                    <input type="hidden" name="idmaestro" value=<?php echo $dataCliente['iIdUsuario']; ?> />
                    <select name="cursoselect" id="cursoselect">
                        <!--?php listcurso()?--> 
                        <option value='1'>Productividad Laboral</option>
                        <option value='2'>Habilidades Blandas</option>
                        <option value='3'>Habilidades Digitales</option>
                        <option value='4'>Psicología</option>
                        <option value='5'>Salud, Higiene y Seguridad</option>
                        <option value='6'>Cultura Jurídica / derecho empresarial y corporativo</option>
                        <option value='7'>Finanzas</option>
                    </select>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary"  id ="btnAsignar" name ="btnAsignar" onclick="guardado_correctamente()" >Agregar</button>
                    <a  class="btn btn-outline-primary" data-dismiss="modal">Salir</a>
                    </div>
                </form>    
            </div>
    </div>
<div>

<script>
  function guardado_correctamente() {
    Swal.fire(
  '¡Operación Exitosa!',
  'Se a agregado correctamente.',
  'success'
)
  }

  </script>