<?php

namespace App\Repository;

use App\Entity\RapportValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RapportValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportValue[]    findAll()
 * @method RapportValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportValue::class);
    }

    // /**
    //  * @return RapportValue[] Returns an array of RapportValue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RapportValue
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
