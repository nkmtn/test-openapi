<?php

namespace App\Repository;

use App\Entity\TryTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TryTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method TryTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method TryTest[]    findAll()
 * @method TryTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TryTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TryTest::class);
    }

    // /**
    //  * @return TryTest[] Returns an array of TryTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TryTest
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
