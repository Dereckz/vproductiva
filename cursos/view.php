<?PHP $recurso=$_GET["r"];?>
<?PHP $irc=$_GET["irc"];?>
<?PHP 
 require("../dev/conectar.php");


$recurse= mysqli_query($conn, "SELECT * FROM recurso
								WHERE iIdRecurso=".$irc);
								
$datarec = mysqli_fetch_array($recurse);
$formato=$datarec["cFormato"];
$ruta="../cursos/recurso/".$recurso;
?>



<!DOCTYPE html>
<html>
    <head>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel="stylesheet" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>
	<script src="pdfjs/pdf.js"></script>
	</head>
	

		<?php 
			$iphone=strpos($_SERVER['HTTP_USER_AGENT'],'iphone');
			$android=strpos($_SERVER['HTTP_USER_AGENT'],'Android');
			$ipod=strpos($_SERVER['HTTP_USER_AGENT'],'Ipod');

		//pdf
			if($formato=="pdf"){ 

				require('../fpdf/fpdf.php');
				$archivoconextension= explode('/',$datarec['cRuta']);
				$pdf2=$archivoconextension[3];

				$file = $archivoconextension[2].'/'.$archivoconextension[3];
				$filename = $archivoconextension[3];

					//Dispo. Movil
					if($iphone || $android || $ipod){
						
							header('Content-type: application/pdf');
							header('Content-Disposition: inline; filename="'.$filename	.'"');
							header('Content-Transfer-Encoding: binary');
							header('Accept-Ranges: bytes');
							@readfile($file);  	
		?>
		<?php
					}else{
							header('Content-type: application/pdf');
							header('Content-Disposition: inline; filename="'.$filename	.'"');
							header('Content-Transfer-Encoding: binary');
							header('Accept-Ranges: bytes');
							@readfile($file);  
					}
		?>
		<?PHP
			//mp4
			}elseif ($formato=="mp4"){
				if($iphone || $android || $ipod){
					$archivoconextension= explode('/',$datarec['cRuta']);
					$file = $archivoconextension[2].'/'.$archivoconextension[3];
					//$filename = $archivoconextension[3];
					//header("Location:".$datarec["cRuta"]);
				
		?>
					<!-- //Dispo. Movil-->
					<style>
					.video-responsive {
					position: relative;
					padding-bottom: 56.25%; /* 16/9 ratio */
					padding-top: 0px; /* IE6 workaround*/
					height: 0;
					overflow: hidden;
					}

					.video-responsive iframe,
					.video-responsive object,
					.video-responsive embed {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					}
					</style>
							<body  style="background-color:black;" >
								<video id="myvideo" style=" margin-top:50em; " width="100%" height="50%"  playsinline controls controlsList="nodownload" autoplay >
									<source src=<?PHP echo ($datarec["cRuta"]);?> type="video/mp4" />
								</video>
							</body>
		<?php 
			}else{ ?>
		
				<style>
					* { 
					margin: 0;
					padding: 0;
					box-sizing: border-box;
				}
					body { min-height: 100vh; }

					video{
						width: 100%;
						height: 100vh;
					}
					video::-internal-media-controls-download-button {
						display:none;
					}
					
					video::-webkit-media-controls-enclosure {
						overflow:hidden;
					}
					
					video::-webkit-media-controls-panel {
						width: calc(100% + 25px);
					}
				</style>
				<body>
					<video id="player" playsinline controls controlsList="nodownload" autoplay >
						<source src=<?PHP echo ($datarec["cRuta"]);?> type="video/mp4" />
						</video>
				</body>		
		<?php }
			}
		?>
</html>
	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		
	var elem = document.getElementById(id);
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}
		

	</script> 




