<?php 

require "config.php";
require './dao/ProductDaoMysql.php';


$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$product =false;
$tag =false;
$id= filter_input(INPUT_GET, 'id');


if($id){

  $product = $productDao->findById($id);
  $tag = $tagDao->findById($id);  

 
}

if($product == false && $tag == false) {
 
  echo"<script>alert('Produto jÃ¡ cadastrado no sistema!');
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
  <h1 class="title">Editar Produtos</h1>
     
  <form class="form" action="edit_action.php" method="POST">
       <input type="hidden" name="idProduct" value="<?=$product->getId();?>"> 
       <input type="hidden" name="idTag" value="<?=$tag->getId();?>"> 
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name"> Nome do Produto:</label>
                <input type="text" id="product" class="form-control" name="product" value="<?=$product->getName();?>">
            </div>
           <div class="form-group col-lg-6">
              <label for="tag" > Tag do Produto: </label>
              <input type="text" id="tag" class="form-control" name="tag" value="<?=$tag->getName();?>">
           </div>
          </div>
     <button type="submit" class="btn btn-primary">Editar</button>
  </form>
  <div>
    <button id="btn-list" class="btn btn-primary">Lista de Produtos</button>
  </div>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>