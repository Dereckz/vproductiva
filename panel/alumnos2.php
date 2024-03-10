<!doctype html>
<html lang="es">
<?php 

require("../dev/conectar.php");

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Como exportar html a excel</title>

    <!-- links para exportar a excel -->
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
<br><br>

<div class="container">
    <div class="card">
        <div class="card-header">
            Como exportar datos de html a excel
        </div>
        <div class="card-body">
            <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Exportar datos a Excel
            </button>
          <?php
          $sqlCliente   = ("SELECT * FROM usuarios u
          INNER JOIN empresa e on
          u.fkidempresa=e.idempresa
          where u.fkidTipoUsuario=3; ");
            $queryCliente = mysqli_query($conn, $sqlCliente);
            $cantidad     = mysqli_num_rows($queryCliente);
            $usuariosal= array();
          ?>  

            <table id="tabla" class="table table-border table-hover">
            <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Estatus</th>
                          <th scope="col">Empresas</th>
                         <th scope="col">Acción</th> 
                          <th scope="col">Tiempo de Conexión</th>
                          <th scope="col">Ultima de Conexión</th>
                        </tr>
                      </thead>
                <tbody>
                
                <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                        <?php $usuariosal[]=$dataCliente?>
                      
                          <tr>

                            <td><?php echo strtoupper($dataCliente['cNombreLargo']); ?></td>

                            <td><?php echo $dataCliente['cCorreo']; ?></td>
                            <?php if($dataCliente['iEstatus']==1) {?> 
                              <td><span  class="badge badge-success" > <a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=1">Activo<a></span></td> 
                            <?php }?> 
                            <?php if($dataCliente['iEstatus']==0) {?> 
                              <td><span  class="badge badge-danger"><a class="text-white" href="func/updatestatus.php?id='<?php echo $dataCliente['iIdUsuario']; ?>'&status=0">Inactivo</a></span></td> 
                            <?php }?>
                           <td>
                           <?php echo $dataCliente['nombre']; ?>
                           </td>  
                            <td>
                            <!--  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Eliminar
                              </button>  -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['iIdUsuario']; ?>">
                                Modificar
                              </button> 
                           <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#cursomodal<?php echo $dataCliente['iIdUsuario']; ?>">
                                Agregar Curso
                              </button> 
                              
                       </td> 
                        <?php 
                            $sqlacceso   = ("SELECT * FROM accesos where idUsuario=".$dataCliente['iIdUsuario']." ORDER BY dFechaAcceso DESC LIMIT 1;");
                            $queryacceso = mysqli_query($conn, $sqlacceso);
                            while ($dataacceso = mysqli_fetch_array($queryacceso)) {
                              $fechaInicio = new DateTime($dataacceso['dFechaAcceso']);
                              $fechaFin = new DateTime($dataacceso['dFechaCierre']);
                              $intervalo = $fechaInicio->diff($fechaFin);
                              ?>

                            <td><?php echo $intervalo->h . " horas, " . $intervalo->i . " minutos y " . $intervalo->s . " segundos"; ?></td>
                            <td><?php echo $dataacceso['dFechaAcceso']; ?></td>
                           <?php }?>
                           
                          </tr>
                          <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






<!-- script para exportar a excel -->
<script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte de prueba", //Nombre del archivo de Excel
            sheetname: "Reporte de prueba", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>

</body>
</html>