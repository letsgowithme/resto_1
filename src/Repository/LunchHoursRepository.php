<?php

namespace App\Repository;

use App\Entity\LunchHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LunchHours>
 *
 * @method LunchHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method LunchHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method LunchHours[]    findAll()
 * @method LunchHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LunchHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LunchHours::class);
    }

//    /**
//     * @return LunchHours[] Returns an array of LunchHours objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LunchHours
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
