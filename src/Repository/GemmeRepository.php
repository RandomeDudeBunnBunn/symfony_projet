<?php

namespace App\Repository;

use App\Entity\Gemme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gemme>
 *
 * @method Gemme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gemme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gemme[]    findAll()
 * @method Gemme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gemme::class);
    }

//    /**
//     * @return Gemme[] Returns an array of Gemme objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gemme
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
