<?php

namespace CV\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PaymentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaymentRepository extends EntityRepository
{
	public function updateToNotify($userId) {
        $query = $this->_em->createQuery('
                SELECT r 
                FROM CVPlatformBundle:Ride r
                WHERE r.user = :user
                AND r.state = 0
                AND r.departureDate < :now
                AND NOT EXISTS (
                    SELECT p
                    FROM CVPlatformBundle:Payment p
                    WHERE p.ride = r
                )')
            ->setParameter('user', $userId)
            ->setParameter('now', date('Y-m-d H:i:s'));

        foreach ($query->getResult() as $ride) {
            $payment = new Payment();

            $amount = 0;
            foreach ($ride->getReservations() as $reservation) {
				$amount += $ride->getPrice() * $reservation->getNumberOfPlaces();
			}

			if ( $amount > 0 ) {
				$payment->setAmount($amount);
				$payment->setRide($ride);
            	$payment->setState(0);
            	$this->_em->persist($payment);
            	$this->_em->flush();
            }
        }
    }

	public function myNotifications($userId) {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.ride', 'ride')
            ->addSelect('ride')
            ->where('ride.user = :user')
                ->setParameter('user', $userId)
            ->andWhere('p.state = 0')
            ->getQuery();

        return $query->getResult();
    }
}
