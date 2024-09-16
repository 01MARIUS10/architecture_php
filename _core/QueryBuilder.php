<?php 

class QueryBuilder extends Database{
    public $query;
    public $params;
    public $request;

    public function __construct(){
        Parent::__construct();
        $this->query="";
        $this->params=[];
    }
    public function query(string $sql){
        $this->query.=" ".$sql;
        return $this;
    }

    public function where($condition){
        $this->query.=" WHERE ".$condition ;
        return $this;
    }
    public function andWhere($condition){
        $this->query.=" \AND ".$condition ;
        return $this;
    }
    public function execute($params=[]){
        $DB = $this->getPDO();
        $this->request = $DB->prepare($this->query);
        if(!is_array($params)) $params = [$params];
        $this->request->execute($params);

        $this->query="";
        $this->params=[];
    }
    public function fetch($mode = PDO::FETCH_OBJ){
        return $this->request->fetch($mode);
    }
    public function fetchAll($mode = PDO::FETCH_OBJ){
        return $this->request->fetchAll($mode);
    }    

}