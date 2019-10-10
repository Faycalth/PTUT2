<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class groupeController extends AbstractController
{


    /**
    * @Route("/groupe/home", name="groupe_home")
    */
    public function home()
    {
        return $this->render('groupeTemplate/groupe_home.html.twig');
    }

}