<?php 

require "config.php";

$info =[];
$id= filter_input(INPUT_GET, 'id');

$lista = [];
$sql = $conn->query("SELECT * FROM cursos");


if ($sql->rowCount() > 0) {
  
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  
}

if($id){
  $sql = $conn->prepare("SELECT * FROM aluno WHERE id = :id");
  $sql->bindValue(':id', $id);
  $sql->execute();

  if($sql->rowCount() != 0) {
      $info = $sql->fetch(PDO::FETCH_ASSOC);


} else{
    header('Location: lista_alunos.php');
    exit;
  }
}else{
  header('Location: lista_alunos.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Cadastro de alunos</title>
</head>
<body>
  <h1 class="title">Editar Alunos</h1>
    <a id="button"   href="lista_alunos.php">Lista de Alunos Cadastrados</a>
    <form class="form" action="edit.php" method="POST">
     <input type="hidden" name="id" value="<?=$info['id'];?>"> 
      <label>
        Nome: <br>
        <input type="text" name="name" value="<?=$info['name_aluno'];?>">
      </label> </br>
      <label class='date'>
        Data de Nascimento: <br>
        <input type="date" name="data" value="<?=$info['dn'];?>">
      </label> <br>
       <label>
        CPF: <br>
        <input type="text" name="cpf" value="<?=$info['cpf'];?>">
      </label> <br>
       <label>
        Telefone: <br>
        <input type="text" name="telephone" value="<?=$info['telefone'];?>">
      </label> <br>
       <label>
        Whatsapp: <br>
        <input type="text" name="whatsapp" value="<?=$info['wpp'];?>">
      </label> <br>
      <label>
        Curso:
        <select >
          <?php foreach ($lista as $key => $value){ ?>
          <option > <?=$value['courses'];?></option>
          <?php } ?>
        </select>
        
      </label> <br>
      <input type="submit" value="Salvar">
    </form>
</body>
</html>