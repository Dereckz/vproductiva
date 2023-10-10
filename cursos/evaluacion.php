
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estiloencabezado.css">
        <title>Cultura Jurídica / derecho empresarial y corporativo</title>
        <style>
                #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                }

                #customers tr:nth-child(even){background-color: #f2f2f2;}

                #customers tr:hover {background-color: #ddd;}

                #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
                }
        </style>
    </head>
    <body>
    <header id="encabezado">
    	<ul id="menu">
            <li class="logo"><img src="img/logob.png" id="logo"></li>
            <li class="menus"></li>
    	    <li class="menus"><a href="../alumno/index.php" class="enlacemenu">Mi perfil</a></li>
    	    <li class="menus"><a href="../alumno/cursos.php" class="enlacemenu">Catálogo de Cursos</a></li>
            <li class="menus"><a href="../account/login.html" class="enlacemenu">Salir</a></li>
    	</ul>
    </header>
    <div>
    <img class="tituloscursos" src="img/CJuridica.png" >
    </div>   
    <?php
        $idCurso =$_GET['idC'];
         require("../dev/conectar.php");
         include "../panel/func/profile.php";

         $query="SELECT * FROM examen WHERE idcurso=".$idCurso. " and iEstatus=1" ;
         $resultado = mysqli_query($conn,$query);
         while ($consulta = mysqli_fetch_array($resultado))
            { ?>
   
            <section class="u-align-left u-clearfix u-grey-5 u-section-2" id="carousel_0852">
                <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                   
                    <h1 class="section-title"> <span><?php echo $consulta['nombre'] ?> </span></h1>
                   <table>
                        
                   </table>
                   <h1>A Fancy Table</h1>
                    <?php echo ''?>
                    </div>

                    <table id="customers">
                            <tr>
                                <th>Company</th>
                                <th>Contact</th>
                                <th>Country</th>
                            </tr>
                            <tr>
                                <td>Alfreds Futterkiste</td>
                                <td>Maria Anders</td>
                                <td>Germany</td>
                            </tr>
                            <tr>
                                <td>Berglunds snabbköp</td>
                                <td>Christina Berglund</td>
                                <td>Sweden</td>
                            </tr>
                            <tr>
                                <td>Centro comercial Moctezuma</td>
                                <td>Francisco Chang</td>
                                <td>Mexico</td>
                            </tr>
                            <tr>
                                <td>Ernst Handel</td>
                                <td>Roland Mendel</td>
                                <td>Austria</td>
                            </tr>
                            <tr>
                                <td>Island Trading</td>
                                <td>Helen Bennett</td>
                                <td>UK</td>
                            </tr>
                            <tr>
                                <td>Königlich Essen</td>
                                <td>Philip Cramer</td>
                                <td>Germany</td>
                            </tr>
                            <tr>
                                <td>Laughing Bacchus Winecellars</td>
                                <td>Yoshi Tannamuri</td>
                                <td>Canada</td>
                            </tr>
                            <tr>
                                <td>Magazzini Alimentari Riuniti</td>
                                <td>Giovanni Rovelli</td>
                                <td>Italy</td>
                            </tr>
                            <tr>
                                <td>North/South</td>
                                <td>Simon Crowther</td>
                                <td>UK</td>
                            </tr>
                            <tr>
                                <td>Paris spécialités</td>
                                <td>Marie Bertrand</td>
                                <td>France</td>
                            </tr>
                        </table>
                </div>
                </section>
                
        
            <?php }?>
    </body>
</html>

