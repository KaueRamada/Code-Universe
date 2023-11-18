<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    /* website path */
    define('INCLUDE_PATH', 'http://localhost/CodeUniverse/');
    define('INCLUDE_PATH_ADMIN', 'http://localhost/CodeUniverse/admin/');

    /* database connection */
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'my-blog');

    require 'connection.php';

    // user permission roles
    define('USER_ROLES', array('Administrador', 'Usuário'));

    /* autoload classes */
    $autoload = function($class) {
        $path = 'classes/'.$class.'.php';
        if(file_exists($path)) {
            require_once $path;
        } else if(file_exists('../'.$path)) {
            require_once '../'.$path;
        }
    };
    spl_autoload_register($autoload);
?>
