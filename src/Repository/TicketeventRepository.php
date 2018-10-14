<?php

namespace App\Repository;

use App\Entity\Ticketevent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ticketevent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticketevent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticketevent[]    findAll()
 * @method Ticketevent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketeventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ticketevent::class);
    }

//    /**
//     * @return Ticketevent[] Returns an array of Ticketevent objects
//     */
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
    public function findOneBySomeField($value): ?Ticketevent
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
