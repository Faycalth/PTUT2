<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class newController extends AbstractController
{


    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('newController/home.html.twig');
    }

    /**
     * @Route("/etudiant/home", name="etudiant_home")
     */
    public function etudiant()
    {
        return $this->render('newController/etudiant.html.twig');
    }

   /**
     * @Route("/tuteur/home", name="tuteur_home")
     */
    public function tuteur()
    {
        return $this->render('newController/tuteur.html.twig');
    }

    /**
     * @Route("/admin/home", name="admin_home")
     */
    public function admin()
    {
        return $this->render('newController/admin.html.twig');
    }

}