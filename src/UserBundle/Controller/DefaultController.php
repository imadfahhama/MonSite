<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use UserBundle\Entity\adduser;
use UserBundle\Entity\Image;
use UserBundle\Entity\User;
use UserBundle\Entity\UserRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/Ajouter", name="User")
     */
    public function indexAction(Request $request)
    {
        $user = new adduser();
        $user->setPassword("Test");
        $user->setName("Test");

        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('password', 'password')
            ->add('save', 'submit', array('label' => 'Create User'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $img = new Image();
            $img->setAlt("image de test");
            $img->setUrl("http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg");

            $name = $form->get("name")->getData();
            $pwd = $form->get("password")->getData();
            $user = new User();
            //$user ->setId();
            $user->setName($name);
            $user->setPassword($pwd);
            $user->setImage($img);

            $rep = $this->getDoctrine()->getManager()->getRepository(User::class);

            $result = $rep->addUser($user);

            return $this->render('affichage/Ajouter.html.twig', array('form' => $form->createView(), 'result' => $result));
        }
        return $this->render('affichage/Ajouter.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/Connexion", name="Usercnx")
     */
    public function conxAction(Request $request)
    {

        //return $this->render('affichage/connexion.html.twig');
        $content = $this->get('templating')->render('affichage/connexion.html.twig', array('nom' => 'Imad'));
        return new response($content);
    }

    /**
     * @Route("/verification", name="verif")
     */
    public function verifAction(Request $request)
    {

        $name = $request->request->get('name');
        $pwd = $request->request->get('pwd');

        $user = new User();
        //$user ->setId();
        $user->setName($name);
        $user->setPassword($pwd);

        $repository = $this->getDoctrine()
            ->getRepository(User::class);

        $user2 = $repository->findOneBy(
            array('name' => $name, 'password' => $pwd)
        );

        /*$user2 = $this->getDoctrine()
            ->getRepository(User::class)
            ->find("5");
        */

        if (!$user2) {
            return new Response('KO');
        } else {

            $this->container->get('request')->getSession()->set('MyUser', $user2->getname());

            return $this->render('affichage/Home.html.twig');
        }
    }

    /**
     * @Route("/ListCls", name="listeclient")
     */
    public function listerclAction(Request $request)
    {
        $userRep = $this->getDoctrine()->getManager()->getRepository(User::class);

        $result = $userRep->listUser();

        //var_dump($result);die();
        $this->container->get('request')->getSession()->set('AllUsers', $result);
        return $this->render('affichage/ListCls.html.twig');
    }

    /**
     * @Route("/Modifier", name="modif")
     */
    public function modifAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(User::class);

        $user = $repository->findAll();

        $this->container->get('request')->getSession()->set('AllUsers', $user);

        return $this->render('affichage/Modifier.html.twig');
    }

    /**
     * @Route("/suprimer", name="delete")
     */
    public function deleteAction(Request $request)
    {

        $list = $request->request->get('check');
        $result = 0;
        for ($i = 0; $i < sizeof($list); $i++) {

            $delUser = $this->getDoctrine()->getManager()->getRepository(User::class);
            $delUser->deleteUser($list[$i]);
            $result = $result + 1;

        }
        if ($result == 1) {
            return new Response('Supression ' . $result . ' User');
        } else {
            return new Response('Supression ' . sizeof($list) . ' User');
        }


    }

    /**
     * @Route("/modid", name="modid")
     */
    public function modidAction(Request $request)
    {

        $id = $request->request->get('objmodif');
        $name = $request->request->get('newname');
        $password = $request->request->get('newpassword');


        /*if(!$user)
        {
            throw $this->createNotFoundException('No user fount for id'.$user);
        }
*/
        $delUser = $this->getDoctrine()->getManager()->getRepository(User::class);
        $delUser->modifUser($id, $name, $password);


        return $this->redirectToRoute('listeclient');
    }
    /**
     * @Route("/testgit",name="Git")
     */
    public function testGit(Request $request)
    {
        return $this->redirectToRoute('listeclient');
    }
}
