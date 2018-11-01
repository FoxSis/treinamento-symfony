# Aula 9

## Paginator e Log

- Instalando KNP Paginator
```
docker-compose exec app composer require knplabs/knp-paginator-bundle
```

- Descobrindo os serviços disponíveis
```
docker-compose exec app php bin/console debug:autowiring
```

- Crie o arquivo app/config/knp_paginator.yaml
~~~yml
# config/packages/knp_paginator.yaml
knp_paginator:
    page_range: 5                       # number of links showed in the pagination menu (e.g: you have 10 pages, a page_range of 3, on the 5th page you'll see links to page 4, 5, 6)
    default_options:
        page_name: page                 # page query parameter name
        sort_field_name: sort           # sort field query parameter name
        sort_direction_name: direction  # sort direction query parameter name
        distinct: true                  # ensure distinct results, useful when ORM queries are using GROUP BY statements
        filter_field_name: filterField  # filter field query parameter name
        filter_value_name: filterValue  # filter value query paameter name
    template:
        pagination: '@KnpPaginator/Pagination/sliding.html.twig'     # sliding pagination controls template
        sortable: '@KnpPaginator/Pagination/sortable_link.html.twig' # sort link template
        filtration: '@KnpPaginator/Pagination/filtration.html.twig'  # filters template
~~~

- Configure o Paginator no Controller
~~~php
    //DefaultController

    //...

    /**
     * Chamados disponíveis
     *
     * @Route("/", name="chamados_disponiveis_index", methods="GET")
     * @return Response
     */
    public function chamadosDisponiveis(Request $request, \Knp\Component\Pager\PaginatorInterface $paginator): Response
    {
        $list = $this->getDoctrine()
            ->getManager()
            ->getRepository(Chamado::class)
            ->findChamadosDisponiveis();

        // $paginator  = $this->get('knp_paginator');
        $chamados = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render(
            'default/chamadosDisponiveis.html.twig', 
            ['chamados'=> $chamados]
        );
    }
~~~

- Criando paginador na view (Twig)
~~~html
    ...

    </table>
    <div class="pagination">
        {{ knp_pagination_render(chamados) }}
    </div>

    <a class="btn btn-primary" href="{{ path('chamado_new') }}">Create new</a>

    ...
~~~

## Fixando o conteúdo
- Setar rota da classe DefaultControler para "/"
- Criar método chamadosDisponiveis() em DefaultController (nome da rota "chamados_disponiveis_index", rota = "/", method=GET)
- Na rota "chamados_disponiveis_index" listar apenas chamados não fechados (criar método no repository)
- Na classe ChamadoRepository, criar método chamadosDisponiveis (!= de fechados)
- Criar a view chamadosDisponiveis.html.twig e exibir os chamados em um loop for
- Replicar os passos anteriores em um método para a exibição de chamados fechados (rota = "/fechados")


## Recomendação de leitura
- [Bootstrap pagination](http://getbootstrap.com/docs/4.1/components/pagination/)
- [KNP Paginator](https://github.com/KnpLabs/KnpPaginatorBundle)
- [Symfony Autowiring](https://symfony.com/doc/current/service_container/autowiring.html)