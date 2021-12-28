<hr>
 <h1 align="center" color="red">SISTEMA DE CADASTRO DE PRODUTOS E TAG</h1>

 

** Criar um banco de dados com um nome de sua prefer�ncia!**

** Ap�s a cria��o do banco, utilizar os SCRIPTS abaixo para cria��o das tabelas.**

<textarea id="story" name="story"
          rows="50" cols="38">
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(40),
    password VARCHAR(200),
    token VARCHAR(200)
);

CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `namep` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`namep`)
);

CREATE TABLE `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
);

CREATE TABLE `product_tag` (
   `product_id` int NOT NULL,
   `tag_id` int NOT NULL,
   PRIMARY KEY (`product_id`,`tag_id`),
   CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
   CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
);

</textarea>

** Cadastrar um usu�rio para poder manipular o sistema**

**Na tela de login clica no bot�o ######Create an Account! **


??? Desenvolvido por Henrique Silva!


