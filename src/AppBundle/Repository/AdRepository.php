<?php

namespace AppBundle\Repository;


use AppBundle\Entity\User;
use AppBundle\Entity\Ad;

class AdRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUserId(User $user)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT a
            FROM AppBundle:Ad a
            WHERE a.user= :user
            ORDER BY a.date DESC'
        )->setParameter('user', $user->getId());

        // On retourne le résultat de l'exécution de la requête
        return $query->getResult();
    }
//
//    public function findLike($ville)
//    {
//        $query = $this->createQueryBuilder('a')
//            ->select('a')
//            ->where('a.ville LIKE :ville')
//            ->setParameter('ville', $ville)
//            ->getQuery();
//        $result = $query->getResult();
//        return $result;
//
//    }

}