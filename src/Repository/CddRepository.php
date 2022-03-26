<?php

namespace App\Repository;

use App\Entity\Cdd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cdd|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cdd|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cdd[]    findAll()
 * @method Cdd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CddRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cdd::class);
    }

    // /**
    //  * @return Cdd[] Returns an array of Cdd objects
    //  */
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
    public function findOneBySomeField($value): ?Cdd
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
