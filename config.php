<?php
require_once('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$base = 'http://localhost/products_tags/';

try {
  
  $pdo = new PDO( "mysql:host=". $_ENV['SERVIDOR'] .";port=". $_ENV['PORTA'].";dbname=". $_ENV['BANCO'], 
  $_ENV['USUARIO'],
  $_ENV['SENHA']);

  // echo "Conectado no banco de dados!!";
} catch (PDOException $exception1) {
  echo "<h1>Caught PDO exception:</h1>";
  echo $exception1->getMessage() . PHP_EOL;
  echo "<h1>PHP Info for troubleshooting</h1>";
  phpinfo();
}

