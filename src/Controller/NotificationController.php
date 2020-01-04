<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\Groupe;
use App\Entity\Etudiant;
use App\Form\GroupeType;
use App\Form\InviterEtudiantType;
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

class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="notification")
     */
    public function notification(EtudiantRepository $etu_repository,NotificationRepository $not_repository,ObjectManager $manager,EtudiantConnecte $user_e,ProfesseurConnecte $user_p)
    {
        $conn =$manager->getConnection();
          $token = $this->get('security.token_storage')->getToken();
          $user = $token->getUser();
          
       

          $type=$user->getType();

          if ($type == "ETUDIANT"){
        
          $etudiant = $user_e->getUser();
          $idapp=$etudiant->getId();
          $etu_groupe=$etudiant->getGroupe();
          $sql = '
              SELECT * FROM Notification notif
              WHERE notif.dest_groupe_id=:etu_groupe or notif.dest_etudiant_id=:idapp 
              Order by notif.created_at desc
              ';
           $stmt = $conn->prepare($sql);
          $stmt->execute(['etu_groupe' => $etu_groupe, 'idapp'=>$idapp]);  
          }
          else{
           
            $tuteur= $user_p->getUser_p();
            $id=$tuteur->getId();
            $sql = '
              SELECT distinct * FROM Notification notif
              WHERE notif.dest_groupe_id in (select id from groupe where professeur_id=:tuteur)  or notif.dest_professeur_id=:idapp 
              Order by notif.created_at desc
              ';
           $stmt = $conn->prepare($sql);
          $stmt->execute(['tuteur' => $id, 'idapp'=>$id]);  
          



          }
        
      

               
         
       $notification =$stmt->fetchAll();
        return $this->render('notification/notification.html.twig',compact('notification'));
    }

     /**
     * @Route("/notification/remove/{id}", name="remove_notification")
     */
    public function removeNotif($id,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
        
        
       

       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id);
       
       $manager->remove($notifsup);        
       
      
        $manager->flush();

        return $this->redirectToRoute('notification');
    }


}
