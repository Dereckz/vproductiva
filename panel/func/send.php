<?php

include ("PHPMailer\PHPMailer\PHPMailer");
include ("PHPMailer\PHPMailer\SMTP");
include ("PHPMailer\PHPMailer\Exception");


    try{
  
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'soporte@desetecnologias.net';
        $mail->Password = '@rupe2021';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465;
    
        $mail->setFrom('soporte@desetecnologias.net', 'Soporte Valuación Productiva');
        $mail->addAddress('dereckz1304@gmail.com', 'Eduardo');
        $mail->addCC('cesar.merinopmc@gmail.com');
    
        //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
    
        $mail->isHTML(true);
        $mail->Subject = 'Prueba desde Hosgator ';
        $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
        $mail->send();
    
        echo 'Correo enviado';
    }catch (Exception $e) {
        echo 'Mensaje ' . $mail->ErrorInfo;
        
    }




?>
