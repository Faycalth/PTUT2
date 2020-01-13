<?php

namespace App\Controller;


use App\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Service\ProfesseurConnecte;

class tuteurController extends AbstractController
{


    /**
    * @Route("/tuteur/home", name="tuteur_home")
    */
    public function home()
    {
        return $this->render('tuteurTemplate/tuteur_home.html.twig');
    }

    /**
    * @Route("/mesgroupes", name="mesgroupes")
    */
    public function mesgroupes(ObjectManager $manager,ProfesseurConnecte $prof)
    {
        $conn =$manager->getConnection();
        $id_prof=$prof->getUser_p()->getId();
        $sql="select * from groupe where professeur_id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id_prof]);  
        $groupes=$stmt->fetchAll();
        return $this->render('tuteurTemplate/tuteur_mesgroupes.html.twig',['groupes'=>$groupes]);
    }

        /**
    * @Route("/projetGroupe/{id}", name="projetGroupe")
    */
    public function projetGroupe(Groupe $etu_groupe,ObjectManager $manager)
    {
        $conn =$manager->getConnection();
        //la liste des étudiants présents dans le groupe 
        $sql = '
            SELECT * FROM etudiant etu
            WHERE etu.groupe_id=:etu_groupe order by nom asc
            ';
       
        $stmt = $conn->prepare($sql);
        $stmt->execute(['etu_groupe' => $etu_groupe]);
        $etudiants =$stmt->fetchAll();
        
        //fin la liste des étudiants présents dans le groupe

         //recherche et affichage des taches
         $sql_tache = '
         select * from `taches` where groupe_id=:groupe ';
         $stmt_tache = $conn->prepare($sql_tache);
        $stmt_tache->execute(['groupe'=>$etu_groupe]);
         $taches=$stmt_tache->fetchAll();

        //fin recherche et affichage des taches

        return $this->render('tuteurTemplate/tuteur_mesgroupes_projet.html.twig',['groupe_etu'=>$etu_groupe,'taches'=>$taches,'etudiants'=>$etudiants]);
    }

         /**
    * @Route("/reunionGroupe/{id}", name="reunionGroupe")
    */

    public function reunionGroupe(Groupe $etu_groupe,ObjectManager $manager)
    {
        $conn =$manager->getConnection();
       
       
        $sql_tache = '
         select * from `reunion` where relation_id=:groupe ';
         $stmt_tache = $conn->prepare($sql_tache);
        $stmt_tache->execute(['groupe'=>$etu_groupe]);
         $reunions=$stmt_tache->fetchAll();

        return $this->render('tuteurTemplate/tuteur_reunion.html.twig',['reunions' => $reunions,'groupe_etu'=>$etu_groupe,]);
    }



}