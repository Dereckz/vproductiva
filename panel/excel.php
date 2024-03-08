<?php
//$filename="Datos Alumnos";
if(isset($_POST["export_data"])) {
    $filename = "phpzag_data_export_".date('Ymd') .".xlsx";
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=".$filename."");
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    $show_coloumn = false;
    if(!empty($developer_records)) {
    foreach($developer_records as $record) {
    if(!$show_coloumn) {
    // display field/column names in first row
    echo implode("t", array_keys($record)) . "n";
    $show_coloumn = true;
    }
    echo implode("t", array_values($record)) . "n";
    }
    }
    exit;
    }
?>