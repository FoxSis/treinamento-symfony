# Aula 4

## View - Twig

- verificando a existência de erros nos templates
```
docker-compose run app php bin/console lint:twig templates
```

- listando rotas disponíveis
```
docker-compose run app php bin/console debug:router
```

- Criando menu (utilizando path)
~~~html
{# templates/base.html.twig #}

<body>
    {% block menu %}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">HelpDesk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ path('tipo_index') }}">Tipo</a>
            <a class="nav-item nav-link" href="{{ path('prioridade_index') }}">Prioridade</a>
            </div>
        </div>
        </nav>
    {% endblock %}
~~~

## Fixando o conteúdo
- na listagem de Tipo, exibir a descrição em maiúsculo utilizando Twig Filters
- utilizando o Twig Test _divisibleby_, deixe a cor de fundo da tabela em modo zebrado (striped)
- Importe o cdn do css do bootstrap no block styleshets do template base.html.twig
- crie o _block menu_ dentro da tag body no template base.html.twig
- Crie o link para as funcionalidades utilizando _path_ (passando o nome das rotas)

## Recomendação de leitura
- [Twig](https://twig.symfony.com/)
- [Twig Coding Standards](https://twig.symfony.com/doc/2.x/coding_standards.html)
- [PHP date](http://php.net/manual/en/function.date.php)
- [PHP DateTime](http://php.net/manual/en/class.datetime.php)
- [Bootstrap](http://getbootstrap.com/)