<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
    /**
     * @ORM/OneToMany(targetEntity="AppBundle\Entity\Ad", mappedBy="user")
     */
    protected $ads;

    public function __construct()
    {
        parent::__construct();
        $this->ads = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getAds()
    {
        return $this->ads;
    }

    /**
     * @param mixed $ads
     * @return User
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
        return $this;
    }


}