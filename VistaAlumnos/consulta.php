<?php

function informacion(){
    include("..\dev\conectar.php");
   $resultado = mysqli_query($conn,"SELECT * FROM usuarios WHERE iIdUsuario=1");
while ($consulta = mysqli_fetch_array($resultado))
    {
    echo "<tr><td>Nombre: </td><td>".$consulta['cNombre']."</td></tr>";
    echo "<tr><td>Apellido paterno: </td><td>".$consulta['cApellidoP']."</td></tr>";
    echo "<tr><td>Apellido materno: </td><td>".$consulta['cApellidoM']."</td></tr>";
    }
}

function nombre(){
    include("..\dev\conectar.php");
    $resultado = mysqli_query($conn,"SELECT * FROM usuarios WHERE iIdUsuario=1");
while ($consulta = mysqli_fetch_array($resultado))
{
    echo $consulta['cNombreLargo'];
}
}

function curso(){
    include("..\dev\conectar.php");
    $resultado = mysqli_query($conn,"SELECT * FROM curso");
while ($consulta = mysqli_fetch_array($resultado))
{
    echo '<div class="u-align-left u-border-10 u-border-no-left u-border-no-right u-border-no-top u-border-palette-2-base u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" style="will-change: transform, opacity; animation-duration: 1500ms;">
    <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-custom-item u-file-icon u-icon u-text-palette-2-base u-icon-1 animated customAnimationIn-played" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" style="will-change: transform, opacity; animation-duration: 1500ms;"><img src="'.$consulta['ricono'].'" alt=""></span>
      <h4 class="u-text u-text-5">'.$consulta['cNombreCurso'] .'</h4> <a href="'.$consulta['ruta'].'" class="u-border-1 u-border-active-grey-70 u-border-black u-border-hover-grey-70 u-border-no-left u-border-no-right u-border-no-top u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-button-style u-custom-item u-none u-radius-0 u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Entrar</a>
      </div>
    </div>';

}
}

?>


