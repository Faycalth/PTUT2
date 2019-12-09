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
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $manager=$this->getDoctrine()->getEntityManager();
    
        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM Etudiant 
            WHERE id=:idapp
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idapp'=>$idapp]);

        $result =$stmt->fetchAll();

        if ($result != null){
            return true;
        }
        else 
            return false;
    }

    public function isTuteur(){
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $manager=$this->getDoctrine()->getEntityManager();
        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM Professeur 
            WHERE id=:idapp
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idapp'=>$idapp]);

        $result =$stmt->fetchAll();

        if ($result != null){
            return true;
        }
        else 
            return false;
    }

}