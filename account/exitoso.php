

<!DOCTYPE html>
<html lang="en">
    <style>
        .my-button {
        padding: 8px 20px;
        background-color: #1CC4EA;
        color: white;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        margin-left: 14%;
        padding-top: 0%;
        }

        .my-button:hover {
        background-color: #0D1566;
        }

        .my-button:active {
        background-color: #3e8e41;
        }
        .exampleone {
        background-color: #2E49E1;
        }
        .text-white{
          font-size: 60%;
          font-family: "Montserrat";
          font-weight: 600;
        }
        .text-white2{
          font-family: "Montserrat";
          font-size: 60%;
          font-weight: 600;
        }
    </style>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register Form</title>
    <script type="text/javascript" src="script.js"></script>
    <link href="../img/LOGOVP.ico" rel="icon">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../styles/stylemenu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="account.css">
</head>
<body onload="deshabilitaRetroceso()" style="background-image: url(fondoexitoso.png);
    ">
  <!-- Header -->
  <section id="header">
    <div class="header container-l">
      <div class="nav-bar">
        <div class="brand">
          <a href="../index.html">

            <img src="logob.png" id="logoinicio" alt="VProductiva Logo">
            <!-- <h1>Valuación Productiva</h1>-->
          </a>
        </div>
        <div class="navbar" class="nav-list">
          <div class="menu-toggle">&#9776;</div>
          <ul class="menu">
            <li  class="fondoinicio"><a href="../index.html" data-after="Home" class="headermenu" >INICIO</a></li>

            <!-- <li><a href="#services" data-after="Service">Servicios</a></li>-->
            <li class="fondoinicio"><a href="../indexcursos.html" data-after="Projects" class="headermenu">CURSOS</a></li>
            <li><a href="../indexacerca.html" data-after="About" class="headermenu">NOSOTROS</a></li>
            <li class="fondoinicio"><a href="../indexcontacto.html" data-after="Contact" class="headermenu">CONTACTO</a></li>
            <!--<li><a href="account/register.html" data-after="Login">Login</a></li> -->
            <li  id="fondoinicio" class="fondoinicio"><a href="login.html" data-after="Login" class="headermenu" id="menuingresar" style="color: white;">INGRESAR</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <script src="../styles/menu.js"></script>
  <!-- End Header -->

   <!-- Formulario -->
  <section id="formulario" >

 
    <div class="container"   >
        <div class="login-register" id="login-register" class="exampleone" style="background-color: #2E49C1;">
            <div class="nav-buttons">
               <!--  <button id="loginBtn" class='active' >Iniciar sesión </button> -->
              <!--   <button id="registerBtn" >Registrarse</button> -->
            </div>
            <div class="form-group">

                <form method="post" id="loginform" >
                    <li style="text-align: center" type="none">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                                width="156" height="156" 
                                fill="currentColor" class="bi bi-check-circle-fill" 
                                viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>                        
                        </svg>
                    </li>
                    <br>
                    <label style="text-align: center"><h2>¡Gracias!</h2></label>
                    <label  style="text-align: center"><h2>Tu registro ha sido exitoso.</h2></label>
                    <br><br>
                    <button class="my-button">
                        <a class="text-white" href="../account/login.php">
                          Haz clic aquí</a>
                          <p class="text-white2"><a href="../account/login.php">Para explorar el catalogo de cursos</a></p>
                    </button>
                                    
                </form>
             </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<SCRIPT lenguaje="JavaScript">
   function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){
        window.location.hash="";
    }
}
</SCRIPT>

<!-- End formulario -->

    
<!-- Start Footer -->
<section id="footer">
    <div id="divfooter">
      <div id="logopie" class="pie-rs1">
        <img src="logob2.png" id="imgpie">
      </div>
      <div id="texto1pie" class="pie-rs2">
        <p id="parrafodireccion" class="parrafosfooter">Dirección: Av. Paseo de las Palmas 830, Int. 102-1.
          Lomas de Chapultepec V Sección. Miguel Hidalgo.
        Ciudad de México. C.P. 11000. México.</p>
        <p class="parrafosfooter">Teléfono: 55-104-680-95</p>
        <p class="parrafosfooter">Correo electrónico: valuacionproductiva9@gmail.com</p>
      </div>
      <div id="texto2pie" class="pie-rs1">
        <p class="parrafosfooter"><a href="../indexterminos.html" class="parrafosfooter" id="terminosycon">Terminos y Condiciones</a></p>
        <p id="parrafoter" class="parrafosfooter">© 2024 VALUACIÓN PRODUCTIVA Y
        COMPETITIVA EN MATERIA LABORAL A.C.</p>
      </div>
    </div>
  </section> 
  <!-- End Footer  -->

</body>
</html>