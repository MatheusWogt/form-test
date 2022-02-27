<?php

namespace App\Repository;

use App\Entity\UserSystemMemorar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserSystemMemorar|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSystemMemorar|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSystemMemorar[]    findAll()
 * @method UserSystemMemorar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSystemMemorarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSystemMemorar::class);
    }

    // /**
    //  * @return UserSystemMemorar[] Returns an array of UserSystemMemorar objects
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
    public function findOneBySomeField($value): ?UserSystemMemorar
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
