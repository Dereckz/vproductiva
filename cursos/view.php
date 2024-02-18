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

		if($formato=="pdf"){ 
			require('../fpdf/fpdf.php');
			$archivoconextension= explode('/',$datarec['cRuta']);
			$pdf2=$archivoconextension[3];

			$file = $archivoconextension[2].'/'.$archivoconextension[3];
			$filename = $archivoconextension[3];
				if($iphone || $android || $ipod){
					/* 	echo '<object data="mypdf.pdf" type="application/pdf" frameborder="0" width="100%" height="600px" style="padding: 20px;">
						<embed src='.$file.' width="100%" height="100%" >'; */
						header('Content-type: application/pdf');
						header('Content-Disposition: inline; filename="'.$filename	.'"');
						header('Content-Transfer-Encoding: binary');
						header('Accept-Ranges: bytes');
						@readfile($file);  	
			?>

			<!-- <iframe ?wmode="transparent" type="application/pdf" id="iframe" 
			src="ViewerJS/#cs.pdf" width="100%" height="100%" allowfullscreen webkitallowfullscreen></iframe> -->
			<!-- <iframe id="pdf-js-viewer" src="pdfjs/web/viewer.html?file=%"<?php echo $datarec['cRuta'] ?> title="webviewer" frameborder="0" width="100%" height="auto"></iframe> -->
			<!--<iframe src = "/ViewerJS/#../demo/ohm2013.odp" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>	-->		
			
			<!-- <script src='/lib/webviewer.min.js'></script>
			<div><iframe src="pdfjs/web/viewer.html?file=cs.pdf" style="position: relative;   top: 0;  bottom: 0; left: 0;   width: 100%;   height: 700px;  border: 0"></iframe></div>
			<div -->>
     
			<?php

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
				$archivoconextension= explode('/',$datarec['cRuta']);
				$file = $archivoconextension[2].'/'.$archivoconextension[3];
				//$filename = $archivoconextension[3];
			
				//header("Location:".$datarec["cRuta"]);
			}
			?>
				
			<!-- cel-->
			
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
				
				<!-- 	<iframe src=<?PHP echo ($datarec["cRuta"]);?> 
						allow="acceleromter; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen="" width="100%" height="50%" frameborder="0">
					</ifame> -->
					
				
			</body>
			
				

		<?php
		
			}else{
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
	
	
	?>
</html>
	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		
	var elem = document.getElementById(id);
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}
		

	</script> 




