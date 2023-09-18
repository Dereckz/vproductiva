<!-- Ventana modal para eliminar -->
<div class="modal fade" id="modalsurvey<?php echo $dataCliente['iIdUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                Seleccione encuesta que desea asignar 
            </h4>
        </div>
         
                  <form name="frmSurveySet" method="post" action="func/agregarsurvey.php">  
                    <div class="modal-body">
                            <label for="curso-names">Marque encuesta(s):</label> 
                            <div>
                                <?php showAllSurvey() ?> 
                            </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-outline-primary"  id ="btnSurvey" name ="btnSurvey"  >Agregar</button>
                          <a  class="btn btn-outline-primary" data-dismiss="modal">Salir</a>
                        </div>
                    </form> 
             
        </div>
      </div>
</div>
<!---fin ventana eliminar--->