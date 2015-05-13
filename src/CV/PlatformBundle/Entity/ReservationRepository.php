<?php

namespace CV\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ReservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends EntityRepository
{
	public function currentReservations($page, $nbPerPage, $userId) {	
		$query = $this->createQueryBuilder('r')
		->join('r.ride', 'ride')
		->addSelect('ride')
		->where('r.user = :user')
		->setParameter('user', $userId)
		->andWhere('ride.departureDate > :now')
		->setParameter('now', date('Y-m-d H:i:s'))
		->getQuery();

		$query
		->setFirstResult(($page-1) * $nbPerPage)
		->setMaxResults($nbPerPage);

		return new Paginator($query, true);
	}

	public function existPassenger($userId, $idRide){

		$query = $this->createQueryBuilder('r')
		->join('r.ride', 'ride')
		->addSelect('ride')
		->where('r.user = :user')
		->setParameter('user', $userId)
		->andwhere('r.ride = :idRide')
		->setParameter('idRide', $idRide)
		->getQuery();

		return ($query->getResult()) ? true:false;
	}

	public function pastReservations($page, $nbPerPage, $userId) {	
		$query = $this->createQueryBuilder('r')
		->join('r.ride', 'ride')
		->addSelect('ride')
		->where('r.user = :user')
		->setParameter('user', $userId)
		->andWhere('ride.departureDate < :now')
		->setParameter('now', date('Y-m-d H:i:s'))
		->getQuery();

		$query
		->setFirstResult(($page-1) * $nbPerPage)
		->setMaxResults($nbPerPage);

		return new Paginator($query, true);
	}

	public function myReservations($page, $nbPerPage, $userId) {	
		$query = $this->createQueryBuilder('r')
		->join('r.ride', 'ride')
		->addSelect('ride')
		->where('r.user = :user')
		->setParameter('user', $userId)
		->orderBy('ride.offerPublished', 'DESC')
		->getQuery();

		$query
		->setFirstResult(($page-1) * $nbPerPage)
		->setMaxResults($nbPerPage);
		return new Paginator($query, true);
	}
}
