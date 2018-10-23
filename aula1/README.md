# Aula 1

## Instalando dependências

- Instalando Git
```
sudo apt install git
```

- Instalando Docker
```
sudo curl -fsSL https://get.docker.com | sh
```

- Adicionando seu usuário ao grupo docker - [security reference](https://docs.docker.com/engine/security/security/#docker-daemon-attack-surface)
```
sudo usermod -aG docker $your_user
```

- Instalando docker-compose - https://docs.docker.com/compose/install
```
sudo curl -L "https://github.com/docker/compose/releases/download/1.22.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```

```
sudo chmod +x /usr/local/bin/docker-compose
```

## Symfony Begins

- Criando o projeto app (usando docker)
```
docker-compose run app composer create-project symfony/website-skeleton .
```

- Colocando a aplicação para rodar
```
docker-compose up
```

- Meu primeiro controller
```
docker-compose exec app bin/console make:controller
```

## Fixando o conteúdo

- instale o git
- baixe a stack docker em <https://github.com/FoxSis/php-docker-mysql>
- instale o docker
- instale o docker-compose
- crie seu primeiro projeto symfony
- crie o DefaultController em seu projeto
- Exiba a mensagem: "Meu primeiro controller" na sua view através de passagem de parâmetros (interpolação)

## Recomendação de leitura
- [Symfony roadmap](https://symfony.com/roadmap)
- [The Twelve-Factor App](https://12factor.net/pt_br/)
- [PHP do jeito certo](http://br.phptherightway.com/)
- [Composer](https://getcomposer.org/)
- [Versionamento Semântico](https://semver.org/lang/pt-BR/)
- [Docker Security](https://docs.docker.com/engine/security/security/)
- [Symfony Recipes Server](https://symfony.sh/)