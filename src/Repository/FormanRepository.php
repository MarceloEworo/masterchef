<?php

namespace App\Repository;

use App\Entity\Forman;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Forman|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forman|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forman[]    findAll()
 * @method Forman[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forman::class);
    }

    // /**
    //  * @return Forman[] Returns an array of Forman objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Forman
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */ public function findOneByIdJoinedToCategory($nombreEquipo): ?Product
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT f, e
            FROM App\Entity\Forman f
            INNER JOIN f.nombreEquipo e
            WHERE f.nombreEquipo = :nombre'
        )->setParameter('nombre', $nombreEquipo);

        return $query->getOneOrNullResult();
    }
}
