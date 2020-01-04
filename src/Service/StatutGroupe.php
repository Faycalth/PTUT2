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
        $manager=$this->getDoctrine()->getENtityManager();
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        

        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM etudiant etu
            WHERE etu.prenom=:prenom and etu.nom=:nom
            ';
        $stmt_invite = $conn->prepare($sql);
        $stmt_invite->execute(['prenom' => $user->getPrenom(),'nom' => $user->getNom()]);
        $etudiants =$stmt_invite->fetchAll();

        $user = $repository->find($etudiants[0]['id']);
        
        $etu_groupe=$user->getGroupe();

            return $etu_groupe;
    }
}