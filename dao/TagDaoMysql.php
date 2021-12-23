<?php

require_once './models/Tag.php';

class TagDaoMysql implements TagDAO{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Tag $t) 
    {

    }
    public function findAll()
    {

    }
    public function findById($id)
    {
        
    }
    public function update(Tag $t)
    {
        
    }
    public function delete($id)
    {
        
    }

}









