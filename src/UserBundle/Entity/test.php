<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="test")
 */
class test
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=20)
     */

    private $Libelle;

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
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * @param mixed $Libelle
     */
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;
    }

    /**
     * @return mixed
     */
    public function getIdLogin()
    {
        return $this->id_login;
    }

    /**
     * @param mixed $id_login
     */
    public function setIdLogin($id_login)
    {
        $this->id_login = $id_login;
    }

    private $id_login;
}