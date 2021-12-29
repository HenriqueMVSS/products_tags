<hr>
 <h1 align="center" color="red">SISTEMA DE CADASTRO DE PRODUTOS E TAG</h1>

 ## Orientações de Utilização

**Criar um banco de dados com um nome de sua preferência!**

**Após a criação do banco, utilizar os SCRIPTS abaixo para criação das tabelas.**


**CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(40),
    password VARCHAR(200),
    token VARCHAR(200)
);**

**CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `namep` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`namep`)
);**

**CREATE TABLE `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
);**

**CREATE TABLE `product_tag` (
   `product_id` int NOT NULL,
   `tag_id` int NOT NULL,
   PRIMARY KEY (`product_id`,`tag_id`),
   CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
   CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
);**

**Rodar o comando `composer install`, criar um arquivo de nome `.env` e utilizar o `.env.example` como modelo para configuração**

**Cadastrar um usuário para poder manipular o sistema**

**Na tela de login clica no botão ###### Create an Account!**


#### Desenvolvido por Henrique Silva!


