create table pessoas (
id int auto_increment,
nome varchar(30)not null,
cpf int(10) not null,
cep int(10)not null,
endereco varchar(50)not null,
numero int(10) not null,
bairro varchar(20)not null,
cidade varchar(10) not null,

primary key(cpf)
)default charset= utf8; 

use dados;

insert into pessoas values

(default,'Gisela','619556','5495','Alameda','89','Pituba','Salvador')


/* primary key  (cpf); //mudar o primarykey pra cpf */