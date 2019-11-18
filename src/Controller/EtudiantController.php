<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class EtudiantController extends AbstractController
{


    /**
    * @Route("/etudiant/home", name="etudiant_home")
    */
    public function home()
    {
        return $this->render('etudiantTemplate/etudiant_home.html.twig');
    }

    /**
     * @Route("/myproject", name="myproject")
     */
    public function myproject()
    {
        return $this->render('reunionTemplate/myproject.html.twig');
    }

}