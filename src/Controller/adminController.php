<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class adminController extends AbstractController
{


    /**
    * @Route("/admin/home", name="admin_home")
    */
    public function home()
    {
        return $this->render('adminTemplate/admin_home.html.twig');
    }

}