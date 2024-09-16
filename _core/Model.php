<?php

class Model extends QueryBuilder{
    public $table;
    public $id = 'id';
    public $column=[];
    public $filliale=[];

    public function __construct(){
        Parent::__construct();
    }

    public function find($id){
        $this->query("SELECT * FROM ")
        ->query($this->table)
        ->where($this->id." = ?")
        ->execute($id);
        return $this->fetch();
    }
    public function findArray($array){
        $this->query("SELECT * FROM ")
        ->query($this->table);
        
        $value=[];
        $where=[];
        foreach($array as $k=>$v){
            $where[] = $k." = ?";
            $value[]=$v;
        }
        $this->where(implode(' AND ' ,$where));
        $this->execute($value);
        return $this->fetch();
    }
    public function findAll(){
        $this->query("SELECT * FROM ")
        ->query($this->table)
        ->execute();
        return $this->fetchAll();
    }
    public function create(array $value){
        $this->query("INSERT INTO ")
        ->query('`'. $this->table . '`')
        ->query( '(`'. implode("`,`", $this->filliale) .'`)')
        ->query(" VALUES ")
        ->query("('". implode("','",$value) . "');");
        dump($this->query);
        return $this->execute();

    }
    public function update(array $array){
        $this->query("UPDATE ")
        ->query('`'. $this->table . '`')
        ->query(" SET ");

        
        $where=[];
        foreach($array as $k=>$v){
            $where[] = $k." = '".$v."' ";
        }
        $this->query(implode(' , ' ,$where));
        $this->where($this->id." = ".$array['id']."; ")
        ->execute();
        dump([$this->query]);
        return $this->fetch();

    }
    public function delete(int $id){
        $this->query("DELETE FROM ")
        ->query('`'. $this->table . '`')
        ->query(" WHERE id = ".$id);
        return $this->execute();

    }


}