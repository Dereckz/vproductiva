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
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel="stylesheet" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>
	</head>
	<body>

	

		<?php 
		$iphone=strpos($_SERVER['HTTP_USER_AGENT'],'iphone');
		$android=strpos($_SERVER['HTTP_USER_AGENT'],'Android');
		$ipod=strpos($_SERVER['HTTP_USER_AGENT'],'Ipod');

		if($formato=="pdf"){ 
			require('../fpdf/fpdf.php');
			$archivoconextension= explode('/',$datarec['cRuta']);
			$pdf2=$archivoconextension[3];

			$file = $archivoconextension[2].'/'.$archivoconextension[3];
			$filename = $archivoconextension[3];
				if($iphone || $android || $ipod){
					/* 	echo '<object data="mypdf.pdf" type="application/pdf" frameborder="0" width="100%" height="600px" style="padding: 20px;">
						<embed src='.$file.' width="100%" height="100%" >'; */
						


				}else{
					header('Content-type: application/pdf');
					header('Content-Disposition: inline; filename="'.$filename	.'"');
					header('Content-Transfer-Encoding: binary');
					header('Accept-Ranges: bytes');
					@readfile($file);  
				}
			
			
			
		?>
		
		<!-- <embed src="<?php echo $file ?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
	 -->
		  <!-- <div id="pdf" style="border:0;">
			<object data="mypdf.pdf" type="application/pdf" frameborder="0" width="100%" height="600px" style="padding: 20px;">
			<embed src=<?php echo $file ?> width="100%" height="100%" >
		</object>
		</div>   -->
		
		 
		<?PHP

		}elseif ($formato=="mp4"){
			if($iphone || $android || $ipod){
				header("Location:".$datarec["cRuta"])

			?>
		<!-- cel-->
		<?php
		
			}else{
			?>
		
			<video id="player" playsinline controls controlsList="nodownload" autoplay >
				<source src=<?PHP echo ($datarec["cRuta"]);?> type="video/mp4" />
				</video>
			
			
			
		<?php }
	} 
	
	?>
</body>		
	
</html>
	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		var elem = document.getElementById("player");
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}



	</script> 

	


