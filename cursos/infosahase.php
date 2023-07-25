<?php
include("..\dev\conectar.php");
$resultado = mysqli_query($conn,"SELECT c.cNombreCurso, m.cNombreModulo FROM curso c
INNER JOIN modulo m ON c.iIdCurso = m.fkiIdCurso WHERE c.iIdCurso=5");
while ($consulta = mysqli_fetch_array($resultado))
{
echo $consulta['cNombreModulo'] ."<br>";

}
?>