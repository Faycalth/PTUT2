<?php

namespace App\Controller;
use App\Entity\Taches;
use App\Entity\Etudiant;
use App\Entity\Groupe;
use App\Form\GroupeType;
use App\Form\ReunionType;
use App\Form\TacheType;
use App\Entity\Professeur;
use App\Entity\Notification;
use App\Repository\EtudiantRepository;
use App\Repository\GroupeRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\TachesRepository;
use App\Form\InviterEtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Reunion;
use App\Repository\ReunionRepository;
use App\Service\EtudiantConnecte;
use App\Service\Notifications;

class reunionController extends AbstractController
{

    /**
     * @Route("/monprojet", name="monprojet")
     */
    public function myproject(Request $request, EtudiantRepository $etu_repository,ObjectManager $manager, Notifications $notifications,EtudiantConnecte $user,TachesRepository $taches_Repository)
    { 
        //recuperation de l'etudiant connecté
        // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant = $user->getUser();
        //fin recuperation

        
        $etu_groupe=$etudiant->getGroupe();
        
        $conn =$manager->getConnection();
        //la liste des étudiants présents dans le groupe 
        $sql = '
            SELECT * FROM etudiant etu
            WHERE etu.groupe_id=:etu_groupe order by nom asc
            ';
        $sql_invite = '
            SELECT * FROM Etudiant etu
            WHERE etu.groupe_id !=:etu_groupe or  etu.groupe_id is null order by nom asc
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['etu_groupe' => $etu_groupe]);
       
        $stmt_invite = $conn->prepare($sql_invite);
        $stmt_invite->execute(['etu_groupe' => $etu_groupe]);

        $listeetudiant= $stmt_invite->fetchAll();
        $etudiants =$stmt->fetchAll();
        $result=count($etudiants);
        //fin la liste des étudiants présents dans le groupe
      
   
    //fonctionnalité invité un etudiant 
    $etu='l';
    $nom_prenom=$request->request->get('nom-prenom');
    
     if(($nom_prenom!==null) ) 
    {
        $pieces = explode(" ", $nom_prenom);
        $nom=$pieces[0];
         $prenom=$pieces[1];
            $sql2 = '
                    SELECT * FROM Etudiant etu
                    WHERE etu.nom=:nom and etu.prenom=:prenom 
                    ';
            $stmts = $conn->prepare($sql2);
            $stmts->execute(['nom' => $nom,'prenom'=>$prenom]);
            $etu =$stmts->fetchAll();
            
     if($etu){
            
            $repository = $this->getDoctrine()->getRepository(Etudiant::class);
            $groupe=$etu_groupe;
            $notification=new Notification();

            $nom_groupe=$groupe->getNom();
            $nom_etudiant=$prenom.' '.$nom;
            
            $etus=$repository->find($etu[0]['id']);
            
                  // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
            $notifications->groupeEnvoiNotification($nom_etudiant,"",$nom_groupe,$etus,null,$groupe,"Demande_Groupe",$manager );
      

        }
        // fin invité un etudiant 
       
    }
     //fonctionnalité demander un tuteur pour un encadrement 
        
     $sql2 = '
     select * from `professeur` where id not in(select  professeur_id from `groupe` where professeur_id  is not null  group by professeur_id >2 ) order by nom asc ';
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute();
     $professeurs=$stmt2->fetchAll();
     $etu='l';
     $nom_prenom_prof=$request->request->get('nom-prenom-prof');
     
      if(($nom_prenom_prof!==null) ) 
     {
         $pieces = explode(" ", $nom_prenom_prof);
         $nom_prof=$pieces[0];
          $prenom_prof=$pieces[1];
             $sql2 = '
                     SELECT * FROM Professeur prof
                     WHERE prof.nom=:nom and prof.prenom=:prenom 
                     ';
             $stmts = $conn->prepare($sql2);
             $stmts->execute(['nom' => $nom_prof,'prenom'=>$prenom_prof]);
             $etu =$stmts->fetchAll();
             
      if($etu){
              
             $repository = $this->getDoctrine()->getRepository(Professeur::class);
             $groupe=$etu_groupe;
             $notification=new Notification();
 
             $nom_groupe=$groupe->getNom();
             $nom_professeur=$prenom_prof.' '.$nom_prenom;
             
             $etus=$repository->find($etu[0]['id']);
             
                   // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
             $notifications->groupeEnvoiNotification("",$nom_professeur,$nom_groupe,null,$etus,$groupe,"Demande_Tuteur",$manager );
  
         }
        }

        //ajout d'une tache
        $tache = new Taches();
        $form = $this->createForm(TacheType::class, $tache);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $tache->setStatut("afaire");
           
            $tache->setGroupe($etu_groupe);
            $tache->setCreatesAt(new \DateTime());
            $manager->persist($tache);
            $manager->flush();
            return $this->redirectToRoute('monprojet');
        }

        //fin ajout tache

        //recherche et affichage des taches
        $sql_tache = '
         select * from `taches` where groupe_id=:groupe ';
         $stmt_tache = $conn->prepare($sql_tache);
        $stmt_tache->execute(['groupe'=>$etu_groupe]);
         $taches=$stmt_tache->fetchAll();

        //fin recherche et affichage des taches
  



        return $this->render('reunionTemplate/myproject.html.twig',['taches'=>$taches,'form' => $form->createView() ,'groupe_etu'=>$etu_groupe,'listeetudiant'=>$listeetudiant,'etudiants'=>$etudiants,'etu'=>$etu,'result'=>$result,'professeurs'=>$professeurs]
    );
    }


    /**
     * @Route("/reunion_historique", name="reunion_historique")
     */
    public function reunion(ReunionRepository $repo)
    {
        $reunions = $repo->findAll();
        
        return $this->render('reunionTemplate/reunion.html.twig', [
            'controller_name' => 'reunionController',
            'reunions' => $reunions
        ]);
    }

    /**
     * @Route("/reunion_ajoutReunion", name="Ajout_reunion")
     */
    public function ajoutReunion(Request $request, ObjectManager $manager,EtudiantConnecte $user)
    {

        $ajout = new Reunion();
        $form = $this->createForm(ReunionType::class, $ajout);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            
         // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
             $etudiant = $user->getUser();
            $groupe= $etudiant->getGroupe();
            $ajout->setRelation($groupe);

            $ajout->setCreateAt(new \DateTime());
            $manager->persist($ajout);
            $manager->flush();

            return $this->redirectToRoute('reunion_historique');

        }
        
        
        return $this->render('reunionTemplate/Ajoutreunion.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/reunion/{id}", name="reunion_show")
     */
    public function show(Reunion $reunion, Request $request, ObjectManager $manager)
    {
        

        return $this->render('reunionTemplate/reunion_show.html.twig', [
            'reunion' => $reunion,
        ]);
    }  

     /**
    * @Route("/taches_change_statut/{id}/{statut}", name="taches_change_statut")
    */
   public function tache_statut(Taches $tache,$statut,ObjectManager $manager){
        $tache->setStatut($statut);
        $manager->persist($tache);
        $manager->flush();

    return $this->redirectToRoute('monprojet');
    }




}
