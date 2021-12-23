<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require "config.php";

$name = filter_input(INPUT_POST, 'name');
$dn = filter_input(INPUT_POST, 'data');
$cpf = filter_input(INPUT_POST, 'cpf');
$tel = filter_input(INPUT_POST, 'telephone');
$wpp = filter_input(INPUT_POST, 'whatsapp');
$course =  filter_input(INPUT_POST, 'course');

if($cpf){
    $sql = $conn->query("SELECT * FROM aluno WHERE cpf = $cpf ");
    $retorno = $sql->rowCount();
    $sql->execute();
    if($retorno === 0){
    $sql = $conn->prepare("INSERT INTO aluno (name_aluno, dn, cpf, telefone, wpp) VALUES (:name, :dn, :cpf, :tel, :wpp)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':dn', $dn);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':tel', $tel);
    $sql->bindValue(':wpp', $wpp);
    $sql->execute();
    
    if($course){
    $sql = $conn->prepare("INSERT INTO cursos (courses) VALUES (:course)");
    $sql->bindValue(':course', $course);
    $sql->execute();
    }

    header("Location: lista_alunos.php");
    exit;
    }else {
        echo "<script>alert('CPF já cadastrado!')</script>";
        
    }
}else {
    header("Location: index.php");
    exit;
}   
?>
<html>
<head>
  <link rel="stylesheet" href="./styles/style.css">
</head>
  <a id="button"   href="cad_alunos.php">Retornar para cadastrado</a>
</html>