# Poc V2 Laravel

## Tecnologias Utilizadas

- Laravel 11
- Php 8.3
- MySql 9
- Composer 2.8.2
- Docker

## Execução

1. Rode o comando:
    - docker-compose up -d
    
### Ambiente de Desenvolvimento

1. Rode o comando:
    1. docker exec -it php-8.3 bash
        1. php artisan serve --host 0.0.0.0
       
2. Acesse o host:
    1. localhost:8000
   
### Ambiente de Produção

1. Acesse o host:
    1. localhost:8001

composer create-project --prefer-dist laravel/laravel:11.0 src
php artisan make:migration create_formacao_table
php artisan migrate
php artisan make:controller FormacaoController
php artisan make:model Formacao
php artisan make:request SalvarFormacaoRequest
php artisan make:provider FormacaoRepositoryProvider
php artisan make:migration alter_column_formacao_table


