<?php
namespace App\Service;

use App\Entity\Notification;
use App\Entity\Groupe;
use App\Entity\Etudiant;
use App\Form\GroupeType;
use App\Entity\Professeur;
use App\Repository\EtudiantRepository;
use App\Repository\GroupeRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\NotificationRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class StatutGroupe  extends AbstractController
{


    public function getStatutGroupe()
    {
           $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $user = $repository->find($idapp);
        $groupe=$user->getGroupe();

        return $groupe;
    }
}