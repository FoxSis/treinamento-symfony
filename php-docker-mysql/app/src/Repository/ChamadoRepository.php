<?php

namespace App\Repository;

use App\Entity\Chamado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chamado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chamado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chamado[]    findAll()
 * @method Chamado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChamadoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chamado::class);
    }
    
    /**
     * @return Chamado[] Returns an array of Chamado objects
     */
    public function findChamadosDisponiveis()
    {
        return $this->createQueryBuilder('c')
            ->select('partial c.{id, dataAtualizacao, dataAbertura, assunto}')
            ->addSelect('s')
            ->addSelect('p')
            ->addSelect('co')
            ->innerJoin('c.status', 's')
            ->innerJoin('c.prioridade', 'p')
            ->leftJoin('c.comentarios', 'co')
            ->where('s.id <> :val')
            ->setParameter('val', \App\Entity\Status::FECHADO)
            ->orderBy('c.dataAbertura', 'DESC')
            ->getQuery();
    }

    /**
     * @return Chamado[] Returns an array of Chamado objects
     */
    public function findChamadosFechados()
    {
        return $this->createQueryBuilder('c')
            ->select('partial c.{id, dataConclusao, dataAbertura, assunto}')
            ->addSelect('s')
            ->addSelect('p')
            ->innerJoin('c.status', 's')
            ->innerJoin('c.prioridade', 'p')
            ->where('s.id = :val')
            ->setParameter('val', \App\Entity\Status::FECHADO)
            ->orderBy('c.dataConclusao', 'DESC')
            ->getQuery()
        ;
    }
}
