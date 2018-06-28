<?php

namespace App\Repository;

use App\Entity\SectorArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SectorArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectorArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectorArea[]    findAll()
 * @method SectorArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectorAreaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SectorArea::class);
    }

//    /**
//     * @return SectorArea[] Returns an array of SectorArea objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectorArea
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
