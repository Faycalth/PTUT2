<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class TuteurController extends AbstractController
{


    /**
    * @Route("/tuteur/home", name="tuteur_home")
    */
    public function home()
    {
        return $this->render('tuteurTemplate/tuteur_home.html.twig');
    }

    /**
    * @Route("/tuteur/mesgroupes", name="mesgroupes")
    */
    public function mesgroupes()
    {
        return $this->render('tuteurTemplate/tuteur_mesgroupes.html.twig');
    }

}