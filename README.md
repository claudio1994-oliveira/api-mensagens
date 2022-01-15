## Descrição do projeto

Uma API para envio e recebimento de mensagens entre usuários cadastrados.

### Tencnologias adotadas

Lumen, Docker e Postman (Para testar a aplicação, podendo ser usado qualquer software similar.)


### Deployment da aplicação

O único requisito é ter o docker instalado na máquina.

#### Comandos docker.

Para construir as imagens, executamos o comando:

```` 
docker-compose build
````

Para subir os contaneres

```` 
docker-compose up -d
````
Acessar a imagem para executar as migrations

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
#### Postman

Na pasta Collection Postman existe um .json com os endpoints para teste do envio e recebimento das mensagens.