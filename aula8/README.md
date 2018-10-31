# Aula 8

## Repository

- Consultando objetos do repository
~~~php
// PrioridadeController.php
$repository = $this->getDoctrine()->getRepository(Prioridade::class);

$prioridade = $repository->find($id);
~~~

- DQL de chamados abertos
~~~php
    // ChamadoRepository.php

    public function findChamadosDisponiveis()
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.status', 's')
            ->where('s.id <> :val')
            ->setParameter('val', \App\Entity\Status::FECHADO)
            ->orderBy('c.dataAbertura', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
~~~

## Fixando o conteúdo
- Setar rota da classe DefaultControler para "/"
- Criar método chamadosDisponiveis() em DefaultController (nome da rota "chamados_disponiveis_index", rota = "/", method=GET)
- Na rota "chamados_disponiveis_index" listar apenas chamados não fechados (criar método no repository)
- Na classe ChamadoRepository, criar método chamadosDisponiveis (!= de fechados)
- Criar a view chamadosDisponiveis.html.twig e exibir os chamados em um loop for
- Replicar os passos anteriores em um método para a exibição de chamados fechados (rota = "/fechados")


## Recomendação de leitura
- [Doctrine Repository](https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository)
- [Repository Pattern in Symfony](https://www.thinktocode.com/2018/03/05/repository-pattern-symfony/)
- [Doctrine Extensions](https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/index.html)