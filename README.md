## Descrição do projeto

Uma APIRest para envio e recebimento de mensagens entre usuários cadastrados.



### Deployment da aplicação

Comandos docker.

Para construir as imagens, executamos o comando:

```` 
docker-compose build
````

Para startar as os contaneres

```` 
docker-compose up -d
````
Para acessar a imagem do SO para rodar as migrations

```` 
docker exec -it api_php /bin/bash
````

Para baixar as dependencias do projeto

```` 
composer update
````

Para executar as migrations

```` 
php artisan migrate
````
