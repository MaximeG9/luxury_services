<?php

namespace App\Repository;

use App\Entity\JobCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JobCategorie>
 *
 * @method JobCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobCategorie[]    findAll()
 * @method JobCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobCategorie::class);
    }

//    /**
//     * @return JobCategorie[] Returns an array of JobCategorie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JobCategorie
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
