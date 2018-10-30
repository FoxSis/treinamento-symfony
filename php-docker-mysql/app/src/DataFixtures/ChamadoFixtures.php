<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChamadoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $status = $manager->getRepository(\App\Entity\Status::class)->find(1);
        $prioridade = $manager->getRepository(\App\Entity\Prioridade::class)->findOneBy(['peso' => 10]);
        $tipo = $manager->getRepository(\App\Entity\Tipo::class)->findOneBy(['descricao' => 'Incidente']);

        $chamado = new \App\Entity\Chamado();
        $chamado->setAssunto('Erro no cadastro de prioridade');
        $chamado->setDescricao('Não consigo cadastrar prioridade');
        $chamado->setStatus($status);
        $chamado->setTipo($tipo);
        $chamado->setPrioridade($prioridade);
        
        $manager->persist($chamado);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            PrioridadeFixtures::class,
            StatusFixtures::class,
            TipoFixtures::class,
        );
    }
}
