<?php

namespace App\Repository;

use App\Entity\ReportData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReportData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportData[]    findAll()
 * @method ReportData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReportData::class);
    }

    // /**
    //  * @return ReportData[] Returns an array of ReportData objects
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
    public function findOneBySomeField($value): ?ReportData
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
