<?php

class Product {
    
    private $id;
    private $name;


    public function getId(){
        return $this->id;
    }

    public function setId($i){
         $this->id = trim($i);
    }
 
    public function getName(){
        return $this->name;
    }

    public function setName($n){
        $this->name = ucwords(trim($n));
   }  
}

interface ProductDAO {
    public function add(Product $p, $t);
    public function findAll();
    public function findById($id);
    public function findByProduct($product);
    public function update(Product $p);
    public function delete($id);
    public function deletept($id);

}

?>