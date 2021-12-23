<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'config.php';
require './dao/ProductDaoMysql.php';


$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$list_product = $productDao->findAll();
$list_tag = $tagDao->findAll();

?>
<head>
 <link rel="stylesheet" href="./assets/css/style.css">
</head>
 <body>
 <header >
     <h1 class="title"> Produtos Cadastrados</h1>
 </header>

 
<table border="1px" width="100%" id="table">
  <tr>
    
    <th>Código</th>
    <th>Produto</th>
    <th>Excluir Produtos</th>
    <th>Editar Produtos</th>
    <th>Tag do Produto</th>
    <th>Deletar Tag</th>
    <th>Editar Tag</th>
    

    
  </tr>

  <?php foreach ($list_product as $product){ ?>
  <tr>
      <td><?=$product->getId();?></td>
      <td><?=$product->getName();?></td>
      <td>
            <a id="delete" href="exc_alunos.php?id=<?=$product->getId();?>" onclick="return confirm(' Tem certeza que deseja excluir?')"> <img id='imgg' src="./assets/images/trash_can.png" alt=""> </a>
      </td>
      <td>
         <a id="edit" href="edit_alunos.php?id=<?=$product->getId();?>"><img id='imgg' src="./assets/images/edit.png" alt="">  </a>
      </td>
   <?php } ?> 
   <?php foreach ($list_tag as $tag){ ?>  
    
      <td><?=$tag->getName();?></td>

      <td>
            <a id="delete" href="exc_alunos.php?id=<?=$tag->getId();?>" onclick="return confirm(' Tem certeza que deseja excluir?')"> <img id='imgg' src="./assets/images/trash_can.png" alt=""> </a>
      </td>
      <td>
         <a id="edit" href="edit_alunos.php?id=<?=$tag->getId();?>"><img id='imgg' src="./assets/images/edit.png" alt="">  </a>
      </td>
    </tr>
  <?php } ?>

</table>
    <button id="btn-register"  href="register.php">Cadastrar Produto</button>

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>