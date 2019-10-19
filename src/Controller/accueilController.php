<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class accueilController extends AbstractController
{
   /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('accueilTemplate/home.html.twig');
    }

    /**
    * @Route("/notification", name="notification")
    */
    public function notification()
    {
        return $this->render('accueilTemplate/notification.html.twig');
    }

}