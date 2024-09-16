<?php
define("URL",$_SERVER["REQUEST_URI"]);
define("URL_METHOD",trim($_SERVER["REQUEST_METHOD"],'/'));



define("URL_ROUTE",explode("?",URL)[0]);
//define ("SERVER_ROUTE","http://".$_SERVER["SERVER_NAME"]."/" );


$port = $_SERVER["SERVER_PORT"];
$protocol = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== 'off') ? 'https' : 'http';

// If the port is not 80, include it in the SERVER_ROUTE
if ($port != 80) {
    define("SERVER_ROUTE", $protocol."://" . $_SERVER["SERVER_NAME"] . ":" . $port );
} else {
    define("SERVER_ROUTE", $protocol."://" . $_SERVER["SERVER_NAME"] );
}


?>