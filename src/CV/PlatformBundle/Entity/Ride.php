<?php

namespace CV\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ride
 *
 * @ORM\Table(name="cv_ride")
 * @ORM\Entity(repositoryClass="CV\PlatformBundle\Entity\RideRepository")
 */
class Ride
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CV\UserBundle\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="departure", type="string", length=25)
     */
    private $departure;

    /**
     * @var string
     *
     * @ORM\Column(name="arrival", type="string", length=25)
     */
    private $arrival;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_date", type="datetime")
     */
    private $departureDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="smallint")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_passenger", type="smallint")
     */
    private $numberPassenger;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text")
     */
    private $details;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="smallint")
     */
    private $state = 1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="offer_published", type="datetime")
     */
    private $offerPublished;

    public function __construct()
    {
      $this->setOfferPublished(new \Datetime());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set departure
     *
     * @param string $departure
     * @return Ride
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return string 
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param string $arrival
     * @return Ride
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return string 
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set departureDate
     *
     * @param \DateTime $departureDate
     * @return Ride
     */
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get departureDate
     *
     * @return \DateTime 
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Ride
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set numberPassenger
     *
     * @param integer $numberPassenger
     * @return Ride
     */
    public function setNumberPassenger($numberPassenger)
    {
        $this->numberPassenger = $numberPassenger;

        return $this;
    }

    /**
     * Get numberPassenger
     *
     * @return integer 
     */
    public function getNumberPassenger()
    {
        return $this->numberPassenger;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return Ride
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Ride
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set offerPublished
     *
     * @param \DateTime $offerPublished
     * @return Ride
     */
    public function setOfferPublished($offerPublished)
    {
        $this->offerPublished = $offerPublished;

        return $this;
    }

    /**
     * Get offerPublished
     *
     * @return \DateTime 
     */
    public function getOfferPublished()
    {
        return $this->offerPublished;
    }

    /**
     * Set user
     *
     * @param \CV\UserBundle\Entity\User $user
     * @return Ride
     */
    public function setUser(\CV\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CV\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
