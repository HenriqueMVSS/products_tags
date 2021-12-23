<?php

require_once './models/Product.php';
require_once './models/Tag.php';

class ProductDaoMysql implements ProductDAO{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Product $p) 
    {
        $sql = $this->pdo->prepare("INSERT INTO product (name) VALUES (:name)");
        $sql->bindValue(':name',$p->getName());
        $sql->execute();

        $p->setId($this->pdo->lastInsertId());
        return $p;
    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM product");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $p = new Product();
                $p->setId($item['id']);
                $p->setName($item['name']);

                $array[] = $p;
            }
        }

        return $array;
    }
    public function findById($id)
    {
        
    }
    public function findByProduct($product)
    {   //Validando se já existe o produto cadastrado.
        $sql = $this->pdo->prepare("SELECT * FROM product where name = :name");
        $sql->bindValue(':name', $product);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $p = new Product();
            $p->setId($data['id']);
            $p->setName($data['name']);

            return $p;
        } else {
            return false;
        }
    }
    public function update(Product $p)
    {
        
    }
    public function delete($id)
    {
        
    }

}


class TagDaoMysql implements TagDAO{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Tag $t) 
    {
        $sql = $this->pdo->prepare("INSERT INTO tag (name) VALUES (:name)");
        $sql->bindValue(':name',$t->getName());
        $sql->execute();

        $t->setId($this->pdo->lastInsertId());
        return $t;
    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM tag");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $p = new tag();
                $p->setId($item['id']);
                $p->setName($item['name']);

                $array[] = $p;
            }
        }

        return $array;
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






