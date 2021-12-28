<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require 'config.php';
require './dao/ProductDaoMysql.php';
require_once './header.php';


$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$list_product = $productDao->findAll();
$list_tag = $tagDao->findAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Cadastro de Produtos</title>
</head>

<body>

  <form method="POST" action="register_action.php">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <label for="name"> Nome do Produto:</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Produto" required>
        </div>
        <div class="col-sm">
          <label for="tag"> Tag do Produto: </label>
          <input type="text" id="tag" class="form-control" name="tag" placeholder="Insira o nome da tag" required>
        </div>
      </div>
    </div>

    <div class="container mx-7 m-4">
      <div class="row">
        <div class="col-sm">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>

      </div>




  </form>



  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>