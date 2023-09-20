
   
<div>
                  <?php 
                  $answers = $conn->query("SELECT distinct(survey_id) from answers where user_id ={$_SESSION['id']}");
                  $ans = array();
                  while($row=$answers->fetch_assoc()){
                    $ans[$row['survey_id']] = 1;
                  }
                  ?>
                  <div class="col-lg-12">

                    <div class="row">
                      <?php 
                      $survey = $conn->query("SELECT * FROM survey_set 
                                                INNER JOIN detallesurvey on survey_set.id=detallesurvey.idSurvey 
                                                WHERE '".date('Y-m-d')."' between date(start_date) and date(end_date)
                                                and detallesurvey.idUsuario={$_SESSION['id']}");
                      while($row=$survey->fetch_assoc()):
                      ?>
                      <div class="col-md-3 py-1 px-1 survey-item">
                        <div class="card card-outline card-primary">
                                <div class="card-header">
                                <table id=tablaencuestas>
                                <tr><td id="tituloencuesta"><h3 class="card-title"><?php echo ucwords($row['title']) ?></h3></td>
                                    <td rowspan=2><div class="d-flex justify-content-center w-100 text-center " >
                                    <?php if(!isset($ans[$row['id']])): ?>
                                      <a id="tomarencuesta" class=buttonen href="answer_survey.php?id=<?php echo $row['id'] ?>" >Tomar Encuesta</a></td></tr>
                                    <?php else: ?>
                                      <p class="text-primary border-top border-primary" id=encuestarealizada>Realizada</p></td></tr>
                                    <?php endif; ?>
                                  </div>
                                  <!--<div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus">-</i>
                                    </button>
                                  </div>-->
                                </div>
                                <div class="card-body" style="display: block;">
                                <tr><td id="descripcion"><?php echo $row['description'] ?></td></tr>
                                <div class="row">
                                  <hr class="border-primary">
                                  
                                </div>
                                </div>
                                </table>
                              </div>
                      </div>
                    <?php endwhile; ?>
                    </div>
                  </div>
                  <script>
                    function find_survey(){
                      start_load()
                      var filter = $('#filter').val()
                        filter = filter.toLowerCase()
                        console.log(filter)
                      $('.survey-item').each(function(){
                        var txt = $(this).text()
                        if((txt.toLowerCase()).includes(filter) == true){
                          $(this).toggle(true)
                        }else{
                          $(this).toggle(false)
                        }
                        if($('.survey-item:visible').length <= 0){
                          $('#ns').show()
                        }else{
                          $('#ns').hide()
                        }
                      })
                      end_load()
                    }
                    $('#search').click(function(){
                      find_survey()
                    })
                    $('#filter').keypress(function(e){
                      if(e.which == 13){
                      find_survey()
                      return false;
                      }
                    })
                  </script>
       
                  </div>