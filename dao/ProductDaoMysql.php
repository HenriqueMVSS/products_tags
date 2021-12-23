<?php

require_once './models/Product.php';

class ProductDaoMysql implements ProductDAO{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Product $p) 
    {

    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM products");
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
    public function update(Product $p)
    {
        
    }
    public function delete($id)
    {
        
    }

}









