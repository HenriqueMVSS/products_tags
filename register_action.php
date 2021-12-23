<?php
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

require "config.php";
require './dao/ProductDaoMysql.php';

$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$product = filter_input(INPUT_POST, 'name');
$tag =  filter_input(INPUT_POST, 'tag');


if($product && $tag){
 //Validando se já existe o produto cadastrado.
 if($productDao->findByProduct($product) == false){
    $newProduct = new Product();
    $newProduct->setName($product);

    $newTag = new Tag();
    $newTag->setName($tag);

    $productDao->add($newProduct);
    $tagDao->add($newTag);

    header("Location: list_product.php");
    exit;
    }else {
        echo"<script>alert('Produto já cadastrado no sistema!');
                location= 'register.php';</script>";
    }
    
}else {
    echo"<script>alert('Preencha todos os campos!');
    location= 'register.php';</script>";
        
    }

?>
