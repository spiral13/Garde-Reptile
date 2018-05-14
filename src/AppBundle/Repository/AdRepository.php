<?php

namespace AppBundle\Repository;


use AppBundle\Entity\User;
use AppBundle\Entity\Ad;
use League\Csv\Reader;


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

    public function findLike($search, $service = null)
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.ville LIKE :ville')
            ->setParameter('ville', $search);

        if (!is_null($service)) {
            $queryBuilder->andWhere('a.service = :service')
                ->setParameter('service', $service);
        }

        $query = $queryBuilder->getQuery();

        $result = $query->getResult();
        return $result;

    }



}