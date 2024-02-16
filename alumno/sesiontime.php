<?php

// Definir máximo tiempo de poder estar inactivo (en horas)
define( 'MAX_SESSION_TIME', 3600); // 3600 * 12=12 hora   

if ( isset( $_SESSION[ 'last_activity' ] ) && 
     ( time() - $_SESSION[ 'last_activity' ] ) > MAX_SESSION_TIME ) {

    session_unset();

    if ( ini_get( 'session.use_cookies' ) ) {

        $params = session_get_cookie_params();
        setcookie( session_name(), '',
                   time() - MAX_SESSION_TIME,
                   $params[ 'path' ],
                   $params[ 'domain' ],
                   $params[ 'secure' ],
                   $params[ 'httponly' ] );
    }

    @session_destroy();     

    // Redireccionar
    header( "Location: https://valuacionproductiva.mx/" );
}

$_SESSION[ 'last_activity' ] = time();

?>