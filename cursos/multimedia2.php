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
<?php if ($formato=="mp4"){?>
	<video id="player" playsinline controls controlsList="nodownload" autoplay >
	  <source src=<?PHP echo ($datarec["cRuta"]);?> type="video/mp4" />
	</video>
	
<?php }else if($formato=="pdf"){ 
	 	$archivoconextension= explode('/',$datarec['cRuta']);
		 $pdf=$archivoconextension[3];
		 
		 $file = 'recurso/recurso5.pdf';
		 $filename ='recurso5.pdf';
		 header('Content-type: application/pdf');
		 header('Content-Disposition: inline; filename="' . $filename . '"');
		 header('Content-Transfer-Encoding: binary');
		 header('Content-Length: ' . filesize($file));
		 header('Accept-Ranges: bytes');
		 @readfile($file);
	 
}?>
	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		var elem = document.getElementById("player");
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}
	</script> 


