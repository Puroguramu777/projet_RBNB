<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Annonce>
 *
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }
    public function findAllAnnonce()
    {
        $db = $this->findAllOptimize();
        return $db->getQuery()->getResult();
    }

    public function findAllOptimize()
    {
        //Requete pour récupéré les valeurs dans les annonces et adresses
        $entityManager = $this->getEntityManager();
        
        $query = $entityManager->createQuery(
            'SELECT
            a.id,
            a.prix,
            a.nombreCouchage,
            a.fileName,
            ad.city,
            ad.country,
            t.label
            FROM App\Entity\Annonce a
            JOIN a.address ad
            join a.typeLogement t   
            
           ');
            
            return $query->getResult();
        
        
        
        
        // return $this->createQueryBuilder('a')
        //     ->leftJoin('a.typeLogement', 'typeLogement')
        //     ->addSelect('typeLogement');
            
    }

    

//    /**
//     * @return Annonce[] Returns an array of Annonce objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Annonce
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
