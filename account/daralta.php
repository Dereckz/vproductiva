<?php
include("..\dev\conectar.php");

date_default_timezone_set('America/Mexico_City');
$fullname = ($_POST["fullname"]);
$correo = ($_POST["email"]);
$contrasena = password_hash(($_POST["password"]), PASSWORD_DEFAULT);   
$matricula = ($_POST["codigomaestro"]);
$fecha_actual = date("d-m-Y h:i:s");
$codigomaestro=$_POST["codigomaestro"];

//Separar Nombres
$nombres=namess::getNombreSplit($fullname)["Nombres"];
$paternos=namess::getNombreSplit($fullname)["Paterno"];
$maternos=namess::getNombreSplit($fullname)["Materno"];


if ($stmt = $conn->prepare("SELECT cUsuario FROM usuarios WHERE cUsuario= ? LIMIT 1")) {

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
   $fila = $result->fetch_assoc();

    if ($fila> 0)  {
       
      echo "<script> alert('$correo Ya se encuentra registrado, verificalo') </script>";	
       //header("Location: login.html");
      

   } else {
      if (!empty($fullname)){
       
       /* if(!empty($codigomaestro))
           {		            
        
           $queryM = mysqli_query($conn,"INSERT INTO `usuarios`(`iIdUsuario`, `fkidTipoUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `cCorreo`, `cUsuario`, `cPassword`, `cTelefono`, `cCodigo`, `dFechaAlta`, `iGenero`,`iEstatus`)
                                        VALUES ('0','2','$nombres','$paternos','$maternos','$fullname','$correo','$correo','$contrasena','','$codigomaestro','$fecha_actual','1','1')");
           if($queryM){
                 header("Location: ../panel/index.html");            
            }
           else{	
               echo "<script> alert('No se pudo registrar el Maestro') </script>";		
               header("Location: ../index.html");
           }	
       }
        else{  */
           $queryA = mysqli_query($conn,"INSERT INTO `usuarios`(`iIdUsuario`, `fkidTipoUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `cCorreo`, `cUsuario`, `cPassword`, `cTelefono`, `cCodigo`, `dFechaAlta`, `iGenero`,`iEstatus`)
           VALUES ('0','3','$nombres','$paternos','$maternos','$fullname','$correo','$correo','$contrasena','','','$fecha_actual','1','1')");
           if($queryA){
              
               header("Location: ../alumno/index.php");     
                         
           }
           else{	
               echo "<script> alert('No se pudo regustra el Alumno') </script>";	
               header("Location: login.html");
               //header("Location: ../index.html");
           }	 
           
       //}
   }
    else{
       echo "<script> alert('Validar Información') </script>";
       header("Location: login.html");
   }
   
   }
    
}else{
echo "<script> alert('Error en la base de datos, consulta al admin') </script>";	
   
}    
//Separa Nombres
class namess{
    public static  function getNombreSplit($nombreCompleto, $apellido_primero = false){
        $chunks = ($apellido_primero)
            ? explode(" ", strtoupper($nombreCompleto))
            : array_reverse(explode(" ", strtoupper($nombreCompleto)));
        $exceptions = ["DE", "LA", "DEL", "LOS", "SAN", "SANTA"];
        $existen = array_intersect($chunks, $exceptions);
        $nombre = array( "Materno" => "", "Paterno" => "", "Nombres" => "" );
        $agregar_en = ($apellido_primero)
            ? "paterno"
            : "materno";
        $primera_vez = true;
        if($apellido_primero){
            if(!empty($existen)){
                foreach ($chunks as $chunk) {
                    if($primera_vez){
                        $nombre["Paterno"] = $nombre["Paterno"] . " " . $chunk;
                        $primera_vez = false;
                    }else{
                        if(in_array($chunk, $exceptions)){
                            if($agregar_en == "paterno")
                                $nombre["Paterno"] = $nombre["Paterno"] . " " . $chunk;
                            elseif($agregar_en == "materno")
                                $nombre["Materno"] = $nombre["Materno"] . " " . $chunk;
                            else
                                $nombre["Nombres"] = $nombre["Nombres"] . " " . $chunk;
                        }else{
                            if($agregar_en == "paterno"){
                                $nombre["Paterno"] = $nombre["Paterno"] . " " . $chunk;
                                $agregar_en = "materno";
                            }elseif($agregar_en == "materno"){
                                $nombre["Materno"] = $nombre["Materno"] . " " . $chunk;
                                $agregar_en = "nombres";
                            }else{
                                $nombre["Nombres"] = $nombre["Nombres"] . " " . $chunk;
                            }
                        }
                    }
                }
            }else{
                foreach ($chunks as $chunk) {
                    if($primera_vez){
                        $nombre["Paterno"] = $nombre["Paterno"] . " " . $chunk;
                        $primera_vez = false;
                    }else{
                        if(in_array($chunk, $exceptions)){
                            if($agregar_en == "paterno")
                                $nombre["Paterno"] = $nombre["Paterno"] . " " . $chunk;
                            elseif($agregar_en == "materno")
                                $nombre["Materno"] = $nombre["Materno"] . " " . $chunk;
                            else
                                $nombre["Nombres"] = $nombre["Nombres"] . " " . $chunk;
                        }else{
                            if($agregar_en == "paterno"){
                                $nombre["Materno"] = $nombre["Materno"] . " " . $chunk;
                                $agregar_en = "materno";
                            }elseif($agregar_en == "materno"){
                                $nombre["Nombres"] = $nombre["Nombres"] . " " . $chunk;
                                $agregar_en = "nombres";
                            }else{
                                $nombre["Nombres"] = $nombre["Nombres"] . " " . $chunk;
                            }
                        }
                    }
                }
            }
        }else{
            foreach($chunks as $chunk){
                if($primera_vez){
                    $nombre["Materno"] = $chunk . " " . $nombre["Materno"];
                    $primera_vez = false;
                }else{
                    if(in_array($chunk, $exceptions)){
                        if($agregar_en == "materno")
                            $nombre["Materno"] = $chunk . " " . $nombre["Materno"];
                        elseif($agregar_en == "paterno")
                            $nombre["Paterno"] = $chunk . " " . $nombre["Paterno"];
                        else
                            $nombre["Nombres"] = $chunk . " " . $nombre["Nombres"];
                    }else{
                        if($agregar_en == "materno"){
                            $agregar_en = "paterno";
                            $nombre["Paterno"] = $chunk . " " . $nombre["Paterno"];
                        }elseif($agregar_en == "paterno"){
                            $agregar_en = "nombres";
                            $nombre["Nombres"] = $chunk . " " . $nombre["Nombres"];
                        }else{
                            $nombre["Nombres"] = $chunk . " " . $nombre["Nombres"];
                        }
                    }
                }
            }
        }
        // LIMPIEZA DE ESPACIOS
        $nombre["Materno"] = trim($nombre["Materno"]);
        $nombre["Paterno"] = trim($nombre["Paterno"]);
        $nombre["Nombres"] = trim($nombre["Nombres"]);
        return $nombre;
    }
}



?>