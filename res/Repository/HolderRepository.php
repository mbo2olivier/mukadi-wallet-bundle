<?php

namespace App\Repository;

use App\Entity\Holder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Holder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Holder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Holder[]    findAll()
 * @method Holder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HolderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Holder::class);
    }

    // /**
    //  * @return Holder[] Returns an array of Holder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Holder
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
