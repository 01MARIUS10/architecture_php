<?php

class Controller{
    public $page ;
    public $page404 = '/erreur404.php';

    public function __construct(){
        $this->page = new View();
    }
    public function getPage(){
        return $this->page;
    }
    public function renderJson($response){
        echo json_encode($response);
    }
    public function redirect($path){
        header('Location: '.SERVER_ROUTE.$path);
        exit();
    }
    public function pageNotFound(){
        $this->getPage()->renderView($this->page404);
    }

}

?>