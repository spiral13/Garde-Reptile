<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 25/04/18
 * Time: 15:15
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="ad")
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @ORM\Column(name="ville", type="string")
     */
    private $ville;


    /**
     * @ORM\Column(name="service", type="string")
     */
    private $service;

    /**
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\Column(name="nb_visit", type="integer")
     */
    private $nbVisit;

    /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    public function __construct()
    {
        $this->date = new \Datetime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getNbVisit()
    {
        return $this->nbVisit;
    }

    /**
     * @param mixed $nbVisit
     */
    public function setNbVisit($nbVisit)
    {
        $this->nbVisit = $nbVisit;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }




}