

<!DOCTYPE html>
<html lang="en">
    <style>
        .my-button {
        padding: 10px 20px;
        background-color: #2E49E1;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        .my-button:hover {
        background-color: #45a049;
        }

        .my-button:active {
        background-color: #3e8e41;
        }
        .exampleone {
        background-color: #2E49E1;
        }
    </style>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register Form</title>
    <link href="../img/LOGOVP.ico" rel="icon">
    <link rel="stylesheet" href="main.css">
</head>
<body onload="deshabilitaRetroceso()">
    <!-- Header -->
  <section id="header">
    <link rel="stylesheet" href="style.css">
    <div class="header containerh">
      <div class="nav-bar">
        <div class="brand" style="background-color: transparent;">
          <a href="#hero">
           <img src="logo.png" id="logoinicio" alt="VProductiva Logo">
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
  <section id="formulario" >

 
    <div class="container"   >
        <div class="login-register" id="login-register" class="exampleone">
            <div class="nav-buttons">
               <!--  <button id="loginBtn" class='active' >Iniciar sesión </button> -->
              <!--   <button id="registerBtn" >Registrarse</button> -->
            </div>
            <div class="form-group">

                <form method="post" id="loginform" >
                    <li style="text-align: center">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                                width="156" height="156" 
                                fill="currentColor" class="bi bi-check-circle-fill" 
                                viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>                        
                        </svg>
                    </li>
                    <br>
                    <label style="text-align: center"><h2>¡Gracias!</h2></label>
                    <br>
                    <label  style="text-align: center"><h2>Tu registro ha sido exitoso.</h2></label>
                    <br><br>
                    <button class="my-button" >
                        <a class="text-white" href="../account/login.html">
                            Haz clic aquí <br> 
                            Para explorar el catalogo del curso
                        <a>
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

    
</body>
</html>