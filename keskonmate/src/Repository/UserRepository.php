<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * Permet de lister tous les utilisateurs, sans afficher leur mots de passe
     */
    public function findOneSafely(int $id)
    {

        $entityManager = $this->getEntityManager();        
        
        $query = $entityManager->createQuery(
            'SELECT u
            FROM App\Entity\User u
            WHERE u.id = :id'
        )->setParameter('id', $id);
        // dd($query->getResult());
        return $query->getResult();



// SELECT `id`, `email`, `username`,  `created_at`, `updated_at` FROM user WHERE id =  1
// INNER JOIN user_list 

// Join both tables 
// SELECT * FROM user
// INNER JOIN user_list

// Return 2 tables 
// SELECT user.id, user.email, user.username, user.created_at, user.updated_at FROM user;
// SELECT * FROM user_list WHERE user_list.users_id =  1

//Fonctionne - 2 tables sans password
// SELECT user.id, user.email, user.username, user.created_at, user.updated_at, user_list.* FROM user
// INNER JOIN user_list




    }

    // /**
    //  * @return User[] Returns an array of User objects
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
    public function findOneBySomeField($value): ?User
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
