<?php
include "../panel/func/profile.php";

if (!isset($_SESSION)) {
    session_start();
}


    include "..\dev\conectar.php";
    $nom_archivo = $_FILES['file1']['name'];
    $ruta ="../alumno/imagenes/".$nom_archivo;
    $archivo = $_FILES['file1']['tmp_name'];
    $subir= move_uploaded_file($archivo,$ruta);

    $sql= "UPDATE usuarios SET imagen='".$ruta."' WHERE iIdUsuario=". $_SESSION["id"];
    if (mysqli_query($conn, $sql)) {
        echo "Se inserto correctamente el registro";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>
<script>
    window.location='index.php'
</script>