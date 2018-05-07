<?php

namespace AppBundle\Repository;


use AppBundle\Entity\User;

class AdRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUserId(User $user)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT a
            FROM AppBundle:Ad a
            WHERE a.user= :user'
        )->setParameter('user', $user->getId());

        // On retourne le résultat de l'exécution de la requête
        return $query->getResult();
    }

}