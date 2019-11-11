<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Groupe;
use App\Form\GroupeType;
use App\Entity\Professeur;
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

class reunionController extends AbstractController
{

    /**
     * @Route("/monprojet", name="monprojet")
     */
    public function myproject(Request $request, EtudiantRepository $etu_repository,ObjectManager $manager)
    { 
        
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        
        $idapp=$user->getId();
        $etu_repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiant = $etu_repository->find($idapp);
        
        $etu_groupe=$etudiant->getGroupe();
        
        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM Etudiant etu
            WHERE etu.groupe_id=:etu_groupe 
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['etu_groupe' => $etu_groupe]);

        $etudiants =$stmt->fetchAll();

        
  



        return $this->render('reunionTemplate/myproject.html.twig',compact('etudiants')
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
    public function ajoutReunion(Request $request, ObjectManager $manager)
    {

        $ajout = new Reunion();

        $form = $this->createForm(ReunionType::class, $ajout);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            
            $ajout->setCreatedAt(new \DateTime());
            $ajout->setRelation($groupe);

            $manager->persist($ajout);
            $manager->flush();

            return $this->redirectToRoute('reunion_show');

        }
        
        
        return $this->render('reunionTemplate/Ajoutreunion.html.twig');
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