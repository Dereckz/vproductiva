<!-- Ventana modal para eliminar -->
<div class="modal fade" id="modalsurvey<?php echo $dataCliente['iIdUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                Seleccione encuesta que desea asignar 
            </h4>
        </div>
         
                <?php 
                 include "..\dev\conectar.php";
  
                 $resultado = mysqli_query($conn, "SELECT * FROM survey_set;");
                ?>
                  <form name="frmSurveySet" method="post" action="func/agregarsurvey.php">  
                    <div class="modal-body">
                            <label for="curso-names">Marque encuesta(s):</label> 
                            <div>
                            <input type="hidden" name="idmaestro" value=<?php echo $dataCliente['iIdUsuario']; ?> />
                                <?php   while ($datasurvey = mysqli_fetch_array($resultado)) { 
                                    $idSurvey=$datasurvey["id"];
                                    $title=$datasurvey["title"];
                                    ?>
                                <div>
                                    <label>
                                    <input type="checkbox" id="<?php echo $idSurvey ;?>" name="<?php echo $idSurvey ;?>"  /> 
                                    <?php echo $idSurvey.'.-'.$title; ?>
                                    </label>
                                </div>

                                <?php }?>
                                
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