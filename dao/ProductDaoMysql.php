<?php

require_once './models/Product.php';
require_once './models/Tag.php';

class ProductDaoMysql implements ProductDAO{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Product $p, $t) 
    {    
        
        $sql = $this->pdo->prepare("
        START TRANSACTION;
        INSERT INTO product(namep)
        VALUES(:name);
        SELECT LAST_INSERT_ID() INTO @idEd;
        INSERT INTO tag(name)
        VALUES(:namet);
        SELECT LAST_INSERT_ID() INTO @idAs;
        INSERT INTO product_tag(product_id, tag_id)
        VALUES(@idEd,@idAs);
        COMMIT;
        ");
        
        $sql->bindValue(':name',$p->getName());
        $sql->bindValue(':namet',$t->getName());
        $sql->execute();

        $p->setId($this->pdo->lastInsertId());
        return $p;
    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("
         SELECT DISTINCT * 
         FROM 
         product p
         inner join tag t 
         inner join product_tag on
         p.id = product_id 
         where product_id = t.id
        
        ");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $p = new Product();
                $p->setId($item['id']);
                $p->setName($item['namep']);

                $array[] = $p;
            }
        }

        return $array;
    }
    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM product where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $p = new Product();
            $p->setId($data['id']);
            $p->setName($data['namep']);

            return $p;
        } else {
            return false;
        }
    }
    public function findByProduct($product)
    {   //Validando se já existe o produto cadastrado.
        $sql = $this->pdo->prepare("SELECT * FROM product where namep = :name");
        $sql->bindValue(':name', $product);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $p = new Product();
            $p->setId($data['id']);
            $p->setName($data['namep']);

            return $p;
        } else {
            return false;
        }
    }
    public function update(Product $p)
    {
        $sql = $this->pdo->prepare("UPDATE product set namep = :name WHERE id = :id");
        $sql->bindValue(":id", $p->getId());
        $sql->bindValue(':name', $p->getName());
        $sql->execute();

        return true;
    }
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM product_tag WHERE product_tag.product_id = :id AND product_tag.tag_id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

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
        $sql = $this->pdo->prepare("SELECT * FROM tag where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $t = new Tag();
            $t->setId($data['id']);
            $t->setName($data['name']);

            return $t;
        } else {
            return false;
        }
    }
  
    public function update(Tag $t)
    {
        $sql = $this->pdo->prepare("UPDATE tag set name = :name WHERE id = :id");
        $sql->bindValue(":id", $t->getId());
        $sql->bindValue(':name', $t->getName());
        $sql->execute();

        return true;
    }
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM tag WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }

}






