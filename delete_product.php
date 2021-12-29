<?php 

require "config.php";
require './dao/ProductDaoMysql.php';

$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$id= filter_input(INPUT_GET, 'id');


if($id){

  $productDao->delete($id);
  $productDao->deletept($id);
  
  $tagDao->delete($id);
  
}

header('Location: list_product.php');
exit;

?>