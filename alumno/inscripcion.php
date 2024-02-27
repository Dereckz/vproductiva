<?php
require("../dev/conectar.php");

$idCurso = $_GET['curso'];
$idUsuario = $_GET['usuario'];

//Se manejaran 3 valores para saber si ya estuvo inscrito en el curso se salio y nuevamente se volvio a inscribir
//1 inscrito, 2 salir, 3 inscrito por segunda ves.
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo "   <style>
    .swal2-title {
    font-family: 'Montserrat', sans-serif;

    }
    .swal2-html-container{
    font-family: 'Montserrat', sans-serif;

    }
    </style>";

$consCur = mysqli_query($conn, "SELECT * FROM  inscripcion WHERE fkiIdeCurso = ".$idCurso." and fkiIdUsuario =".$idUsuario);
$consulta= mysqli_fetch_array($consCur);
$idIns= mysqli_num_rows($consCur);
if(isset ($consulta['finalizado'])){
$final=  $consulta['finalizado'];
}
else{
    $final=0;
}
if ($idIns>1 || $final==2 ){
    
        $act = "UPDATE inscripcion SET finalizado = 3 WHERE fkiIdeCurso = ".$idCurso." and fkiIdUsuario =".$idUsuario;
    if (mysqli_query($conn, $act)) {
        //echo "Se actualizo correctamente el registro";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
else {
    $sql = "INSERT INTO inscripcion(fkiIdUsuario, fkiIdeCurso,finalizado)
VALUES ($idUsuario,$idCurso,1)";

if (mysqli_query($conn, $sql)) {
     echo ".";


    
} else {
    

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: index.php");
}
    echo '<script>
    Swal.fire({
    title: "Se inscribio correctamente al curso",
    timer: 1800,
    confirmButtonColor: "#872362",
    icon: "succes"
    }).then(function() {
        window.location = "index.php";
    });

    </script>'; 
/* echo '<script>
        Swal.fire({
        title: "Inscripción realizada",
        icon: "success"
    }).then(function() {
        window.location = "index.php";
    });
       
    </script>'; */


}


?>
