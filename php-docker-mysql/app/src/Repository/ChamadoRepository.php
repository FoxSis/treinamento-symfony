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

//    /**
//     * @return Chamado[] Returns an array of Chamado objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chamado
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
