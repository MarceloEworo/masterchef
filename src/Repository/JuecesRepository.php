<?php

namespace App\Repository;

use App\Entity\Jueces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jueces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jueces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jueces[]    findAll()
 * @method Jueces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JuecesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jueces::class);
    }

    // /**
    //  * @return Jueces[] Returns an array of Jueces objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jueces
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
