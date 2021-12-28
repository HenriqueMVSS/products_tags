<?php

require "config.php";
require './dao/ProductDaoMysql.php';
require_once './header.php';


$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$product = false;
$tag = false;

$id = filter_input(INPUT_GET, 'id');


if ($id) {

  $product = $productDao->findById($id);
  $tag = $tagDao->findById($id);
}

if ($product == false && $tag == false) {

  echo "<script>alert('Produto ja cadastrado no sistema!');
                location= 'register.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Produtos</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1 class="row d-flex justify-content-center title mb-4"> Editar Produtos</h1>
        </div>
      </div>
    </div>
  </header>

  <form class="form" action="edit_action.php" method="POST">
    <input type="hidden" name="idProduct" value="<?= $product->getId(); ?>">
    <input type="hidden" name="idTag" value="<?= $tag->getId(); ?>">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <label for="name"> Nome do Produto:</label>
          <input type="text" id="product" class="form-control" name="product" value="<?= $product->getName(); ?>">
        </div>
        <div class="col-sm">
          <label for="tag"> Tag do Produto: </label>
          <input type="text" id="tag" class="form-control" name="tag" value="<?= $tag->getName(); ?>">
        </div>
      </div>
    </div>
    <div class="d-flex p-5">
        <button type="submit" class="btn btn-primary d-flex justify-content-center">Editar</button>
    </div>
    

  </form>
  
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>