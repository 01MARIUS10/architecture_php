<?php

class View{
    private $pageRoute;
    private $data = [];
    private $template;

    public function __construct(){
        $this->pageRoute = path('View');
        $this->template = path("/View/template.php");
    }
    public function renderView($page,$data=[]){
        extract($data);
        ob_start();
        require_once $this->pageRoute.$page;
        $content = ob_get_clean();
        require_once $this->template;
    }
    // public function add(array $data){
    //     $this->data+=$data;
    //     return $this;
    // }

}


?>