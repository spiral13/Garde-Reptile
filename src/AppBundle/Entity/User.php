<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 16/04/18
 * Time: 22:14
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Merci d'entrer votre ville.", groups={"Profile", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"})
     */
    protected $ville;

    /**
     * @ORM\OneToMany(targetEntity="Ad", mappedBy="user")
     */
    private $ads;

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="user")
     */
    private $comments;

// - - - - - - - - - -  - - - - - - - - - -  --  - - --  - -- - - - - - - - - - - - -
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * 
     * @Assert\File(mimeTypes={ "image/jpeg", "image/gif" , "image/png"})
     */
    private $image;

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
// - - - - - - - -  - - - - - - - - - -  --  - - --  - -- - - - - - - - - - - - - - -
    public function __construct()
    {
        parent::__construct();
        $this->ads = new ArrayCollection();
    }

//    public function __toString()
//    {
//        $this->getComments();
//        $this->getVille();
//        $this->getDescription();
//        $this->getComment();
//    }

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
    public function getAds()
    {
        return $this->ads;
    }

    /**
     * @param mixed $ads
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

//    - - - - - - - - - - - - - - - - -




}