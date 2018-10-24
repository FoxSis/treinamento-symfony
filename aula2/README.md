# Aula 2

## Console
- conhecendo o console do symfony
```
docker-compose run app php bin/console
```

- criando uma entidade
```
docker-compose run app php bin/console make:entity
```

- validando mapeamendo de entidades
```
docker-compose run app php bin/console doctrine:schema:validate
```

- sql dump das modificações
```
docker-compose run app php bin/console doctrine:schema:update --dump-sql
```

- atualizando banco de dados de acordo com as entidades
```
docker-compose run app php bin/console doctrine:schema:update --force
```

## Fixando o conteúdo
- crie um serviço mysql no docker-compose
- faça o _build_ das imagens docker
- envie os parâmetros de conexão com o banco via environment (docker-compose.yml)
- suba os containers e faça a validação da conexão e mapeamento
- Crie as entidades do projeto de treinamento
- atualize o banco de dados de acordo com as entidades mapeadas

## Recomendação de leitura
- [Docker Hub](https://hub.docker.com/_/mysql/)
- [Mysql Docker Hub](https://hub.docker.com/_/mysql/)
- [Symfony Doctrine configuration](https://symfony.com/doc/current/doctrine.html)
- [Doctrine Best Pratices](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/best-practices.html#best-practices)
- [PHP PDO](http://php.net/pdo)
