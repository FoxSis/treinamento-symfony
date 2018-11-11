# Aula 13

## Service

- Automatic Service Loading in services.yaml
~~~php
# config/services.yaml
services:
    # default configuration for services in *this* file
    _defaults:
        autowire: true      # Automatically injects dependencies in your services.
        autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
        public: false       # Allows optimizing the container by removing unused services; this also means
                            # fetching services directly from the container via $container->get() won't work.
                            # The best practice is to be explicit about your dependencies anyway.

    # makes classes in src/ available to be used as services
    # this creates a service per class whose id is the fully-qualified class name
    App\:
        resource: '../src/*'
        exclude: '../src/{Entity,Migrations,Tests,Kernel.php}'

    # ...
~~~

- verificando serviços disponíveis (autowiring)
```
php bin/console debug:autowiring
```

- All services in the container
```
php bin/console debug:container
```

- logging 
~~~php
use Psr\Log\LoggerInterface
// ...

/**
 * @Route("/lucky/number/{max}")
 */
public function number($max, LoggerInterface $logger)
{
    $logger->info('We are logging!');
    // ...
}
~~~

- Creating/Configuring Services in the Container
~~~php
// src/Service/ChamadoService.php
<?php
namespace App\Service;

use App\Entity\Chamado;
use Symfony\Component\Security\Core\User\UserInterface;

class ChamadoService
{
    public function atribuir(Chamado $chamado, UserInterface $user): Chamado
    {
        //...
    }
}
~~~

- Chamando o serviço
~~~php
use App\Service\ChamadoService;

public function atribuir(ChamadoService $chamadoService)
{
    // de onde vem $chamado???
    $chamado = $chamadoService->atribuir($chamado, $this->getUser());
    // ...
}
~~~

## Fixando o conteúdo
- criar ChamadoService
- criar método atribuír
- o método atribuir deverá setar a responsabilidade do chamado para o usuário que for passado
- gravar no log (info) o id do chamado e o nome do usuário passados para o método
- implementar o método para persistir no banco

## Recomendação de leitura
- [PSR 3](https://www.php-fig.org/psr/psr-3/    )
- [Symfony Service Continer](https://symfony.com/doc/current/service_container.html)
- [Fetching Services](https://symfony.com/doc/current/controller.html#fetching-services)