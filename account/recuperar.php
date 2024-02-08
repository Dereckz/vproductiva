<?php  $codigo=$_GET["ic"];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Cuenta</title>
    <link href="../img/LOGOVP.ico" rel="icon">
    <link rel="stylesheet" href="main.css">
</head>
<body onload="deshabilitaRetroceso()">
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
             <!--<li><a href="../index.html" data-after="Home">Inicio</a></li>
           
            <li><a href="../index.html#projects" data-after="Projects">Cursos</a></li>
            <li><a href="../index.html#about" data-after="About">Acerca de nosotros</a></li>
            <li><a href="../index.html#contact" data-after="Contact">Contacto</a></li>          -->
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
                <button id="loginBtn" class='active' >Inserte correo asocisado </button>
                
            </div>
            <div class="form-group">

                <form method="post" action="recovery.php" id="forgotform">
                    <input type="hidden"id="id" name="id" value="<?php echo str_replace(" ","+",$codigo)?>">
                    <label for="pass">Nueva Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena">
                    <label for="pass">Confirme Contraseña</label>
                    <input type="password" id="contrasenad" name="contrasenad">
                    <input type="submit" value="Cambiar Contraseña" class="submit">
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
<script type="text/javascript">
 function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){
        window.location.hash="";
    }
}
</script>
