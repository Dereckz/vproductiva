<?php
function validate_session()
{
    //error_reporting(E_ERROR | E_PARSE);
        $time_outvalue = 18000;  // for session timeout
         $lastActive = $_SESSION['lastActiveTime']??'0';
         $userName = $_SESSION['USERNAME']??'';
         $sessionId = $_SESSION['SESSION_ID']??'0';
        $now = time();
        $diff = $now - $lastActive;
        $username = $userName;
        $session_id = $sessionId;
        if(($diff >= $time_outvalue && isset($lastActive)) || (($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) && ($_SESSION['REMOTE_ADDR'] != $_SERVER['REMOTE_ADDR']))){            // Session timeout

            setcookie("PHPSESSID", "", time()-3600);
            unset($lastActive);
            unset($userName);
            session_destroy();

        }

        $lastActive = time();
}
?>