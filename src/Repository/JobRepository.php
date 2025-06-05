<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Job>
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }
    public function findByFilters(?string $category, ?string $country)
{
    $qb = $this->createQueryBuilder('j');

    if ($category) {
        // Effectuer une jointure avec jobCategories (relation ManyToMany)
        $qb->innerJoin('j.jobCategories', 'c')  // jointure avec jobCategories
           ->andWhere('c.name = :category')     // Filtrage sur le nom de la catÃ©gorie
           ->setParameter('category', $category);
    }

    if ($country) {
        $qb->andWhere('j.country = :country')
           ->setParameter('country', $country);
    }

    return $qb->getQuery()->getResult();
}

//    /**
//     * @return Job[] Returns an array of Job objects
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

//    public function findOneBySomeField($value): ?Job
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
