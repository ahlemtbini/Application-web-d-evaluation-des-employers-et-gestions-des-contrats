<?php

namespace App\Repository;

use App\Entity\ChargerContrats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChargerContrats|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChargerContrats|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChargerContrats[]    findAll()
 * @method ChargerContrats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChargerContratsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChargerContrats::class);
    }

    // /**
    //  * @return ChargerContrats[] Returns an array of ChargerContrats objects
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
    public function findOneBySomeField($value): ?ChargerContrats
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
