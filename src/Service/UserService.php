<?php
namespace App\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService extends AbstractController
{

    public function isEtudiant(){
        $token = $this->get('security.token_storage')->getToken();
        $type = $token->getUser()->getType();
        if ($type == "ETUDIANT"){
            return true;
        }
        else 
            return false;
    }

    public function isTuteur(){
        $token = $this->get('security.token_storage')->getToken();
        $type = $token->getUser()->getType();
        if ($type == "TUTEUR"){
            return true;
        }
        else 
            return false;
    }

    public function firstLogin(){
        $token = $this->get('security.token_storage')->getToken();
        $lastLog = $token->getUser()->getLastLogin();
        if ($lastLog == null){
            return true;
        }
        else 
            return false;
    }

}