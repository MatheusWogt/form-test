<?php

namespace App\Repository;

use App\Entity\UsersSystemMemorar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsersSystemMemorar|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersSystemMemorar|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersSystemMemorar[]    findAll()
 * @method UsersSystemMemorar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersSystemMemorarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersSystemMemorar::class);
    }

    // /**
    //  * @return UsersSystemMemorar[] Returns an array of UsersSystemMemorar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersSystemMemorar
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
