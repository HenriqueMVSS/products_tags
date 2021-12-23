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
    public function add(Product $p);
    public function findAll();
    public function findById($id);
    public function update(Product $p);
    public function delete($id);

}

?>