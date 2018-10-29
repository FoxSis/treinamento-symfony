<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Status;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            1 => 'Aberto',
            2 => 'Em andamento',
            3 => 'Fechado',
        ];

        foreach ($data as $key => $value) {
            $status = new Status();
            $status->setId($key);
            $status->setDescricao($value);
            $manager->persist($status);
        }

        $manager->flush();
    }
}
