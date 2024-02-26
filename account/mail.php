<?php
require("../dev/conectar.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
   

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/POP3.php';
    include "mcript.php";

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

$correo =(($_POST["correo"]));
$query="SELECT * FROM usuarios where cCorreo='$correo' and iEstatus=1";
$result=$conn->query($query);
$row=$result->fetch_assoc();
if($result->num_rows>0){

    $nombreusuario=$row["cNombre"];
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {

        /* $mail->isSMTP();   
        
        $mail->SMTPAuth = true; // authentication enabled
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->Username   = 'soporte.valuacion.productiva@outlook.com';    
        $mail->Password   = '**********;
        $mail->Port       = 587;   */

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'soporte@valuacionproductiva.mx';                     //SMTP username
        $mail->Password   = 'vproduct2424@';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;            

      //Recipients
       $mail->setFrom('soporte@valuacionproductiva.mx', 'SOPORTE');
       $mail->AddAddress($correo, $nombreusuario); 
      
        //Content
        $mail->isHTML(true); 
    
        $codigo=$encriptar($correo);
        $cuerpecito=
        '<!-- COLOURS:
        BLUE: #003272
        ORANGE: #ff5c04
        YELLOW: #ff8800
        DARK GRAY: #a09c9c
        -->
        <div class="container" style="font-family: Helvetica;background: #ededed;max-width: 630px;">
         
          <div class="content" style="width: 87%;margin: 0 auto;">
            <div class="titulo" style="background: white;padding: 50px 20px;margin-top: -80px;text-align: center;font-size: 25px;color: #003272;font-weight:600;">
              <p>Te cuidamos: somos <br>Valuación Productiva.</p>
              <p style="font-size:20px;font-weight:400">Recuperar contraseña</p>
            </div>
            <div class="bajada" style="padding: 40px;text-align: center;color:#585758;font-size:15px">
              <p>Hola <b>'.$nombreusuario.'</b>: Hemos recibido una solicitud de recuperación de contraseña. Para generar una nueva, haga click en el siguiente botón.</p>
              <a href="https://valuacionproductiva.mx/account/recuperar.php?ic='.$codigo.'" class="boton" style="background: #003272 ;color: white;border-radius: 5px;padding: 15px 40px;text-decoration: none;margin: 15px 0;display:inline-block;">Recuperar contraseña</a>
              <p style="font-weight:bold">Si no ha solicitado recuperación de contraseña haga caso omiso a este mensaje.</p>
            </div>
          </div>
        </div>
        <div class="firma" style="text-align:center; max-width:630px; padding-top: 30px">
          <p style="margin:0"></p>
          <p style="margin:0"></p>
          <div style="font-family: Helvetica; color: gray;">
            <p style="margin: 10px 0">Contactanos</p>
            <a style="color: #003272;text-decoration:none" href="https://www.valuacionproductiva.mx/" target="_blank">https://www.valuacionproductiva.mx</a>
            <p style="margin: 10px 0">.</p>
          </div>
        </div>';                               //Set email format to HTML
        $mail->Subject = 'Enlace para cambiar tu password';
        //$mail->Body    = $cuerpecito;
        $mail->Body    = $cuerpecito;//'Hola, este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/spending_tracker/change_password.php?id='.$row['iIdUsuario'].'">Recuperación de contraseña</a>';
        $mail->AltBody = 'Aquí tienes el enlace para recuperarla.';

        $mail->send();

        echo '.';
        echo '<script>
        Swal.fire({
        title: "Se envio un correo de recuperación, verifiquelo porfavor",
        timer: 1500,
        icon: "sucess"
        }).then(function() {
            window.location = "login.html";
        });
       
        </script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: login.html");
    }    

}else{
    echo '.. ';
    echo '<script>
    Swal.fire({
    title: "No esta asociado el correo.",
    timer: 1500,
    icon: "error"
    }).then(function() {
        window.location = "login.html";
    });
   
</script>';

}


?>