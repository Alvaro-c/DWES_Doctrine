<?php

namespace App\Repository;

use App\Entity\Equipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipo[]    findAll()
 * @method Equipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipo::class);
    }

    public function findAllOrderedByName()
    {
        return $this->createQuery('SELECT e FROM Equipo e ORDER BY e.nombre ASC')->getResult();
    }
        

    // /**
    //  * @return Equipo[] Returns an array of Equipo objects
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

    /*
    public function findOneBySomeField($value): ?Equipo
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
