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

class nbNotif  extends AbstractController
{

/*
    public function getNbNotif()
    {

        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();

        $manager=$this->getDoctrine()->getENtityManager();
        $etu_repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiant = $etu_repository->find($idapp);
        
        $etu_groupe=$etudiant->getGroupe();
        
        $conn =$manager->getConnection();

        $sql = '
            SELECT count(*) FROM Notification notif
            WHERE notif.dest_groupe_id=:etu_groupe or notif.dest_etudiant_id=:idapp
            Order by notif.created_at desc
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['etu_groupe' => $etu_groupe, 'idapp'=>$idapp]);

     $notificatio =$stmt->fetchAll();

     $nb=count($notificatio);
       

        return $notificatio;
    }*/
}