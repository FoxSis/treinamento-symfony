<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Tipo;

class TipoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            'Incidente',
            'Requisição',
            'Dúvidas',
            'Extração de dados',
        ];

        foreach ($data as $value) {
            $tipo = new Tipo();
            $tipo->setDescricao($value);
            $manager->persist($tipo);
        }

        $manager->flush();
    }
}
