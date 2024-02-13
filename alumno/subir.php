<?php
include "../panel/func/profile.php";
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
$fechaActual = date("d-m-Y h:i:s");
<<<<<<< HEAD

=======
>>>>>>> origin/master
if (!isset($_SESSION)) {
    session_start();
}

    require("../dev/conectar.php");
<<<<<<< HEAD
    $nom_archivo = $_FILES['file1']['name'];
    $ruta ="../alumno/imagenes/".$nom_archivo;
    $archivo = $_FILES['file1']['tmp_name'];

    if ($nom_archivo==""){
        header("Location: index.php");
    }else{
     
=======

    if ($_FILES['file']['$name']=="" ||isset($_FILES['file']['$name'])||$_FILES['file1']['tmp_name']==""){
        header("Location: index.php");
    }else{
        $nom_archivo = $_FILES['file1']['name'];
        $ruta ="../alumno/imagenes/".$nom_archivo;
        $archivo = $_FILES['file1']['tmp_name'];
>>>>>>> origin/master
        $subir= move_uploaded_file($archivo,$ruta);
       
        $sql= "UPDATE usuarios SET cProfile='".$ruta."' WHERE iIdUsuario=". $_SESSION["id"];
        if (mysqli_query($conn, $sql)) {
            //echo "Se inserto correctamente el registro";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    

?>
<script>
    window.location='index.php'
</script>