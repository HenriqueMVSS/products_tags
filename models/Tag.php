<?php

class Tag {
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

interface TagDAO {
    public function add(Tag $t);
    public function findAll();
    public function findById($id);
    public function update(Tag $t);
    public function delete($id);

}


?>