<?PHP $recurso=$_GET["ruta"];?>
<?PHP $ruta="../cursos/recurso/".$recurso?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link rel="icon" type="image/png" href="https://telegra.ph/file/e2455272b9ec28c09500e.png">
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
        <script "text/javascript" src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins|Quattrocento+Sans" rel="stylesheet"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <title>{{ video_name }}</title>
	<!-- Help us to earn from your site!, if you dont want then just remove the below line -->
        <script async src="https://arc.io/widget.min.js#Dz26HcCg"></script>
        <style type="text/css" media="screen">
            html {
                font-family: Poppins;
                background: #a3a3a3;
                margin: 0;
                padding: 0;
                --plyr-color-main: #c21a36;
            }

            .logo-container {
                position: absolute;
                top: 10px;
                left: 10px;
                width: 60px;
                height: 60px;
            }
	  .plyr {
                height: 100%;
                width: 100%;
            }
            #logo {
                position: fixed;
                background-image: url("https://telegra.ph/file/e2455272b9ec28c09500e.png");
                background-size: cover;
                background-position: center;
            }

            .float {
                height: 60px;
                width: 60px;
                z-index: 10;
                border-radius: 50px;
                box-shadow: 2px 2px 3px #999;
            }

            .label-container{
	            position: relative;
                top: 5px;
                left:70px;
                display:table;
                visibility: hidden;
            }

            .label-text{
                color:#FFF;
                background:rgba(51,51,51,0.5);
                display:table-cell;
                vertical-align:middle;
                padding:10px;
                border-radius:3px;
            }

            .label-arrow{
                display:table-cell;
                vertical-align:middle;
                color:#333;
                opacity:0.5;
                transform: scaleX(-1);
            }

            a.float + div.label-container {
              visibility: hidden;
              opacity: 0;
              transition: visibility 0s, opacity 0.5s ease;
            }

            a.float:hover + div.label-container{
              visibility: visible;
              opacity: 1;
            }


    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: 9999;
    }

    .loading-text {
        position: absolute;
        top: -150;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        text-align: center;
        width: 100%;
        height: 100px;
        line-height: 100px;
    }

    .loading-text span {
        display: inline-block;
        margin: 0 5px;
        color: #00b3ff;
        font-family: 'Quattrocento Sans', sans-serif;
    }

    .loading-text span:nth-child(1) {
        filter: blur(0px);
        animation: blur-text 1.5s 0s infinite linear alternate;
    }

    .loading-text span:nth-child(2) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.2s infinite linear alternate;
    }

    .loading-text span:nth-child(3) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.4s infinite linear alternate;
    }

    .loading-text span:nth-child(4) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.6s infinite linear alternate;
    }

    .loading-text span:nth-child(5) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.8s infinite linear alternate;
    }

    .loading-text span:nth-child(6) {
        filter: blur(0px);
        animation: blur-text 1.5s 1s infinite linear alternate;
    }

    .loading-text span:nth-child(7) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.2s infinite linear alternate;
    }

    .loading-text span:nth-child(8) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.4s infinite linear alternate;
    }

    .loading-text span:nth-child(9) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.6s infinite linear alternate;
    }

    .loading-text span:nth-child(10) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.8s infinite linear alternate;
    }

    .loading-text span:nth-child(11) {
        filter: blur(0px);
        animation: blur-text 1.5s 2s infinite linear alternate;
    }

    .loading-text span:nth-child(12) {
        filter: blur(0px);
        animation: blur-text 1.5s 2.2s infinite linear alternate;
    }

    .loading-text span:nth-child(13) {
        filter: blur(0px);
        animation: blur-text 1.5s 2.4s infinite linear alternate;
    }
	
	.plyr__poster {
    background-color: #fff;
	}

    @keyframes blur-text {
        0% {
            filter: blur(0px);
        }
        100% {
            filter: blur(4px);
        }
    }

        </style>
    </head>
    <body>
       
        <video controls playsinline id="player" style="background-color: #fff;">
        </video>
        <div class="logo-container">
            <a href="https://t.me/Universal_Projects" target="_blank" rel="noopener noreferrer" class="float" id="logo"></a>
            <div class="label-container">
                <i class="fa fa-play label-arrow"></i>
                <div class="label-text">Telegram</div>
            </div>
        </div>
        <script>
		    setTimeout(videovisible, 5000)
            function videovisible() {
                            document.getElementById('loading').style.display = 'none'
                        }
			const controls = [
              'play-large', // The large play button in the center
              'play', // Play/pause playback
              'progress', // The progress bar and scrubber for playback and buffering
              'current-time', // The current time of playback
              'duration', // The full duration of the media
              'mute', // Toggle mute
              'volume', // Volume control
              'captions', // Toggle captions
              'settings', // Settings menu
              'pip', // Picture-in-picture (currently Safari only)
              'airplay', // Airplay (currently Safari only)
              'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
              'fullscreen' // Toggle fullscreen
               ];
            var defaultOptions = {
			    controls,
                "autoplay": true,
                "muted": false,
                "loop": {
                    "active": false
                },
                "captions": {
                    "active": true,
                    "update": true
                }
            };
            defaultOptions.tooltips = {controls: true, seek:true};
            defaultOptions.quality = {
                            default: "default"
                        };
            const player = new Plyr("#player", defaultOptions);
            player.source = {
                            type: "video",
                            title: "{{  alert("<?php echo $recurso; ?>"); }}",
                            sources: [
                                                    {
                                                        src: '{{ alert("<?php echo $ruta; ?>"); }}',
                                                        size: "default",
                                                 }
                                        ],
            };
        </script>
    </body>
</html>
