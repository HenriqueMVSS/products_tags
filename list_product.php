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


$lista = [];
$sql = $pdo->query("SELECT DISTINCT * FROM product p inner join tag t inner join product_tag on p.id = product_id where product_id = t.id;");


if ($sql->rowCount() > 0) {

  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<head>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1 class="row d-flex justify-content-center title mb-4"> Produtos Cadastrados</h1>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-sm">

        <table class="table" id="dvData" border="1px" width="100%">
          <thead class="thead-dark">
            <tr>

              <!-- <th>Codigo</th> -->
              <th>Produto</th>
              <th>Tag do Produto</th>
              <th>Excluir Produtos</th>
              <th>Editar Produtos</th>

            </tr>
          </thead>
          <?php foreach ($lista as $key => $value) { ?>
            <tr value="<?= $value['id']; ?>">
              <td><?= $value['namep']; ?></td>
              <td><?= $value['name']; ?></td>

              <td>
                <a id="delete" href="delete_product.php?id=<?= $value['id']; ?>" onclick="return confirm(' Tem certeza que deseja excluir?')"> <img id='imgg' src="./assets/images/trash_can.png" alt=""> </a>
              </td>
              <td>
                <a id="edit" href="edit_product.php?id=<?= $value['id']; ?>"><img id='imgg' src="./assets/images/edit.png" alt=""> </a>
              </td>
            </tr>
          <?php } ?>

        </table>

        <button id="btn-register" class=" btn btn-primary" href="register.php">Cadastrar Produto</button>

        <button id="btnExport" class=" align-center btn btn-primary m-4">Emitir relatorio CSV</button>

      </div>
    </div>
  </div>


  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/xls.js"></script>
</body>