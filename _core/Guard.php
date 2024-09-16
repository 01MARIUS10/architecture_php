<?php

class Guard{
    public static function Auth(){
        if(isset($_SESSION) && isset($_SESSION["user"])){
            return true;   
        }
        redirect('/login');
        return false;
    }
}

?>