<?php
  session_start();
   
  // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['cUsuario'];
  $password = $_POST['cPassword'];
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "vproductivabd";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
   
  // Consulta segura para evitar inyecciones SQL.
  $sql = sprintf("SELECT * FROM usuario WHERE cUsuario='%s' AND cPassword = %s", mysql_real_escape_string($email), mysql_real_escape_string($password));
  $resultado = $conn->query($sql);
   
  // Verificando si el usuario existe en la base de datos.
  if($resultado){
    // Guardo en la sesión el email del usuario.
    $_SESSION['cUsuario'] = $email;
    echo '<script>alert("Yachingo")</script>';
     
    // Redirecciono al usuario a la página principal del sitio.
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: principal.php"); 
  }else{
    echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
  }
 
?>