<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserRepository")
 * @ORM\Table(name="Login")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=200)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Image",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;



    /**
     * Set image
     *
     * @param \UserBundle\Entity\Image $image
     *
     * @return User
     */
    public function setImage(\UserBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \UserBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }


}
