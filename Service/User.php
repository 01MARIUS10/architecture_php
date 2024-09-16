<?php

class UserService {
    public $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel;   
    }

    public static function user(){
        if(isset($_SESSION) && isset($_SESSION['USER'])){
            return $_SESSION['USER'];
        }
        else{
            return false;
        }
    }
    public function login($userLogin,$userPass){
        $user = $this->userModel->findArray([
            'email'=>$userLogin,
            'password'=>$userPass
        ]);

        if(!$user) return false;
        
        $_SESSION["user"] = $user; 
        return $user;
    }
    

}