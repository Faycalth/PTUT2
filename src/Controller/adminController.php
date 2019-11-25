<?php
namespace App\Controller;

use App\Entity\Groupe;
use App\Entity\Etudiant;
use App\Form\GroupeType;
use App\Form\TuteurType;
use App\Entity\Professeur;
use App\Form\RegistrationType;
use App\Repository\GroupeRepository;
use App\Repository\EtudiantRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class adminController extends AbstractController
{
    /**
    * @Route("/admin/home", name="admin_home")
    */
    public function home()
    {
        return $this->render('adminTemplate/admin_home.html.twig');
    }

    /**
    * @Route("/admin/promotion", name="admin_promotion")
    */
    public function promotion(){
        $etudiants = $this->etudiant_repository->findAll();
        return $this->render('adminTemplate/admin_promotion.html.twig', compact('etudiants'));
    } 

    /**
    * @Route("/admin/promotionAction", name="promotionAction")
    */
    public function promotionAction(Etudiant $etudiant){

        $user = $etudiant;
    
        $userManager = $this->get('fos_user.user_manager');    
        $user->addRole('ROLE_TUTEUR');
        $userManager->updateUser($user);
    
        return $this->render('adminTemplate/admin_promotion.html.twig');
    } 
    

    /**
     * @var EtudiantRepository;
     */
    private $repository;

    public function __construct(EtudiantRepository $etudiant_repository, ProfesseurRepository $prof_repository, ObjectManager $manager, GroupeRepository $groupe_repository)
    {
        $this->etudiant_repository = $etudiant_repository;
        $this->prof_repository = $prof_repository;
        $this->groupe_repository = $groupe_repository;
        $this->manager = $manager;

    }

    /*--------- La route principale pour l'admin -------*/

    /**
     * @Route("/admin/dashboard", name = "admin_dashboard")
     */
    public function index()
    {
        $etudiants = $this->etudiant_repository->findAll();
        return $this->render('adminTemplate/admin_dashboard.html.twig', compact('etudiants'));
    }


    /*--------- La page ou l'administrateur pourra choisir ce qu'il veut faire -------*/

    /**
     * @Route("/admin/choix", name = "admin_liste_etudiant")
     */
    public function listeEtudiant()
    {   
        
        $etudiants = $this->etudiant_repository->findAll();

           // pour importer les etudiants
           $message=null;
           if (isset($_POST["import"])) {
       
               $fileName = $_FILES["file"]["tmp_name"];
               
               if ($_FILES["file"]["size"] > 0) {
                 
                 $file = fopen($fileName, "r");
                 $column = fgetcsv($file, 10000, ";");
                 while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
                   $sql = "INSERT into personne (nom,prenom)
                        values ('" . $column[0] . "','" . $column[1] . "')";
                   $conn=$this->getDoctrine()->getManager()->getConnection();
                   
                   $stmt = $conn->prepare($sql);
                  $result= $stmt->execute();
                   
                   if (! empty($result)) {
                     $type = "success";
                     $message = "Les Données sont importées dans la base de données";
                   } else {
                     $type = "error";
                     $message = "Problème lors de l'importation de données CSV";
                   }
                 }
               }
             }
   
           //fin import etudiant
        return $this->render('adminTemplate/adminEtudiantTemplate/index.html.twig', ['etudiants'=>$etudiants, 'message'=>$message]);
    }

    /**
     * @Route("/admin/liste_tuteur", name = "admin_liste_tuteur")
     */
    public function listeTuteur()
    {
        $professeur = $this->prof_repository->findAll();
        return $this->render('adminTemplate/adminTuteurTemplate/index.html.twig', compact('professeur'));
    }

    /**
     * @Route("/admin/liste_groupe", name = "admin_liste_groupe")
     */
    public function listeGroupe()
    {
        $groupe = $this->groupe_repository->findAll();
     

        return $this->render('adminTemplate/adminGroupeTemplate/index.html.twig', compact('groupe'));
    }

    /*--------- La page pour modifier un etudiant -------*/

    /**
     * @Route("/admin/etudiant{id}", name = "admin_edit_etudiant", methods = "POST|GET")
     */
    public function edit_etudiant(Etudiant $etudiant, Request $request, ObjectManager $manager)
    {
        $this->manager = $manager;
        $form = $this->createForm(RegistrationType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();
            $this->addFlash('success', 'Etudiant modifier avec succès');
            return $this->redirectToRoute('admin_liste_etudiant');
        }
        
        return $this->render('adminTemplate/adminEtudiantTemplate/index.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView()
        ]);
    }



    /*--------- La page pour modifier un tuteur -------*/

    /**
     * @Route("/admin/tuteur{id}", name = "admin_edit_tuteur", methods = "POST|GET")
     */
    public function edit_tuteur(Professeur $professeur, Request $request, ObjectManager $manager)
    {
        $this->manager = $manager;
        $form = $this->createForm(TuteurType::class, $professeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();
            $this->addFlash('success', 'Tuteur modifié avec succès');
            return $this->redirectToRoute('admin_liste_tuteur');
        }
        
        return $this->render('adminTemplate/adminTuteurTemplate/index.html.twig', [
            'professeur' => $professeur,
            'form' => $form->createView()
        ]);
    }


        /*--------- La page pour modifier un groupe -------*/

    /**
     * @Route("/admin/groupe{id}", name = "admin_edit_groupe", methods = "POST|GET")
     */
    public function edit_groupe(Groupe $groupe, Request $request, ObjectManager $manager)
    {
        $this->manager = $manager;
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();
            $this->addFlash('success', 'Groupe modifié avec succès');
            return $this->redirectToRoute('admin_liste_groupe');
        }
        
        return $this->render('adminTemplate/adminGroupeTemplate/index.html.twig', [
            'groupe' => $groupe,
            'form' => $form->createView()
        ]);
    }

    /*--------- L'action pour supprimer un etudiant -------*/



    /**
     * @Route("/admin/etudiant{id}", name = "admin_delete_etudiant", methods = "DELETE")
     */
    public function delete_etudiant(Etudiant $etudiant, Request  $request)
    {
        //if ($this->isCsrfTokenValid('delete', $etudiant->getId(), $request->get('_token') )) {
            $this->manager->remove($etudiant);
            $this->manager->flush();
            $this->addFlash('success', 'Etudiant supprimé avec succès');
            
       //}
        return $this->redirectToRoute('admin_liste_etudiant');  
    }

        /*--------- L'action pour supprimer un tuteur -------*/
 
    /**
     * @Route("/admin/tuteur{id}", name = "admin_delete_tuteur", methods = "DELETE")
     */
    public function delete_tuteur(Professeur $prof, Request  $request)
    {
        //if ($this->isCsrfTokenValid('delete', $tuteur->getId(), $request->get('_token') )) {
            $this->manager->remove($prof);
            $this->manager->flush();
            $this->addFlash('success', 'Tuteur supprimé avec succès');
            
       //}
        return $this->redirectToRoute('admin_liste_tuteur');  
    }


        /*--------- L'action pour supprimer un tuteur -------*/
 
    /**
     * @Route("/admin/groupe{id}", name = "admin_delete_groupe", methods = "DELETE")
     */
    public function delete_groupe(Groupe $groupe, Request  $request)
    {
        //if ($this->isCsrfTokenValid('delete', $etudiant->getId(), $request->get('_token') )) {
            $this->manager->remove($groupe);
            $this->manager->flush();
            $this->addFlash('success', 'Groupe supprimé avec succès');
            
       //}
        return $this->redirectToRoute('admin_liste_groupe');  
    }

    
}



