<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $usuario = new Usuario();
        $usuario->setNome("Administrador");
        $usuario->setEmail("admin@admin.com");
        $usuario->setPassword(
            $this->passwordEncoder->encodePassword(
                $usuario,
                '123456'
            )
        );

        $manager->persist($usuario);
        $manager->flush();
    }
}
