# Poc V2 Laravel

## Tecnologias Utilizadas

- Laravel 11
- Php 8.3
- MySql 9
- Composer 2.8.2
- Docker

## Configuração [Novo Projeto]

1. Rode os comandos:
   1. docker-compose up -d
      1. docker exec -it composer-2.8.2 bash
          1. composer config -g repo.packagist composer https://packagist.org
          2. composer config -g github-protocols https ssh
          3. composer create-project --prefer-dist laravel/laravel:11.0 src
   
## Execução [Projeto já existente]

1. Rode os comandos:
   1. docker-compose up -d
       1. docker exec -it composer-2 bash
           1. cd src
           2. composer config -g repo.packagist composer https://packagist.org
           3. composer config -g github-protocols https ssh
           4. composer install

### Ambiente de Desenvolvimento

1. Rode o comando:
    1. docker exec -it php-8.3 bash
        1. php artisan serve --host 0.0.0.0
2. Acesse o host:
    1. localhost:8000
   
### Ambiente de Produção

1. Acesse o host:
    1. localhost:81/public
