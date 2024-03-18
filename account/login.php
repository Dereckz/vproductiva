<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script type="text/javascript" src="script.js"></script>
    <link href="../img/LOGOVP.ico" rel="icon">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../styles/stylemenu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="account.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){

        $('.search-box input[type="text"]').on('keydown', function(e) {
        if(e.key == 'Enter' || e.key == 'Tab') {
          
            e.preventDefault();
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        }
});

        // $('.search-box input[type="text"]').on("keyup input", function(){
        //     /* Get input value on change */
        //     var inputVal = $(this).val();
        //     var resultDropdown = $(this).siblings(".result");
        //     if(inputVal.length){
        //         $.get("backend-search.php", {term: inputVal}).done(function(data){
        //             // Display the returned data in browser
        //             resultDropdown.html(data);
        //         });
        //     } else{
        //         resultDropdown.empty();
        //     }
        // });
        
        // // Set search input value on click of result item
        // $(document).on("click", ".result p", function(){
        //     $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        //     $(this).parent(".result").empty();
        // });
    });
    </script>
</head>
<body >
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
            <li  id="fondoinicio" class="fondoinicio"><a href="login.php" data-after="Login" class="headermenu" id="menuingresar" style="color: white;">INGRESAR</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <script src="../styles/menu.js"></script>
  <!-- End Header -->

   <!-- Formulario -->
  <section id="hero">

 
    <div class="container">
      <div id="main-container">

  
        <div class="login-register" id="login-register">
            <div class="nav-buttons">
                <button id="loginBtn" class='active' >Iniciar sesión </button>
                <button id="registerBtn" >Registrarse</button>
            </div>
            <div class="form-group">

                <form method="post" action="loginp.php" id="loginform">
                    <label for="username">Correo Electrónico</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" value="Iniciar sesión" class="submit">
                   
                </form>
                <form method="post" action="daralta.php" id="registerform">
                  <label for="fullname">Nombre </label>
                  <input type="text" id="fullname" name="fullname">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email">
                  <label for="password">Contraseña</label>
                  <input type="password" id="password" name="password" 
                        pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" 
                        onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Debe contener entre 8 y 16 caracteres:(Dígitos,Mayusculas,  Minúsculas y simbolos)':'');
                        if(this.checkValidity()) form.confirm_password.pattern=this.value; ">
                  <label for="confirmpassword">Confirmar contraseña</label>
                  <input type="password" id="confirmpassword" name="confirmpassword" 
                        pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$">
                        <div class="search-box">
                          <label for="empresa">Empresa:</label>
                          <input id="buscar" type="text" autocomplete="off"/>
                        
                          <div class="result"></div>
                       </div>
                      <!-- <select name="empresa" id="empresa">
                          <option>Empresa procedente</option>
                            <?php
                                require("../dev/conectar.php");
                            
                                $dataempresa = mysqli_query($conn,"SELECT * FROM empresa");
                                while ($empresa = mysqli_fetch_array($dataempresa)) { 
                        
                                  $array=array($empresa['idempresa']=>$empresa['nombre']);
                                  echo '<option value="'.$empresa['idempresa'].'">'.$empresa['nombre'].'</option>';
                                }
                            ?>
                      </select> -->
                      
                        <li id="checkterminos" style="list-style: none;">
                          <input id="chkbxtyc" type="checkbox" required>
                          <label for="c1"><a href="../indexterminos.html">Aceptar Términos y Condiciones</a> </label>
                        </li>
                       
                        
                  <!-- <label for="codigomaestro">Matricula</label>
                  <input type="text" id="codigomaestro" name ="codigomaestro"> -->
   
                   
                  <input type="submit" value="Registrar" class="submit">
                  
              </form>
              <div id="forgot">
                <a href="forgot.php" >¿Olvidaste tu contraseña?</a>
            </div>
        </div>
      </div>
    </div>
</section>
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


<!-- End formulario -->
 


   
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </script>

     <script src="jquery.js"></script>
     <script src2="password.js"></script>
    <script type='text/javascript'>
      
        var loginBtn = document.getElementById('loginBtn');
        var registerBtn = document.getElementById('registerBtn');
        var loginform = document.getElementById('loginform');
        var registerform = document.getElementById('registerform');
        var loginregister = document.getElementById('login-register');
      
        registerBtn.onclick= function() {
            registerform.style.left='0px';
            registerform.style.opacity='1';
            loginform.style.left='-500px';
            loginform.style.opacity='0';
            forgot.style.left='-500px';
            forgot.style.opacity='0';
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
            loginregister.style.backgroundColor='#2E49C1';

        }

        loginBtn.onclick= function() {
            loginform.style.left='0px';
            loginform.style.opacity='1';
            forgot.style.left='0px';
            forgot.style.opacity='1';
            registerform.style='500px';
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
            registerform.style.opacity='0';            
            loginregister.style.backgroundColor='#872362';
        }

    </script>
</body>
</html>