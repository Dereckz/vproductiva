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


<style>
	* { 
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body { min-height: 100vh; }

	video{
		width: 100%;
		height: 100%;
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

<!DOCTYPE html>
<html>
    <head>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

	</head>
	<body>

	

		<?php if($formato=="pdf"){ 
 require('../fpdf/fpdf.php');
			$archivoconextension= explode('/',$datarec['cRuta']);
			$pdf2=$archivoconextension[3];

			$file = $archivoconextension[2].'/'.$archivoconextension[3];
			$filename = $archivoconextension[3];
			
			
			 //header('Content-type: application/pdf');
			/*header('Content-Disposition: inline; filename="' . $filename . '"');
			header('Content-Transfer-Encoding: binary');
			header('Accept-Ranges: bytes');*/
			//@readfile($file); 
			
			
		?>
	
		  <!-- <div id="pdf" style="border:0;">
			<object data="mypdf.pdf" type="application/pdf" frameborder="0" width="100%" height="600px" style="padding: 20px;">
			<embed src=<?php echo $file ?> width="100%" height="100%" >
		</object>
		</div>   -->
		 <div class="container">
   			<iframe style="float:right;" src = "ViewerJS/#"<?php echo $file ?> width='100%' height='100%' allowfullscreen webkitallowfullscreen></iframe>
		</div>
		 
		<?PHP

		}elseif ($formato=="mp4"){?>
			<video id="player" playsinline controls controlsList="nodownload" autoplay >
			<source src=<?PHP echo ($datarec["cRuta"]);?> type="video/mp4" />
			</video>
			
		<?php } ?>
</body>		
	
</html>
	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		var elem = document.getElementById("player");
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}
	</script> 


