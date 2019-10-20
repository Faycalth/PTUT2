<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Entity\Etudiant;
use App\Form\GroupeType;
use App\Entity\Professeur;
use App\Repository\EtudiantRepository;
use App\Repository\GroupeRepository;
use App\Repository\ProfesseurRepository;

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
    public function listeGroupe()
    {
        $groupes = $this->groupe_repository->findAll();
        return $this->render('groupeTemplate/groupe_liste_show.html.twig', compact('groupes'));
    }

    /**
     * @route("/groupe/rejoindre/{id}", name="groupe_rejoindre")
     */
     public function rejoindreGroupe(Groupe $groupe,EtudiantRepository $repository,ObjectManager $manager)
     {
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiant = $repository->find($idapp);
        
        $groupe->addEtudiant($etudiant);
        $etudiant->setGroupe($groupe);
        $manager->persist($groupe);
        $manager->flush();

        return $this->render('accueilTemplate/home.html.twig');
     }



}