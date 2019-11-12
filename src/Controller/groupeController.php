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

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class groupeController extends AbstractController
{

   /**
    * @Route("/groupe/creation", name="groupe_creation")
    */
    public function creation(Request $request, ObjectManager $manager,EtudiantRepository $repository)
    {
        $groupe = new Groupe();
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
          
            $token = $this->get('security.token_storage')->getToken();
            $user = $token->getUser();
            
            $idapp=$user->getId();
            $repository = $this->getDoctrine()->getRepository(Etudiant::class);
            $etudiant = $repository->find($idapp);
            
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

    public function __construct(EtudiantRepository $etudiant_repository, ProfesseurRepository $prof_repository, ObjectManager $manager, GroupeRepository $groupe_repository)
    {
        $this->etudiant_repository = $etudiant_repository;
        $this->prof_repository = $prof_repository;
        $this->groupe_repository = $groupe_repository;
        $this->manager = $manager;

    }

    /**
     * @Route("/groupe/liste", name="groupe_liste")
     */
    public function listeGroupe(GroupeRepository $groupe_repository)
    {
        $groupes = $groupe_repository->findAll();
        return $this->render('groupeTemplate/groupe_liste_show.html.twig', compact('groupes'));
    }

 /**
     * @route("/groupe/rejoindre/{nom}", name="groupe_rejoindre")
     */
    public function rejoindreGroupe(Groupe $groupe,EtudiantRepository $repository,ObjectManager $manager)
    {
       $token = $this->get('security.token_storage')->getToken();
       $user = $token->getUser();
       
       $idapp=$user->getId();
       $repository = $this->getDoctrine()->getRepository(Etudiant::class);
       $etudiant = $repository->find($idapp);
       
       $id_groupe=$groupe->getId();

       $notification=new Notification();

       $nom_groupe=$groupe->getNom();
       $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();    

       $notification->setNomSourceEtudiant($nom_etudiant);
       $notification->setNomGroupe($nom_groupe);
       $notification->setSourceGroupe($groupe);
       $notification->setSourceEtudiant($etudiant);
       $notification->setDestGroupe($groupe);
       $notification->setType("Demande");
       $notification->setStatut("Non lu");
       $notification->setCreatedAt(new \DateTime());
       
       $manager->persist($notification);
       $manager->flush();

       return $this->redirectToRoute('groupe_liste');
    }

 /**
     * @route("/groupe/accepter/{id}/{id_notif}", name="accepter_etudiant")
     */
    public function accepterEtudaint(Etudiant $etudiant,$id_notif,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository)
    {
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $user = $repository->find($idapp);
        $groupe=$user->getGroupe();
        
        $etudiant->setGroupe($groupe);

        $notification=new Notification();

        $nom_groupe=$groupe->getNom();
        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();

       $notification->setSourceGroupe($groupe);
       $notification->setNomDestEtudiant($nom_etudiant);
       $notification->setNomGroupe($nom_groupe);
       $notification->setDestEtudiant($etudiant);
       $notification->setType("Accepter");
       $notification->setCreatedAt(new \DateTime());

       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
       $manager->persist($notification);
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }

    
 /**
     * @route("/groupe/refuser/{id}/{id_notif}", name="refuser_etudiant")
     */
    public function refuserEtudaint(Etudiant $etudiant,$id_notif,EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository)
    {
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $user = $repository->find($idapp);
        $groupe=$user->getGroupe();
        
       

        $notification=new Notification();

        $nom_groupe=$groupe->getNom();
        $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();

       $notification->setSourceGroupe($groupe);
       $notification->setNomDestEtudiant($nom_etudiant);
       $notification->setNomGroupe($nom_groupe);
       $notification->setDestEtudiant($etudiant);
       $notification->setType("Refuser");
       $notification->setCreatedAt(new \DateTime());

       $not_repository = $this->getDoctrine()->getRepository(Notification::class);
       $notifsup = $not_repository->find($id_notif);
       
       $manager->remove($notifsup);        
       $manager->persist($notification);
        $manager->persist($etudiant);
        $manager->flush();

        return $this->redirectToRoute('notification');
    }

       
 /**
     * @route("/groupe/quitter", name="quitter_groupe")
     */
    public function quitterGroupe(EtudiantRepository $repository,ObjectManager $manager,NotificationRepository $not_repository)
    {
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiant = $repository->find($idapp);
        $groupe=$etudiant->getGroupe();
        $etudiant->setGroupe(null);

        $notification=new Notification();
        $nom_groupe=$groupe->getNom();
       $nom_etudiant=$etudiant->getPrenom().' '.$etudiant->getNom();    

       $notification->setNomSourceEtudiant($nom_etudiant);
       $notification->setNomGroupe($nom_groupe);
       $notification->setSourceGroupe($groupe);
       $notification->setSourceEtudiant($etudiant);
       $notification->setDestGroupe($groupe);
       $notification->setType("Quitter");
       $notification->setCreatedAt(new \DateTime());
       
       $manager->persist($notification);
       $manager->flush();
        
       return $this->redirectToRoute('home');

    }

        
}