<?php
/**
 * Created by PhpStorm.
 * User: saelm
 * Date: 04/05/18
 * Time: 11:46
 */

namespace UserBundle\Entity;


class adduser
{
    protected $name;
    protected $password;

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


}