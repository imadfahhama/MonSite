<?php


namespace UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use UserBundle\Entity\User;

class UserRepository extends EntityRepository
{

    public function listUser()
    {
        $em =$this->getEntityManager();

        $query="select u from UserBundle:User u";

        $result=$em->createQuery($query);

        return $result->getResult();
    }
    public function addUser(User $u)
    {
        $em=$this->getEntityManager();

        $em ->persist($u);

        $em ->flush();

        return $u;
    }
    public function deleteUser($id)
    {
        $entityManager=$this->getEntityManager();
        $user = $entityManager->getReference('UserBundle\Entity\User',$id);
        $entityManager->remove($user);
        $entityManager ->flush();
        
    }
    public function modifUser($id,$name,$password)
    {
        $entityManager=$this->getEntityManager();
        $newuser = $this->find($id);
        $newuser->setName($name);
        $newuser->setPassword($password);

        $entityManager->persist($newuser);

        $entityManager->flush();

    }
}