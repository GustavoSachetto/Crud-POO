# Crud-POO
![Crud POO](https://github.com/user-attachments/assets/301aafbe-15d3-475e-adad-422c5c77e0bd)

## Sobre
Crud POO é um projeto de estudo baseado numa atividade proposta tem sala de aula para a matéria de Sistemas Web. A atividade consiste em realizar o __cadastro, exibição, alteração e exclusão__ das tabelas 
apresentadas no banco de dados (que se encontra na pasta database), aplicando o __padrão MVC__ junto da __programação orientada a objetos (POO)__.

* __Link de acesso:__ https://gustavosachetto.site/crud-poo

## Desenvolvendo
Esse projeto foi desenvolvido inteiramente com: __PHP, HTML, BOOTSTRAP e MySQL.__ Nele foi abordado principalmente a programação orientada a objetos, além de reforçar a conexão com banco de dados através do PDO.

O banco de dados é composto por 3 tabelas elas são:

__Tabela cargo:__

| Nome             | Tipo         | Chave        | Extra            |
| ---------------- | ------------ | ------------ | ---------------- |
| codCargo         | int          | primay key   | auto increment   |
| nomeCargo        | varchar (50) | unique       | not null         |

__Tabela departamento:__

| Nome             | Tipo         | Chave        | Extra            |
| ---------------- | ------------ | ------------ | ---------------- |
| codDartamento    | int          | primay key   | auto increment   |
| nomeDepartamento | varchar (45) | unique       | not null         |

__Tabela funcionário:__

| Nome             | Tipo         | Chave        | Extra            |
| ---------------- | ------------ | ------------ | ---------------- |
| funcional        | int          | primay key   | auto increment   |
| cpf              | char (11)    | unique       | not null         |
| nome             | varchar (40) |              | not null         |
| telefone         | char (15)    |              |                  |
| endereco         | varchar (70) |              | not null         |
| codCargo         | int          | foreign Key  | not null         |
| codDepartamento  | int          | foreign Key  | not null         |

***********
