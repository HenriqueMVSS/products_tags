<?php

require_once './models/User.php';

class UserDaoMysql implements UserDAO {

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateUser($array)
    {
        $user = new User();
        $user->id = $array['id'] ?? 0;
        $user->name = $array['name'] ?? '';
        $user->password = $array['password'] ?? '';
        $user->email = $array['email'] ?? '';

        return $user;
    }

    public function findByToken($token)
    {
        if(!empty($token))
        {
            $sql = $this->pdo->prepare("
             SELECT 
              * FROM users
              WHERE token = :token 
            ");
            $sql->bindValue(':token',$token);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $userData = $this->generateUser($data);
                return $userData;
            }
    
        }

        return false;
    }

    public function findByEmail($email)
    {
        if(!empty($email))
        {
            $sql = $this->pdo->prepare("
             SELECT 
              * FROM users
              WHERE email = :email 
            ");
            $sql->bindValue(':email',$email);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $userData = $this->generateUser($data);
                return $userData;
            }
    
        }

        return false;
    }


    public function update(User $u)
    {
        $sql = $this->pdo->prepare("
            UPDATE users SET
            name = :name,
            email = :email,
            password = :password,
            token = :token
            WHERE  id = :id         
        ");
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        $sql->execute();

        return true;
    }

    public function insert(User $u)
    {
        $sql = $this->pdo->prepare("
        INSERT INTO users (
            name,
            email,
            password,
            token
        ) VALUES (
            :name,
            :email,
            :password,
            :token
        )
        ");
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':token', $u->token);
        $sql->execute();

        return true;
    }

}