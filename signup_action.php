<?php

require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');


if($name && $email && $password){
    
    $auth = new Auth($pdo, $base);

    if($auth->emailExists($email) === false)
    {
        $auth->registerUser($name, $email, $password);
        echo"<script>alert('Usuário Cadastrado com Sucesso.');
        location= '$base'; </script>";

    } else
     {

        echo"<script>alert('E-mail já Cadastrado.');
        location= '$base./signup.php'; </script>";

    }
}

echo"<script>alert('Campos nao Enviados.');
    location= '$base./signup.php'; </script>";





?>  