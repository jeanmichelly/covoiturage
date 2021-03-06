<?php
// src/CV/PlatformBundle/Entity/Reservation.php

namespace CV\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cv_reservation")
 * @ORM\Entity(repositoryClass="CV\PlatformBundle\Entity\ReservationRepository")
 */
class Reservation
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="state", type="smallint")
   */
  private $state;

  /**
   * @ORM\ManyToOne(targetEntity="CV\PlatformBundle\Entity\Ride", inversedBy="reservations")
   * @ORM\JoinColumn(nullable=false)
   */
  private $ride;

  /**
   * @ORM\ManyToOne(targetEntity="CV\UserBundle\Entity\User", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
   */
  private $user;


  /**
   * @ORM\Column(name="numberOfPlaces", type="smallint")
   */
  private $numberOfPlaces;
  

  public function __construct($ride, $user, $numberOfPlaces) {
    $this->ride = $ride;
    $this->user = $user;
    $this->state = 0;
    $this->numberOfPlaces = $numberOfPlaces;
  }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
      return $this->id;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Reservation
     */
    public function setState($state) {
      $this->state = $state;
      return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState() {
      return $this->state;
    }

    /**
     * Set ride
     *
     * @param \CV\PlatformBundle\Entity\Ride $ride
     * @return Reservation
     */
    public function setRide(\CV\PlatformBundle\Entity\Ride $ride) {
      $this->ride = $ride;
      return $this;
    }

    /**
     * Get ride
     *
     * @return \CV\PlatformBundle\Entity\Ride 
     */
    public function getRide() {
      return $this->ride;
    }

    /**
     * Set user
     *
     * @param \CV\UserBundle\Entity\User $user
     * @return Reservation
     */
    public function setUser(\CV\UserBundle\Entity\User $user) {
      $this->user = $user;
      return $this;
    }

    /**
     * Get user
     *
     * @return \CV\UserBundle\Entity\User 
     */
    public function getUser() {
      return $this->user;
    }

    /**
     * Set numberOfPlaces
     *
     * @param integer $numberOfPlaces
     * @return Reservation
     */
    public function setNumberOfPlaces($numberOfPlaces)
    {
      $this->numberOfPlaces = $numberOfPlaces;

      return $this;
    }

    /**
     * Get numberOfPlaces
     *
     * @return integer 
     */
    public function getNumberOfPlaces()
    {
      return $this->numberOfPlaces;
    }
  }
