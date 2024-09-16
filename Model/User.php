<?php

class UserModel  extends Model{
    public function __construct(){
        Parent::__construct();
        $this->table = "User";
        $this->column = ["id","nom"];
        $this->filliale = ['nom', 'prenom', 'email', 'password'];
    }
}
