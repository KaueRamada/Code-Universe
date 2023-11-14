<?php
    require_once '../config/config.php';

    // friendly url
    $url = (isset($_GET['url'])) ? $_GET['url'] : '';
    
    if($url == '') {
        if(Panel::isLogged()) {
            include 'main.php'; 
        } else {
            include 'login.php';
        }    
    } else {
        if(file_exists($url.'.php')) {
            include $url.'.php';
        } else {
            include '404.php';
        }
    }
?>