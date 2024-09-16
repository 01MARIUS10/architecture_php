<?php

class Database{
    private $db;

    public function __construct(){
        global $DB_DNS;
        global $option;
        if(!$this->db){
            $this->db = new PDO($DB_DNS,DATABASE_USER,DATABASE_PASSWORD,$option);
        }
    }
    public  function getPDO(): \PDO{
        return $this->db;
    }

};

