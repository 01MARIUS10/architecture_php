<?php

class UserController extends Controller{
    public $userService;

    public function __construct(){
        Parent::__construct();
        $this->userService = new UserService();
    }
    public function home(){
        $users = $this->userService->userModel->findAll();        
        Parent::getPage()->renderView("/Page/home.php",[
            'users'=>$users
        ]);
    }
    public function login(){
        Parent::getPage()->renderView("/Page/login.php");
    }
    public function logout(){
        unset($_SESSION['user']);
        Parent::getPage()->renderView("/Page/login.php");
    }
    public function auth($params){
        if(isset($params['email']) && isset($params['password'])){
            $email = trim($params['email']);
            $password = trim($params['password']);
            $user = $this->userService->login($email,$password);
            dump(['session'=>$_SESSION]);
            Parent::redirect('/home');
        }
        Parent::redirect('/login');

        //Parent::getPage()->renderView("/Page/up.php");
    }
    public function new(){
        Parent::getPage()->renderView("/Page/new.php");
    }
    public function edit($params){
        if(isset($params['id'])){
            $user = $this->userService->userModel->find($params['id']);
            if($user){
                Parent::getPage()->renderView("/Page/edit.php",[
                    'user'=>$user
                ]);
            }
            else{
                Parent::getPage()->renderView("/erreur404.php");
            }
        }
        else{
            Parent::getPage()->renderView("/erreur404.php");
        }
    }
    public function register($params){
        dump($params);

        $user = $this->userService->userModel->create([
            $params['nom'],
            $params['prenom'],
            $params['email'],
            $params['password']
        ]); 
        Parent::redirect('/home');
    }

    // public function update($params){
    //     dump($params);

    //     $user = $this->userService->userModel->create([
    //         $params['nom'],
    //         $params['prenom'],
    //         $params['email'],
    //         $params['password']
    //     ]); 
    //     Parent::redirect('/home');
    // }
    public function update($params){
        $user = $this->userService->userModel->update([
            'id' => $params['id'],
            'nom' => $params['nom'],
            'prenom' => $params['prenom'],
            'email' => $params['email'],
            'password' => $params['password']
        ]);
        Parent::redirect('/home');
        //Parent::getPage()->renderView("/Page/up.php");
    }
    public function delete($params){
        $id = $params['id'];
        $user = $this->userService->userModel->delete($id);
        Parent::redirect('/home');
        //Parent::getPage()->renderView("/Page/edit.php");
    }
    

}

?>