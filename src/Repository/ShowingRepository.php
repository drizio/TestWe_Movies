<?php

namespace App\Repository;

use App\Entity\Showing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Showing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Showing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Showing[]    findAll()
 * @method Showing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Showing::class);
    }

    // /**
    //  * @return Showing[] Returns an array of Showing objects
    //  */
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
    public function findOneBySomeField($value): ?Showing
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
