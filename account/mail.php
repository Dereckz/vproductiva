<?php
require("../dev/conectar.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\POP3;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/POP3.php';

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

$correo =$_POST["correo"];
$query="SELECT * FROM usuarios where cCorreo='$correo' and iEstatus=1";
$result=$conn->query($query);
$row=$result->fetch_assoc();
if($result->num_rows>0){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->Username   = 'soporte.valuacion.productiva@outlook.com';                     //SMTP username
        $mail->Password   = '@vproductivam24';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('soporte.valuacion.productiva@outlook.com', 'SOPORTE VALUACIÓN PRODUCTIVA');
        $mail->addAddress($correo,$row["cNombre"]);     //Add a recipient
      
        //Content
        $mail->isHTML(true);   
        $cuerpecito=
        '<!-- COLOURS:
        BLUE: #003272
        ORANGE: #ff5c04
        YELLOW: #ff8800
        DARK GRAY: #a09c9c
        -->
        <div class="container" style="font-family: Helvetica;background: #ededed;max-width: 630px;">
          <div class="header" style="background: #003272;text-align: center;height: 140px;padding-top: 30px;">
            <img src="https://i.ibb.co/BzgmkRN/Asset-1.png" alt="MAXXA" class="logo" style="font-family: Helvetica;width: 150px;">
          </div>
          <div class="content" style="width: 87%;margin: 0 auto;">
            <div class="titulo" style="background: white;padding: 50px 20px;margin-top: -80px;text-align: center;font-size: 25px;color: #ff8800;font-weight:600;">
              <p>Te Cuidamos: somos<br>Valuacion Productiva.</p>
              <p style="font-size:20px;font-weight:400">Recuperar contraseña</p>
            </div>
            <div class="bajada" style="padding: 40px;text-align: center;color:#585758;font-size:15px">
              <p>Hola <b>'.$row["cNombreLargo"].'<b<: Hemos recibido una solicitud de recuperación de contraseña. Para generar una nueva, haga click en el siguiente botón.</p>
              <a href="recuperar.php?ic='.$correo.'" class="boton" style="background: #ff8800;color: white;border-radius: 5px;padding: 15px 40px;text-decoration: none;margin: 15px 0;display:inline-block;">Recuperar contraseña</a>
              <p style="font-weight:bold">Si no ha solicitado recuperación de contraseña haga caso omiso a este mensaje.</p>
            </div>
          </div>
        </div>
        <div class="firma" style="text-align:center; max-width:630px; padding-top: 30px">
          <p style="margin:0">--</p>
          <p style="margin:0">--</p>
          <div style="font-family: Helvetica; color: gray;">
            <p style="margin: 10px 0">Contacto Valuacion</p>
            <a style="color: #003272;text-decoration:none" href="https://valuacionproductiva.net" target="_blank">MA<span style="color:#e9540d">X</span><span style="color:#f28b2d">X</span>A / maxxa.cl</a>
            <p style="margin: 10px 0">.</p>
          </div>
        </div>';                               //Set email format to HTML
        $mail->Subject = 'Enlace para cambiar tu contraseña';
        $mail->Body    = $cuerpecito;
    
        $mail->AltBody = 'Aquí tienes el enlace para recuperarla.';

        $mail->send();
        echo '<script>
        Swal.fire({
        title: "Se envio correctamente el mensaje a su correo",
        icon: "success"
            }).then(function() {
                window.location = "index.php";
            });
            
    </script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    

}else{
    echo 'no se hayo el correo';
}


?>