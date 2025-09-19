create schema escola;

use escola;

create table usuario(
    id integer primary key auto_increment,
    nome varchar(200) not null,
    sobrenome varchar(200) not null,
    idade integer not null,
    sexo char(1) not null
)