# Aula 3

## Controller - CRUD

- criando um crud
```
docker-compose run app php bin/console make:crud
```

- flash message
~~~php
    $this->addFlash(
        'notice',
        'Your changes were saved!'
    );
~~~

~~~html
{# templates/base.html.twig #}

{# you can read and display just one flash message type... #}
{% for message in app.flashes('notice') %}
    <div class="flash-notice">
        {{ message }}
    </div>
{% endfor %}

{# ...or you can read and display every flash message available #}
{% for label, messages in app.flashes %}
    {% for message in messages %}
        <div class="flash-{{ label }}">
            {{ message }}
        </div>
    {% endfor %}
{% endfor %}
~~~

## Fixando o conteúdo
- crie o crud da entidade Tipo
- adicione flash message no sucesso das execuções
- redirecione para a listagem (no sucesso da edição)

## Recomendação de leitura
- [Symfony Controller](https://symfony.com/doc/current/controller.html)
- [Flash Messages](https://symfony.com/doc/current/controller.html#flash-messages)
- [Redirecting](https://symfony.com/doc/current/controller.html#redirecting)
- [Design Pattern - Singleton](https://pt.wikipedia.org/wiki/Singleton)