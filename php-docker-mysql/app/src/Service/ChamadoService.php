<?php
namespace App\Service;

use App\Entity\Chamado;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\UserInterface;

class ChamadoService
{

    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function atribuir(Chamado $chamado, UserInterface $usuario): Chamado
    {
        $chamado->setResponsavel($usuario);

        $this->manager->persist($chamado);
        $this->manager->flush();
        return $chamado;
    }
}
