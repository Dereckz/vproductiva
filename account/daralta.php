<?php
include("..\dev\conectar.php");
 
$fullname = isset($_POST["fullname"]);
$correo = isset($_POST["email"]);
$contrasena = password_hash(isset($_POST["password"]), PASSWORD_DEFAULT);   
$matricula = isset($_POST["codigomaestro"]);
$fecha_actual = date("d-m-Y");

//Separar Nombres
array_reverse(explode(" ", strtoupper($fullname)));
$exceptions = ["DE", "LA", "DEL", "LOS", "SAN", "SANTA"];
$nombre = array( "Materno" => "", "Paterno" => "", "Nombres" => "" );
$agregar_en = "materno";
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

$materno = trim($nombre["Materno"]);
$paterno = trim($nombre["Paterno"]);
$nombres = trim($nombre["Nombres"]);

if(empty($_POST["codigomaestro"]))
{
    $query = mysqli_query($conn,"INSERT INTO `usuario`(`iIdUsuario`, `cUsuario`, `cPassword`, `iTipoUsuario`, `dAlta`, `cKey`, `iEstatus`)
                                 VALUES('0','$correo','$contrasena','3','$fecha_actual',' xxxx','1');");

	$queryA = mysqli_query($conn,"INSERT INTO `alumno`(`iIdAlumno`, `fkiIdUsuario`, `cNombre`, `cApellidoP`, `cApellidoM`, `cNombreLargo`, `Telefono`, `cCodigo`, `iTipo`, `dFechaAlta`, `iEstatus`)
							 VALUES('0','1','$nombres','$paternos','$maternos','$fullname','','','2','$fecha_actual','1');");
}
else{
	$query = mysqli_query($conn,"INSERT INTO `usuario`(`iIdUsuario`, `cUsuario`, `cPassword`, `iTipoUsuario`, `dAlta`, `cKey`, `iEstatus`)
	VALUES('0','.$correo.','.$contrasena.','2','.$fecha_actual.',' ','1');");
}

if($query)
{
	if($queryA)
	{
		header("Location: ../panel/index.html");
		//echo "Bienvenido:" .$nombre;
	}
	
}
else 
{
	header("Location: index.html");
	echo "No ingreso"; 
	//echo "<script> alert('Error');window.location= 'login.html' </script>";
}
	

?>