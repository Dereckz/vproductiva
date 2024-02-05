<?php
include 'mail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register Form</title>
    <link href="../img/LOGOVP.ico" rel="icon">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- Header -->
  <section id="header">
    <link rel="stylesheet" href="style.css">
    <div class="header containerh">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
           <img src="../img/logovproductiva2.png" id="logoinicio" alt="VProductiva Logo">
           <!-- <h1>Valuación Productiva</h1>-->
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../index.html" data-after="Home">Inicio</a></li>
           <!-- <li><a href="#services" data-after="Service">Servicios</a></li>-->
            <li><a href="../index.html#projects" data-after="Projects">Cursos</a></li>
            <li><a href="../index.html#about" data-after="About">Acerca de nosotros</a></li>
            <li><a href="../index.html#contact" data-after="Contact">Contacto</a></li>
            <!--<li><a href="account/register.html" data-after="Login">Login</a></li> -->
            <li><a href="login.html" data-after="Login">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

   <!-- Formulario -->
  <section id="formulario">
    
    <div class="container">
        <div class="login-register">
            <div class="nav-buttons">
                <button id="loginBtn" class='active' >Inserte correo asociado </button>
                
            </div>
            <div class="form-group">

                <form method="post" action="mail.php" id="forgotform">
                  
                     <label for="email">Email</label>
                  <input type="text" id="email" name="email">
                    <input type="submit" value="enviar" class="submit"  onclick = "clickMe();" >
                </form>
               
              
             <div id="regresar">
                <a href="login.html">Regresar</a>
            </div>
        </div>

    </div>
</section>
<!-- End formulario -->


</body>
</html>