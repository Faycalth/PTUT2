<?php
namespace App\Service;


use App\Entity\Etudiant;

use App\Repository\EtudiantRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EtudiantConnecte  extends AbstractController
{


    public function getUser()
    {
           $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $user = $repository->find($idapp);
        return $user;
    }
}