<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Prioridade;

class PrioridadeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            [
                'descricao' => 'Alta',
                'peso' => 10,
            ],
            [
                'descricao' => 'Média',
                'peso' => 5,
            ],
            [
                'descricao' => 'Baixa',
                'peso' => 1,
            ],
        ];

        foreach ($data as $value) {
            $prioridade = new Prioridade();
            $prioridade->setDescricao($value['descricao']);
            $prioridade->setPeso($value['peso']);
            $manager->persist($prioridade);
        }

        $manager->flush();
    }
}
