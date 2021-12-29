<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT DISTINCT * FROM product p inner join tag t inner join product_tag on p.id = product_id where product_id = t.id;");


if ($sql->rowCount() > 0) {

  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
 <!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Produtos.xls';
		// Criamos uma tabela HTML com o formato da planilha
        ?>
		<table class="table" border="1px" width="40%">
          <thead class="thead-dark">
            <tr>

              <!-- <th>Codigo</th> -->
              <th class="product">Produto</th>
              <th class="tag">Tag do Produto</th>
              
            </tr>
          </thead>
          <?php foreach ($lista as $key => $value) { ?>
            
              <td><?= $value['namep'] ?></td>
              <td><?= $value['name'] ?></td>
		
    		</tr>
		<?php } ?>
        
		</table>
		<?php 
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		
		exit; ?>
	</body>
</html>