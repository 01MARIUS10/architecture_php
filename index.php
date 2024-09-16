<?php


    $url = (isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"==="on"]) ? 'https://' : 'http://';

    //le nom de domaine du server, localhost par exemple
    $url.=$_SERVER['HTTP_HOST'];

    $uri=$_SERVER["REQUEST_URI"];

    if(isset($_SERVER['HTTP_REFERER']))
        define('HTTPROOT', $_SERVER['HTTP_REFERER'] );


    require_once "./_core/Kernel.php";


?>