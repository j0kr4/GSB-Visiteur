<?php

namespace App\Repository;

use App\Entity\Etat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Etat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etat[]    findAll()
 * @method Etat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etat::class);
    }

    // /**
    //  * @return Etat[] Returns an array of Etat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function getLeVisiteur($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from(Etat::class, 'e')
            ->where('e.id = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        $result = $query->getOneOrNullResult();
        return $result;
    }
    /*
    public function findOneBySomeField($value): ?Etat
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}