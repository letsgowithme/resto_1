<?php

namespace App\Repository;

use App\Entity\DinnerHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DinnerHours>
 *
 * @method DinnerHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method DinnerHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method DinnerHours[]    findAll()
 * @method DinnerHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DinnerHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DinnerHours::class);
    }

//    /**
//     * @return DinnerHours[] Returns an array of DinnerHours objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DinnerHours
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
