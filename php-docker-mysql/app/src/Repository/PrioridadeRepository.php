<?php

namespace App\Repository;

use App\Entity\Prioridade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Prioridade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prioridade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prioridade[]    findAll()
 * @method Prioridade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrioridadeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Prioridade::class);
    }

//    /**
//     * @return Prioridade[] Returns an array of Prioridade objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prioridade
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
