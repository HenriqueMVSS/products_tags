<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'config.php';
require './dao/ProductDaoMysql.php';
require './dao/TagDaoMysql.php';

$productDao = new ProductDaoMysql($pdo);
$tagDao = new TagDaoMysql($pdo);

$list_product = $productDao->findAll();

?>
<head>
 <link rel="stylesheet" href="./styles/style.css">
</head>
 <body>
 <header id="cb">
 <h1 class="title"> Alunos Cadastrados</h1>
  <a id="button"   href="index.php">Cadastrar Aluno</a>
 </header>

 
<table border="1px" width="100%" id="table">
  <tr>
    
    <th>Código</th>

    <th>Produto</th>

    <th>Tag do Produto</th>
    
    <th>Deletar</th>

    <th>Editar</th>
  </tr>

  <?php foreach ($list_product as $product){ ?>
  <tr>
      <td><?=$product->getId();?></td>
      <td><?=$product->getName();?></td>
      <td>
            <a id="excluir" href="exc_alunos.php?id=<?=$product->getId();?>" onclick="return confirm(' Tem certeza que deseja excluir?')"> <img id='imgg' src="./assets/lixeira.png" alt=""> </a>
      </td>
      <td>
         <a id="editar" href="edit_alunos.php?id=<?=$product->getId();?>"><img id='imgg' src="./assets/editt.png" alt="">  </a>
      </td>
    </tr>
  <?php } ?>

</table>

</body>