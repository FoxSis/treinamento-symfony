# Aula 5

## Relations

- regerando entidade
```
docker-compose run app php bin/console make:entity --regenerate
```

- testando query no console
```
docker-compose exec app php bin/console doctrine:query:sql 'select * from prioridade'
```

- Criando Migrations (diferença entre mapeamento e banco de dados)
```
docker-compose exec app php bin/console doctrine:migrations:diff
```

- Migrations - criando/alterando banco de dados
```
docker-compose run app php bin/console make:migration
```

- executando alterações
```
docker-compose run app php bin/console doctrine:migrations:migrate
```

- adicionando fixturesBundle como dependência em ambiente de desenvolvimento
```
docker-compose exec app composer require doctrine/doctrine-fixtures-bundle --dev
```

- criando Fixtures (dados default)
```
docker-compose run app php bin/console make:fixtures
```

~~~php
// src/DataFixtures/StatusFixture.php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StatusFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $status = new Status();
        $status->setId(1);
        $status->setDescricao('Aberto');
        $manager->persist($status);

        // add more status

        $manager->flush();
    }
}
~~~

- carregando Fixtures
```
docker-compose run app php bin/console doctrine:fixtures:load
```

## Fixando o conteúdo
- Criar a entidade Status (id e descricao)
- Remover a anotação de auto incremento do Id da entidade Status
- Criar método setter para Id de Status
- Criar Fixtures para a entidade Status
- Criar a entidade chamado contendo as FK's de Tipo, Prioridade e Status
- Criar CRUD para chamado

### Fixture - Status
Id | Descricao
-- | ------------
1  | Aberto
2  | Em andamento
3  | Fechado

### Fixture - Prioridade
Id | Peso | Descricao
-- | ---- | ------------
?  | 10   | Alta
?  | 5    | Média
?  | 1    | Baixa

### Fixture - Tipo
Id | Descricao
-- | ------------
?  | Incidente
?  | Requisição
?  | Dúvidas
?  | Extração de dados


## Recomendação de leitura
- [Doctrine Best Pratices](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/best-practices.html)
- [Twig Coding Standards](https://twig.symfony.com/doc/2.x/coding_standards.html)
- [PHP date](http://php.net/manual/en/function.date.php)
- [PHP DateTime](http://php.net/manual/en/class.datetime.php)
- [Bootstrap](http://getbootstrap.com/)
- [Doctrine Associations](https://symfony.com/doc/current/doctrine/associations.html)