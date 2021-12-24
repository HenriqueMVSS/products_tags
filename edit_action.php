<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require "config.php";
require './dao/ProductDaoMysql.php';


$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$idProduct = filter_input(INPUT_POST, 'idProduct');
$idTag = filter_input(INPUT_POST, 'idTag');

$nameProduct = filter_input(INPUT_POST, 'product');
$nameTag = filter_input(INPUT_POST, 'tag');

if($idProduct && $idTag && $nameProduct && $nameTag){

    $product = $productDao->findById($idProduct);
    $product->setName($nameProduct);  
    $productDao->update($product);
   
    $tag = $tagDao->findById($idTag);
    $tag->setName($nameTag);
    $tagDao->update($tag);

    echo"<script>alert('Produto editado com sucesso!');
    location= 'list_product.php';</script>";

} else {
    header("Location: edit_product.php?id=".$id);
    exit;
}


  
?>
