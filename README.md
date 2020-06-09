# Biblio-API
Este repositório é destinado para armazenar e versionar a API do projeto Biblio.
Esta API está sendo desenvolvida em laravel framework e JWT para tornar as requisições seguras.


Para iniciar a API corretamente deverá utilizar os comandos abaixo no cmd ou terminal:

php artisan migrate:fresh /
php artisan db:seed /
php artisan serve /

o usuario padrão criado para acessar a API e gerar o JWT é 

{
    "email":"teste@teste.com",
    "password":"secret"
}
