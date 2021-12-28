<?php


class User {

    public $id;
    public $name;
    public $email;
    public $password;
    public $token;


}


interface UserDAO{

     public function findByToken($token);
     public function findByEmail($email);
     public function update(User $u);
    }