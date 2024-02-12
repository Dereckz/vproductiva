<?PHP $recurso=$_GET["ruta"];?>
<?PHP $ruta="../cursos/recurso/".$recurso?>


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

	<video id="player" playsinline controls controlsList="nodownload" autoplay >
	  <source src=<?PHP echo $ruta?> type="video/mp4" />
	</video>
	

	<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
	<script  type= text/javascript>
		var elem = document.getElementById("player");
		if (elem.requestFullscreen) {
		elem.requestFullscreen();
		}
	</script> 


