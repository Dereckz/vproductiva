<?php
  
// Store the file name into variable
$file = 'recurso/recurso5.pdf';
$filename = 'recurso5.pdf';
  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);
  
?>