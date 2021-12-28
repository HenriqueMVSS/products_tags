<?php

$base = 'http://localhost/products_tags/';

try {
  $serverName = "localhost";
  $database = "products";
  $user = "root";
  $password = "";

  $pdo = new PDO("mysql:host=$serverName;port=3306;dbname=$database", $user, $password);

  // echo "Conectado no banco de dados!!";
} catch (PDOException $exception1) {
  echo "<h1>Caught PDO exception:</h1>";
  echo $exception1->getMessage() . PHP_EOL;
  echo "<h1>PHP Info for troubleshooting</h1>";
  phpinfo();
}

