<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * *@Route("/contact-us")
     */
    public function numberAction()
    {
        $number = mt_rand(0,100);

        return new Response('<html><body>Lucky number is: '.$number.'</body></html>');
    }
    /**
     * *@Route("/Connexion")
     */
    public function homeAction()
    {
        $number = mt_rand(0,100);
        return $this->render('affichage/number.html.twig',array('num'=>$number));
    }
}
