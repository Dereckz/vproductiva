
    var tstampActual = 0;
    var comprobar = 120;
    
    function actividad() {
    
    var tstamp = new Date().getTime();
    
    if (Math.abs(tstampActual - tstamp) > comprobar) {
    
    document.getElementById('expirado').style.display = 'inline';
    
    } else {
    
    document.getElementById('expirado').style.display = 'none';
    
    }
    }
    
    
    window.addEventListener('load', function() {
    
    document.body.addEventListener('mousemove', function() {
    
    tstampActual = new Date().getTime();
    
    }, false);
    
    setInterval(actividad, comprobar);
    });