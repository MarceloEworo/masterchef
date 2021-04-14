<?php

namespace App\Repository;

use App\Entity\Concursantes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concursantes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concursantes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concursantes[]    findAll()
 * @method Concursantes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcursantesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concursantes::class);
    }

    // /**
    //  * @return Concursantes[] Returns an array of Concursantes objects
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
    public function findOneBySomeField($value): ?Concursantes
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
