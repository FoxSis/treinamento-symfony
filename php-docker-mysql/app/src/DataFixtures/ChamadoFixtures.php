<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChamadoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = [
            [
                'assunto' => 'Erro no cadastro de prioridade',
                'descricao' => 'Não consigo cadastrar prioridade',
                'status' => 1,
                'prioridade' => 10,
                'tipo' => 'Incidente',
            ],
            [
                'assunto' => 'Informação ao fechar chamado',
                'descricao' => 'Solicito campo para texto da solução do chamado',
                'status' => 2,
                'prioridade' => 5,
                'tipo' => 'Requisição',
            ],
            [
                'assunto' => 'Abertura de chamados',
                'descricao' => 'Como faço para informar o usuário que abriu o chamado?',
                'status' => 3,
                'prioridade' => 1,
                'tipo' => 'Dúvidas',
            ],
        ];
        
        foreach ($data as $value) {
            $status = $manager->getRepository(\App\Entity\Status::class)->find($value['status']);
            $prioridade = $manager->getRepository(\App\Entity\Prioridade::class)->findOneBy(['peso' => $value['prioridade']]);
            $tipo = $manager->getRepository(\App\Entity\Tipo::class)->findOneBy(['descricao' => $value['tipo']]);

            $chamado = new \App\Entity\Chamado();
            $chamado->setAssunto($value['assunto']);
            $chamado->setDescricao($value['descricao']);
            $chamado->setStatus($status);
            $chamado->setTipo($tipo);
            $chamado->setPrioridade($prioridade);

            $manager->persist($chamado);
        }

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
