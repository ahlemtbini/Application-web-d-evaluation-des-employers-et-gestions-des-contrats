<?php

namespace App\Repository;

use App\Entity\ObjectifRe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ObjectifRe|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifRe|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifRe[]    findAll()
 * @method ObjectifRe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifReRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectifRe::class);
    }

    // /**
    //  * @return ObjectifRe[] Returns an array of ObjectifRe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectifRe
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
