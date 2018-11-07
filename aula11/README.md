# Aula 11

## Translation

- Configurando translation.yaml
~~~yml
# config/packages/translation.yaml
framework:
    default_locale: '%locale%'
    translator:
        fallbacks: '%locale%'
        # ...
~~~

- services.yml
~~~yml
# config/services.yaml
# ...
parameters:
    locale: 'pt_BR'
# ...
~~~

- Limpando cache
```
docker-compose exec app php bin/console cache:clear
```

- Tradução básica
~~~php
// src/Controller/DefaultController
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

public function teste(TranslatorInterface $translator)
{
    $translated = $translator->trans('Symfony is great');

    // ...
}
~~~

- Tradução em templates
~~~twig
{{ 'show'|trans }} {# string #}
    {# ou #}
{{ message|trans }} {# variavel #}
    {# ou #}
{% trans %}
    show
{% endtrans %}
~~~

- Arquivo de tradução
~~~yml
# translations/messages.pt_BR.yaml
Symfony is great: Symfony é TOP
~~~

## Fixando o conteúdo
- Setar locale da aplicação para __pt_BR__
- Criar arquivo __translations/messages.pt_BR.yaml__
- Traduzir as ações do chamado (__show, edit, comments, delete, create new__).
- Traduzir flash messages   


## Recomendação de leitura
- [Symfony Translations](https://symfony.com/doc/current/translation.html)
- [Symfony Configuration](https://symfony.com/doc/current/best_practices/configuration.html#application-related-configuration)