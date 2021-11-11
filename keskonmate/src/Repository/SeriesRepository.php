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
     * @return Series[]
     */
    public function findAllByHomeOrder() :array
    {
        $entityManager = $this->getEntityManager();

        $dqlQuery = " SELECT s 
                    FROM App\Entity\Series s
                    WHERE s.homeOrder BETWEEN 0 AND 5 
                    ORDER BY s.homeOrder ASC";

        $query = $entityManager->createQuery(
            $dqlQuery
        );

        // dd($query->getResult());
        return $query->getResult();
    }

    /**
     *
     * Récupère tous les ID, titres et homeOrder des series
     * @return Series[]
     */
    public function findAllWithIdTitleAndHomeOrder(): array
    {
        $entityManager = $this->getEntityManager();

        $dqlQuery = " SELECT s.id, s.title, s.homeOrder 
                    FROM App\Entity\Series s ";

        $query = $entityManager->createQuery(
            $dqlQuery
        );

        // dd($query->getResult());
        return $query->getResult();
    }

    // Find/search series by title
    public function findSeriesByName(string $query)
    {
        $qb = $this->createQueryBuilder('s');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('s.title', ':query'),
                        $qb->expr()->like('s.director', ':query'),
                    ),
                    $qb->expr()->isNotNull('s.createdAt')
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
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
