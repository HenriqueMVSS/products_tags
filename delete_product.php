<?php 

require "config.php";

$id= filter_input(INPUT_GET, 'id');

if($id){

  $sql = $conn->prepare("DELETE FROM product WHERE id=:id");
  $sql->bindValue(':id', $id);
  $sql->execute();
   
}

header('Location: list_product.php');
exit;

?>