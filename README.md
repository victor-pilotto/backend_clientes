# Backend

- Criando as docker
    
    `docker-compose build`
    
- Iniciando as docker

    `docker-compose up -d`
    
- Instalando dependencias
   
   `docker-compose run --rm php-fpm composer install`
   
- Executando as migrations do banco de dados

    `docker-compose run --rm php-fpm vendor/bin/phinx migrate -e development`
    
 