<?php

namespace Codesses\php\Models
{
    require_once "utl.php";

// Copied and modified from https://www.php.net/manual/en/function.session-start.php
// on 2021/04/10
class Session
{
    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;

    // The state of the session.
    private $sessionState = self::SESSION_NOT_STARTED;

    // Make the class a singleton.
    private static $instance;
    private function __construct() {}
    public static function getInstance()
    {
        if( !isset( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // Indicate whether the session has been started.
    public function isStarted()
    {
        return $this->sessionState;
    }

    public function getUserId()
    {
        return $this->isStarted() ? $this->__get( "user_id" ) : null;
    }

    /**
    *    (Re)starts the session.
    *   
    *    @return    bool    TRUE if the session has been initialized, else FALSE.
    **/
    public function startSession( $user_id )
    {
        if( $this->sessionState == self::SESSION_NOT_STARTED ) {
            $this->sessionState = session_start();
            $this->__set( "user_id", $user_id );
        }
        return $this->sessionState;
    }

    /**
    *    Stores datas in the session.
    *    Example: $instance->foo = 'bar';
    *   
    *    @param    name    Name of the datas.
    *    @param    value    Your datas.
    *    @return    void
    **/
    public function __set( $name , $value )
    {
        $_SESSION[$name] = $value;
    }

    /**
    *    Gets datas from the session.
    *    Example: echo $instance->foo;
    *   
    *    @param    name    Name of the datas to get.
    *    @return    mixed    Datas stored in session.
    **/
    public function __get( $name )
    {
        if( isset($_SESSION[$name]) ) {
            return $_SESSION[$name];
        }
    }

    public function __isset( $name )
    {
        return isset($_SESSION[$name]);
    }

    public function __unset( $name )
    {
        unset( $_SESSION[$name] );
    }

    /**
    *    Destroys the current session.
    *   
    *    @return    bool    TRUE is session has been deleted, else FALSE.
    **/
    public function destroy()
    {
        if( $this->sessionState == self::SESSION_STARTED ) {
            $this->sessionState = !session_destroy();
            unset( $_SESSION );
            return !$this->sessionState;
        }

        return FALSE;
    }
}

/*
    Examples:

// We get the instance
$data = Session::getInstance();

// Let's store datas in the session
$data->nickname = 'Someone';
$data->age = 18;

// Let's display datas
printf( '<p>My name is %s and I\'m %d years old.</p>' , $data->nickname , $data->age );

    // It will display:
   
    // Array
    // (
    //     [nickname] => Someone
    //     [age] => 18
    // )

printf( '<pre>%s</pre>' , print_r( $_SESSION , TRUE ));

// TRUE
var_dump( isset( $data->nickname ));

// We destroy the session
$data->destroy();

// FALSE
var_dump( isset( $data->nickname ));
*/






}


?>