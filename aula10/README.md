# Aula 10

## Webpack encore

- Adicionando o NodeJs ao container 
~~~yml
node:
    image: node
    volumes:
        - ./app:/home/node/app:rw
    working_dir: /home/node/app
~~~
- Instalando o Encore (com o Symfony Flex)
```
docker-compose exec app composer require symfony/webpack-encore-pack
```

```
docker-compose run node yarn install
```

```
docker-compose run node yarn encore dev --watch
```

- Habilitando pré-processadores SASS/LESS
~~~js
// webpack.config.js
// ...

Encore
    // ...
    .enableSassLoader();
~~~

- Instalando o bootstrap no projeto
```
docker-compose run node yarn add bootstrap --dev
```

- Adicionando a Jquery e popper.js
```
docker-compose run node yarn add jquery --dev
```

```
docker-compose run node yarn add popper.js --dev
```
- Habilitando modulo SASS
```

```
docker-compose run node yarn add --dev sass-loader node-sass
```



## Fixando o conteúdo

- Adicione o bootstrap ao seu projeto através do yarn 
- Crie um scss global e importe o bootstrap 

## Recomendação de leitura

- [Documentação Encore](https://symfony.com/doc/current/frontend.html#webpack-encore)
- [Tableless](https://tableless.com.br/sass-vs-less-vs-stylus-batalha-dos-pre-processadores/)
- [Yarn x NPM](https://blog.umbler.com/br/npm-vs-yarn-e-agora-quem-podera-nos-defender/)