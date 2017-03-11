<?php
/**
 * Created by Aid on 6/29/2016 3:31 PM.
 */

session_start();


//array globalnih varijabli
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'db'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

//pozivanje classova kada je to potrebno
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});


//pozivanje funkcije htmlentities iz sanitize classa
require_once 'functions/sanitize.php';


//provjeravanje da li je user kliknuo remember me
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}