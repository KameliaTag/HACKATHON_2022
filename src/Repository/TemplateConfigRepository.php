<?php

namespace App\Repository;

use App\Entity\TemplateConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TemplateConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemplateConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemplateConfig[]    findAll()
 * @method TemplateConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplateConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TemplateConfig::class);
    }

    // /**
    //  * @return TemplateConfig[] Returns an array of TemplateConfig objects
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
    public function findOneBySomeField($value): ?TemplateConfig
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
