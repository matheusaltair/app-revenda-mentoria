# MVC - API - CRUD - REVENDA DE CARROS

Essa é uma aplicação RESTFul API e também uma aplicação MVC usando Blade construída com Laravel 8. Neste projeto uma aplicação de revenda de carros é trabalhada com operações de CRUD.

Essa aplicação inclui as seguintes funciionalidades:

- Inserção do carro.
- Lista de carros.
- Atualização do carro.
- Exclusão o carro.
- Pesquisa por id do carro
- [Página de CRUD usando o MVC - Exemplo](https://app-revenda-mentoria.herokuapp.com/revenda)
- [API - Exemplo](https://app-revenda-mentoria.herokuapp.com/api/revenda)

## Instalação
Comandos
```bash
git clone https://github.com/matheusaltair/app-revenda-mentoria.git
composer update
copy .env.example .env
create database laravel
php artisan migrate:fresh --seed
php artisan key:generate
php artisan serve
```
Use o Postman para a API.


## Notas
- Url local crud: http://localhost:8000/revenda
- Url local api: http://localhost:8000/api/revenda
- Api listar todos os carros 
    - GET http://localhost:8000/api/revenda/
- Api listar um carro por id. 
    - GET http://localhost:8000/api/revenda/{iD}
- Api cadastrar carro.
    - POST http://localhost:8000/api/revenda/
- Api atualizar o carro por id.
    - PUT http://localhost:8000/api/revenda/{iD}
- Api deletar carro por id.
    - DELETE http://localhost:8000/api/revenda/{iD}
    

## Licença
[MIT](https://choosealicense.com/licenses/mit/)

## Autor
[Matheus Oliveira](mailto:matheusaltair13@gmail.com)
