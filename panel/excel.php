<?php

header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>