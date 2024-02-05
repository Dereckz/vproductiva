<?php
 function enviaremail()
 {
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    
  
    $from = $_POST['email'];
    $subject = " El usuario ".$from. "necesita restaurar su usario, porfavor mandarle una cuenta temporal";
    $msg = "[msg]";
    
    // El from DEBE corresponder a una cuenta de correo real creada en el servidor
    $headers = "From: soporte@destecnologias.net\r\n"; 
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n"; 
        
    if(mail($from, $subject, $msg,$headers)){
        echo "mail enviado";
        }else{
        $errorMessage = error_get_last()['msg'];
        echo $errorMessage;
    }
    header('Location: login.html');
 }
?>