<?php

namespace CV\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Car
 *
 * @ORM\Table(name="cv_car")
 * @ORM\Entity(repositoryClass="CV\ProfileBundle\Entity\CarRepository")
 */
class Car
{

  /**
   * @ORM\ManyToOne(targetEntity="CV\ProfileBundle\Entity\Profile",inversedBy="car")
   * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
   */
  private $profile;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mark", type="string", length=20)
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=20)
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="year_Commissionning", type="smallint", nullable=true)
     */
    private $yearCommissionning;

    /**
     * @var string
     *
     * @ORM\Column(name="comfort", type="string", length=20)
     */
    private $comfort;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_place", type="smallint", nullable=true)
     */
    private $numberPlace;

    /**
         * @var string
     *
     * @ORM\Column(name="color", type="string", length=20)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=20)
     */
    private $category;

    /**
      * @ORM\OneToOne(targetEntity="CV\PlatformBundle\Entity\Image", cascade={"persist"})
      * @Assert\Valid
      */
    private $image;

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
     * Set mark
     *
     * @param string $mark
     * @return Car
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return string 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set yearCommissionning
     *
     * @param integer $yearCommissionning
     * @return Car
     */
    public function setYearCommissionning($yearCommissionning)
    {
        $this->yearCommissionning = $yearCommissionning;

        return $this;
    }

    /**
     * Get yearCommissionning
     *
     * @return integer 
     */
    public function getYearCommissionning()
    {
        return $this->yearCommissionning;
    }

    /**
     * Set comfort
     *
     * @param string $comfort
     * @return Car
     */
    public function setComfort($comfort)
    {
        $this->comfort = $comfort;

        return $this;
    }

    /**
     * Get comfort
     *
     * @return string 
     */
    public function getComfort()
    {
        return $this->comfort;
    }

    /**
     * Set numberPlace
     *
     * @param string $numberPlace
     * @return Car
     */
    public function setNumberPlace($numberPlace)
    {
        $this->numberPlace = $numberPlace;

        return $this;
    }

    /**
     * Get numberPlace
     *
     * @return string 
     */
    public function getNumberPlace()
    {
        return $this->numberPlace;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Car
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Car
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Car
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set profile
     *
     * @param \CV\ProfileBundle\Entity\Profile $profile
     * @return Car
     */
    public function setProfile(\CV\ProfileBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \CV\ProfileBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set image
     *
     * @param \CV\PlatformBundle\Entity\Image $image
     * @return Car
     */
    public function setImage(\CV\PlatformBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \CV\PlatformBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}
