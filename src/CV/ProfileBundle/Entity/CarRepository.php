<?php

namespace CV\ProfileBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarRepository extends EntityRepository {
  public function requestCarUser($page, $nbPerPage, $idProfile) {
    $query = $this->createQueryBuilder('c')
    ->leftJoin('c.profile', 'profile')
    ->addSelect('profile')
    ->where('c.profile = :profile')
    ->setParameter('profile', $idProfile)
    ->getQuery();

    $query
    ->setFirstResult(($page-1) * $nbPerPage)
    ->setMaxResults($nbPerPage);

    return new Paginator($query, true);
  }
}
