<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\Groupe;
use App\Entity\Etudiant;
use App\Form\GroupeType;
use App\Entity\Professeur;
use App\Repository\EtudiantRepository;
use App\Repository\GroupeRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\NotificationRepository;
use App\Service\Notifications;
use App\Service\EtudiantConnecte;
use App\Service\ProfesseurConnecte;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager; 
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;


class groupeController extends AbstractController
{

   /**
    * @Route("/creation_groupe", name="groupe_creation")
    */
    public function creation(Request $request,\Doctrine\Common\Persistence\ManagerRegistry $registry,EtudiantRepository $repository,EtudiantConnecte $user)
    {
        $groupe = new Groupe();
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
          
            $etudiant = $user->getUser();
            
            $groupe->setProfesseurId(NULL);
            $groupe->setStatut("non valide");
            $groupe->addEtudiant($etudiant);
            $etudiant->setGroupe($groupe);
            $manager->persist($groupe);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('groupeTemplate/groupe_home.html.twig',[
            'form' => $form->createView() 
        ]);
    }

    /**
     * @var GroupeRepository;
     */
    private $repository;

    public function __construct(EtudiantRepository $etudiant_repository, ObjectManager $manager,ProfesseurRepository $prof_repository, \Doctrine\Common\Persistence\ManagerRegistry $registry, GroupeRepository $groupe_repository)
    {
        $this->etudiant_repository = $etudiant_repository;
        $this->prof_repository = $prof_repository;
        $this->groupe_repository = $groupe_repository;
        $this->manager = $manager;

    }

    /**
     * @Route("/liste_groupe", name="groupe_liste")
     */
    public function listeGroupe(ObjectManager $manager)
    {
       
        $conn =$manager->getConnection();

        $sql = '
           SELECT * FROM `groupe` where id in (SELECT g.id FROM `etudiant` e, `groupe` g WHERE e.groupe_id=g.id group by g.id having count(g.id)<7)';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $groupes =$stmt->fetchAll();
      
        return $this->render('groupeTemplate/groupe_liste_show.html.twig', compact('groupes'));
    }

 /**
     * @route("/rejoindre_groupe/{nom}", name="groupe_rejoindre")
     */ 
    public function rejoindreGroupe(Notifications $notifications,Groupe $groupe,EtudiantRepository $repository,ObjectManager $manager,EtudiantConnecte $user)
    {
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant = $user->getUser();
       
       $id_groupe=$groupe->getId();

      

       $nom_groupe=$groupe->getNom();
       $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();    

            // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
       $notifications->etudiantEnvoiNotification( $nom_etudiant,$nom_groupe,$etudiant,$groupe,"Demande",$manager);


       return $this->redirectToRoute('groupe_liste');
    }

 /**
     * @route("/accepter_groupe/{id}/{id_notif}", name="accepter_etudiant")
     */
    public function accepterEtudaint(Etudiant $etudiant,$id_notif,EtudiantRepository $repository,Notifications $notifications,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $users = $user->getUser();
        $groupe=$users->getGroupe();
        
        $etudiant->setGroupe($groupe);

       

        $nom_groupe=$groupe->getNom();
        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();

              // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
        $notifications->groupeEnvoiNotification($nom_etudiant,"",$nom_groupe,$etudiant,null,$groupe,"Accepter",$manager );
      

       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
      
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }

    
 /**
     * @route("/refuser_groupe/{id}/{id_notif}", name="refuser_etudiant")
     */
    public function refuserEtudaint(Etudiant $etudiant,$id_notif,EtudiantRepository $repository,Notifications $notifications,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $users = $user->getUser();
        $groupe=$users->getGroupe();

        $nom_groupe=$groupe->getNom();
        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();


              // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
        $notifications->groupeEnvoiNotification($nom_etudiant,"",$nom_groupe,$etudiant,null,$groupe,"Refuser",$manager );

       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
       
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }

       
 /**
     * @route("/quitter_groupe", name="quitter_groupe")
     */
    public function quitterGroupe(Notifications $notifications,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant = $user->getUser();
        $groupe=$etudiant->getGroupe();
        $etudiant->setGroupe(null);

        
        $nom_groupe=$groupe->getNom();
       $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();    

     // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
       $notifications->etudiantEnvoiNotification( $nom_etudiant,$nom_groupe,$etudiant,$groupe,"Quitter",$manager);
        
       return $this->redirectToRoute('home');

    }


    /**
     * @route("/accepter_groupe_groupe/{id}/{id_notif}", name="accepter_groupe")
     */
    public function accepterGroupe(Notifications $notifications,Groupe $groupe,$id_notif,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant= $user->getUser();
         
        $etudiant->setGroupe($groupe);

      
        
        $nom_groupe=$groupe->getNom();

        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();

              // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification

        $notifications->etudiantEnvoiNotification( $nom_etudiant,$nom_groupe,$etudiant,$groupe,"Accepter_groupe",$manager);
 
       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
      
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }
    
    /**
     * @route("/refuser_groupe/{id}/{id_notif}", name="refuser_groupe")
     */
    public function refuserGroupe(Groupe $groupe,$id_notif,EtudiantRepository $repository,Notifications $notifications,ObjectManager $manager,NotificationRepository $not_repository,EtudiantConnecte $user)
    {
        // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant = $user->getUser();
         
        $nom_groupe=$groupe->getNom();
        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();

         // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
        $notifications->etudiantEnvoiNotification( $nom_etudiant,$nom_groupe,$etudiant,$groupe,"Refuser_groupe",$manager);
  
       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
      
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }
     
        /**
     * @route("/accepter_tuteur/{id}/{id_notif}", name="accepter_tuteur")
     */
    public function accepterTuteur(Notifications $notifications,Groupe $groupe,$id_notif,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository,ProfesseurConnecte $user)
    {
        $tuteur = $user->getUser_p();
        
        $groupe->setProfesseurId($tuteur);

        $nom_groupe=$groupe->getNom();
        $nom_tuteur=$tuteur->getPrenom().' '.$tuteur->getNom();

         // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
        $notifications->tuteurEnvoiNotification( $nom_tuteur,$nom_groupe,$tuteur,$groupe,"Accepter_Tuteur",$manager);
  
       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
      
        $manager->persist($tuteur);
        $manager->flush();

        return $this->redirectToRoute('notification');
 

        return $this->redirectToRoute('home');
    }
    
    /**
     * @route("/refuser_tuteur/{id}/{id_notif}", name="refuser_tuteur")
     */
    public function refuserTuteur(Groupe $groupe,$id_notif,EtudiantRepository $repository,Notifications $notifications,ObjectManager $manager,NotificationRepository $not_repository,ProfesseurConnecte $user)
    {
        //
        
        $tuteur = $user->getUser_p();
         
        $nom_groupe=$groupe->getNom();
        $nom_tuteur=$tuteur->getPrenom().' '.$tuteur->getNom();

         // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
        $notifications->tuteurEnvoiNotification( $nom_tuteur,$nom_groupe,$tuteur,$groupe,"Refuser_Tuteur",$manager);
  
       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
      
        $manager->persist($tuteur);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }

        
}