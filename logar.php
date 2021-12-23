<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'config.php';
require './dao/ProductDaoMysql.php';
require './dao/TagDaoMysql.php';

$productDao = new ProductDaoMysql($pdo);

$list_product = $productDao->findAll();

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
  <header>
    <h1 class="title">Cadastro de Produtos</h1>
  </header>
  
  <form>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="name"> Nome do Produto:</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Produto">
    </div>
    <div class="form-group col-lg-6">
      <label for="tag" > Tag do Produto: </label>
        <input type="text" id="tag" class="form-control" name="tag"  placeholder="Insira o nome da tag">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
    
  <button id="btn-cadastrar" class="btn btn-primary">Lista de Produtos</button>

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
