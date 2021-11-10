<?php

namespace App\Repository;

use App\Entity\Series;
use App\Entity\UserList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserList|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserList|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserList[]    findAll()
 * @method UserList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserList::class);
    }

    /**
     *
     * Récupère toutes les informations liées aux series dont home_order est definit
     * @return Userlists
     */
    public function findAllWithDQL() :array
    {
        $entityManager = $this->getEntityManager();

        $dqlQuery = "SELECT ul
                    FROM App\Entity\UserList ul                   
                    INNER JOIN App\Entity\Series s
                    WHERE ul.seriesNb = s.id";

        $query = $entityManager->createQuery(
            $dqlQuery
        );

        // dd($query->getResult());
        return $query->getResult();
    }

    // /**
    //  * @return UserList[] Returns an array of UserList objects
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
    public function findOneBySomeField($value): ?UserList
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


// public function findAllWithDQL() :array
//     {
//         $entityManager = $this->getEntityManager();

//         $dqlQuery = "SELECT ul, s
//                     FROM App\Entity\UserList ul, App\Entity\Series s
//                     WHERE ul.seriesNb = s.id";

//         $query = $entityManager->createQuery(
//             $dqlQuery
//         );

//         // dd($query->getResult());
//         return $query->getResult();
//     }