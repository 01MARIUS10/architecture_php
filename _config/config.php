<?php
//sessions
session_start();
// ini_set('session.cookie_lifetime',false);

//error display
error_reporting(E_ALL);
ini_set('display_errors',true);

//constants
    //path
    define("PATH_REQUIRE",substr($_SERVER["SCRIPT_FILENAME"],0,-9));
    define("PATH",substr($_SERVER["PHP_SELF"],0,-9));
    define("ROOTPATH",$_SERVER['DOCUMENT_ROOT']."/");

    //website info
    define("WEBSITE_TITLE","Mon site");
    define("WEBSITE_NAME","");
    define("WEBSITE_URL","");
    define("WEBSITE_DESCRIPTION","");
    define("WEBSITE_KEYWORDS","");
    define("WEBSITE_LANGUAGE","");
    define("WEBSITE_AUTHOR","");
    define("WEBSITE_AUTHOR_MAIL","");

    //database info
    define("DATABASE_HOST","127.0.0.1");
    define("DATABASE_NAME","CRUD");
    define("DATABASE_USER","Ecollection");
    define("DATABASE_PASSWORD","Ecollection");


 ?>