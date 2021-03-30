<?php

function wl( $someString )
{
    echo $someString . "</br>";
}

// Code copied from https://www.php.net/manual/en/function.session-status.php
// 2021/03/29
function isSessionStarted()
{
    if( php_sapi_name() !== 'cli' ) {
        if( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function startSession( 
    int $lifetime_or_options = 1800, // Default is 30 minutes. 
    string|null $path = null , 
    string|null $domain = null , 
    bool|null $secure = null , 
    bool|null $httponly = null,
    string|null $samesite )
{
    $cookieParams = array(
        'lifetime' => $lifetime_or_options
    );

    if( $path != null && $path != "" ) {
        $cookieParams[ 'path' ] = $path;
    }
    
    if( $domain != null && $domain != "" ) {
        $cookieParams[ 'domain' ] = $domain;
    }
    
    if( $secure != null && $secure != "" ) {
        $cookieParams[ 'secure' ] = $secure;
    }
    
    if( $httponly != null && $httponly != "" ) {
        $cookieParams[ 'httponly' ] = $httponly;
    }
    
    if( $samesite != null && $samesite != "" ) {
        $cookieParams[ 'samesite' ] = $samesite;
    }

    session_set_cookie_params( $cookieParams );

    if( !isSessionStarted() ) {
        session_start();
    }
}

?>