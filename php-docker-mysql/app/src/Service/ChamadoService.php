<?php
namespace App\Service;

use App\Entity\Chamado;
use App\Entity\Comentario;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ChamadoService
{

    private $manager;
    private $validator;

    public function __construct(ObjectManager $manager, ValidatorInterface $validator)
    {
        $this->manager = $manager;
        $this->validator = $validator;
    }

    /**
     * Validate
     *
     * @param $entity
     * @return void|\Exception
     * @throws Exception
     */
    public function validate($entity)
    {
        $errors = $this->validator->validate($entity);
        if (count($errors)) {
            throw new \Exception((string) $errors);
        }
    }

    public function atribuir(Chamado $chamado, UserInterface $usuario): Chamado
    {
        $chamado->setResponsavel($usuario);
        $this->validate($chamado);

        $this->manager->persist($chamado);
        $this->manager->flush();
        return $chamado;
    }

    public function adicionarComentario(Comentario $comentario)
    {
        $this->validate($comentario);
        $this->manager->persist($comentario);
        $this->manager->flush();
        return $comentario->getChamado();
    }
}
