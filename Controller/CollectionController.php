<?php

class CollectionController extends Controller{
    public $collectionModel;

    public function __construct($collection){
        Parent::__construct();
        $this->collectionModel = $collection;
    }
    public function Show($params){
        $collections = $this->collectionModel->findAll();
        Parent::renderJson(['collections'=>$collections,'params'=>$params]);
    }
}

?>