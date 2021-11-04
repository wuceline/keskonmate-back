<?php

namespace App\Repository;

use App\Entity\Series;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Series|null find($id, $lockMode = null, $lockVersion = null)
 * @method Series|null findOneBy(array $criteria, array $orderBy = null)
 * @method Series[]    findAll()
 * @method Series[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Series::class);
    }

    /**
     *
     * Récupère toutes les informations liées aux series dont home_order est definit
     * @return Series
     */
    public function findAllByHomeOrder() :array
    {
        $entityManager = $this->getEntityManager();

        $dqlQuery = " SELECT s 
                    FROM App\Entity\Series s
                    WHERE s.homeOrder IS NOT NULL ";

        $query = $entityManager->createQuery(
            $dqlQuery
        );

        // dd($query->getResult());
        return $query->getResult();
    }

    /**
     *
     * Récupère tous les titres et homeOrder des series
     * @return Series
     */
    public function findAllWithNameandHomeOrder() :array
    {
        $entityManager = $this->getEntityManager();

        $dqlQuery = " SELECT s.title, s.homeOrder 
                    FROM App\Entity\Series s ";

        $query = $entityManager->createQuery(
            $dqlQuery
        );

        // dd($query->getResult());
        return $query->getResult();
    }

    // /**
    //  * @return Series[] Returns an array of Series objects
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
    public function findOneBySomeField($value): ?Series
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
