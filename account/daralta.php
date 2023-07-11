<?php
include("..\dev\conectar.php");
 
$fullname = ($_POST["fullname"]);
$correo = ($_POST["email"]);
$contrasena = password_hash(($_POST["password"]), PASSWORD_DEFAULT);   
$matricula = ($_POST["codigomaestro"]);
$fecha_actual = date("d-m-Y");
$codigomaestro=$_POST["codigomaestro"];

//Separar Nombres
$nombres=namess::getNombreSplit($fullname)["Nombres"];
$paternos=namess::getNombreSplit($fullname)["Paterno"];
$maternos=namess::getNombreSplit($fullname)["Materno"];

if (!empty($fullname))
{
	
	if(empty($codigomaestro))
	{		
		$query = mysqli_query($conn,"INSERT INTO `usuarios`(`iIdUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `cUsuario`, `cPassword`, `cTelefono`, `iTipoUsuario`, `cCodigo`, `dFechaAlta`, `iEstatus`)
									 VALUES ('0','$nombres','$paternos','$maternos','$fullname','$nombres','$contrasena','','2','$codigomaestro','$fecha_actual','1')");
		if($query){

            // $queryA = mysqli_query($conn,"INSERT INTO `usuario`(`iIdUsuario`, `cUsuario`, `cPassword`, `iTipoUsuario`, `dAlta`, `cKey`, `iEstatus`)
            //                      VALUES('0','$correo','$contrasena','2','$fecha_actual','$codigomaestro','1');");

                                 if($query){
                                    header("Location: ../panel/index.html");
                                 }
                                 else{		
                                    header("Location: ../index.html");
                                }	

           
		}
		else{		
            header("Location: ../index.html");
        }	
	}
 	else{
        $query = mysqli_query($conn,"INSERT INTO `usuarios`(`iIdUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `cUsuario`, `cPassword`, `cTelefono`, `iTipoUsuario`, `cCodigo`, `dFechaAlta`, `iEstatus`)
									 VALUES ('0','$nombres','$paternos','$maternos','$fullname','$nombres','$contrasena','','3','$codigomaestro','$fecha_actual','1')");
		if($query){
            // $queryA = mysqli_query($conn,"INSERT INTO `usuario`(`iIdUsuario`, `cUsuario`, `cPassword`, `iTipoUsuario`, `dAlta`, `cKey`, `iEstatus`)
            // VALUES('0','$correo','$contrasena','2','$fecha_actual','$codigomaestro','1');");
            
            if($query){
               header("Location: ../panel/index.html");
            }
            else{		
               header("Location: ../index.html");
           }	
            
		}
		else{		
            header("Location: ../index.html");
        }	
		
	}
}
 else{
    echo "<script> alert('Validar Información');window.location= 'login.html' </script>";
	header("Location: login.html");
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