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
use App\Service\EtudiantConnecte;
use App\Service\ProfesseurConnecte;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class nbNotif  extends AbstractController
{


    public function getNbNotif()
    {
        
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $type = $token->getUser()->getType();
        
        
            $manager=$this->getDoctrine()->getENtityManager();

            if ($type == "ETUDIANT"){
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
                
                $conn =$manager->getConnection();
                $idapp=$user->getId();

                $sql = '
                    SELECT * FROM notification notif
                    WHERE notif.dest_groupe_id=:etu_groupe or notif.dest_etudiant_id=:idapp
                    Order by notif.created_at desc
                    ';
                $stmt = $conn->prepare($sql);
                $stmt->execute(['etu_groupe' => $etu_groupe, 'idapp'=>$idapp]);

                $notificatio =$stmt->fetchAll();
            }
            else{
                $manager=$this->getDoctrine()->getENtityManager();
                $token = $this->get('security.token_storage')->getToken();
                $user = $token->getUser();
                $repository = $this->getDoctrine()->getRepository(Professeur::class);
                $idapp=$user->getId();
        
                $conn =$manager->getConnection();
        
                $sql = '
                    SELECT * FROM professeur etu
                    WHERE etu.prenom=:prenom and etu.nom=:nom
                    ';
                $stmt_invite = $conn->prepare($sql);
                $stmt_invite->execute(['prenom' => $user->getPrenom(),'nom' => $user->getNom()]);
                $etudiants =$stmt_invite->fetchAll();
        
                $user_p = $repository->find($etudiants[0]['id']);  

                $idapp=$user_p->getId();    
                $conn =$manager->getConnection();
              $prof_repository = $this->getDoctrine()->getRepository(Professeur::class);   
                    $tuteur= $prof_repository->find($idapp);
                    $sql = '
                      SELECT * FROM notification notif
                      WHERE notif.dest_groupe_id in (select id from groupe where professeur_id=:tuteur)  or notif.dest_professeur_id=:idapp 
                      Order by notif.created_at desc
                      ';
                   
                   $stmt = $conn->prepare($sql);
                  $stmt->execute(['tuteur' => $idapp, 'idapp'=>$idapp]);  

                $notificatio =$stmt->fetchAll();
            }

            $nbNotif=count($notificatio);
        
            
            return $nbNotif;
    }
    
}