<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Groupe;
use App\Form\GroupeType;
use App\Form\ReunionType;
use App\Entity\Professeur;
use App\Entity\Notification;
use App\Repository\EtudiantRepository;
use App\Repository\GroupeRepository;
use App\Repository\ProfesseurRepository;
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
    public function myproject(Request $request, EtudiantRepository $etu_repository,ObjectManager $manager, Notifications $notifications,EtudiantConnecte $user)
    { 
        //recuperation de l'etudiant connecté
        // utilisation de la fonction get user qui se trouve dans le dossier service\Etudiantconnecter pour recuperer le user connecter
        $etudiant = $user->getUser();
        //fin recuperation
        $etu_groupe=$etudiant->getGroupe();
        
        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM Etudiant etu
            WHERE etu.groupe_id=:etu_groupe 
            ';
        $sql_invite = '
            SELECT * FROM Etudiant etu
            WHERE etu.groupe_id !=:etu_groupe or  etu.groupe_id is null
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['etu_groupe' => $etu_groupe]);
       
        $stmt_invite = $conn->prepare($sql_invite);
        $stmt_invite->execute(['etu_groupe' => $etu_groupe]);

        $listeetudiant= $stmt_invite->fetchAll();
        $etudiants =$stmt->fetchAll();
        $result=count($etudiants);
      
   
    //fonctionnalité invité un etudiant 
    $etu='l';
    $nom=$request->request->get('nom_etudiant');
    $prenom=$request->request->get('prenom_etudiant');
     if(($nom!==null) && ($prenom!==null)) 
    {
        
            $sql2 = '
                    SELECT * FROM Etudiant etu
                    WHERE etu.nom=:nom and etu.prenom=:prenom
                    ';
            $stmts = $conn->prepare($sql2);
            $stmts->execute(['nom' => $nom,'prenom'=>$prenom]);
            $etu =$stmts->fetchAll();
            
     if($etu){
            $token = $this->get('security.token_storage')->getToken();
            $user = $token->getUser();
    
            $idapp=$user->getId();
            $repository = $this->getDoctrine()->getRepository(Etudiant::class);
            $user = $repository->find($idapp);
            $groupe=$user->getGroupe();
            $notification=new Notification();

            $nom_groupe=$groupe->getNom();
            $nom_etudiant=$prenom.' '.$nom;
            
            $etus=$repository->find($etu[0]['id']);
            
                  // utilisation de la fonction  qui se trouve dans le dossier service\Notifications pour generer une notification
            $notifications->groupeEnvoiNotification($nom_etudiant,$nom_groupe,$etus,$groupe,"Demande_Groupe",$manager );
      

        }
        // fin invité un etudiant 
       
    }
     //fonctionnalité demander un tuteur pour un encadrement 
        
     $sql2 = '
     select * from `professeur` where id not in(select  professeur_id from `groupe` group by professeur_id having count(id)>2) ';
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute();
     $professeurs=$stmt2->fetchAll();

        
  



        return $this->render('reunionTemplate/myproject.html.twig',['listeetudiant'=>$listeetudiant,'etudiants'=>$etudiants,'etu'=>$etu,'result'=>$result,'professeurs'=>$professeurs]
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
            $groupe=$etudiant->getGroups();
            $ajout->setRelation($groupe);

            $manager->persist($ajout);
            $manager->flush();

            return $this->redirectToRoute('reunion_show');

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
    * @Route("reunion/taches", name="taches")
    */
   public function tache(){
    return $this->render('reunionTemplate/tache.html.twig');
    }

}