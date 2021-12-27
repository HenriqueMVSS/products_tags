<?php

class Tag {
    private $id;
    private $namet;

    public function getId(){
        return $this->id;
    }

    public function setId($i){
         $this->id = trim($i);
    }
 
    public function getName(){
        return $this->namet;
    }

    public function setName($n){
        $this->namet = ucwords(trim($n));
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