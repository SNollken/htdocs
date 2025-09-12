CREATE TABLE clientes (
nome VARCHAR( 60 ) NOT NULL ,
email VARCHAR( 60 ) NOT NULL ,
sexo VARCHAR( 10 ) NOT NULL ,
ddd INT ,
telefone INT ,
endereco VARCHAR( 70 ) NOT NULL ,
cidade VARCHAR( 20 ) NOT NULL ,
estado VARCHAR( 2 ) NOT NULL ,
bairro VARCHAR( 20 ) NOT NULL ,
pais VARCHAR( 20 ) NOT NULL ,
login VARCHAR( 12 ) NOT NULL ,
senha VARCHAR( 255 ) NOT NULL ,
id INT AUTO_INCREMENT ,
UNIQUE (id)
);