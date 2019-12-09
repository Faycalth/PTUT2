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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\EtudiantConnecte;

class EmailController extends AbstractController
{

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
    /**
     * @Route("/admin/etudiant_mail_inscription", name = "admin_mail_inscription")
     */
    public function mailInscription(\Swift_Mailer $mailer)
    {
        $etudiants = $this->etudiant_repository->findAll();
        $message=null;
        $color=null;
        $adresse_login=null;
        $adresse="www.google.com";
       $mail = (new \Swift_Message('Hello Email'))
            ->setFrom('myptut@gmail.com')
            ->setTo('faycalthamri38@gmail.com')
            ->setBody(
                $this->renderView(
                    // templates/hello/email.txt.twig
                    'emails/email_inscription.html.twig',
                    ['adresse_login' => $adresse,
                    'name' => 'faycal'] )
            )
        ;
        $mailer->send($mail);
        $message = "Le mail a été envoyé avec succès";
        $color="success";

        /*
        {% for etudiant in etudiants %}
                    if 


        */

        return $this->render('adminTemplate/adminEtudiantTemplate/index.html.twig',   ['color'=>$color,'etudiants'=>$etudiants, 'message'=>$message]);
    }
/*
    public function mailEtudiant(Etudiant $etu, \Swift_Mailer $mailer)
    {
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $idapp=$user->getId();
        $etu_repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiant = $etu_repository->find($idapp);
        
        $etu_groupe=$etudiant->getGroupe();
        
        $adr_etu = $etu->getEmail();
        $nom_etu =$etu->getPrenom();
        $message=null;
        $color=null;
        $adresse_login=null;
        $adresse="www.google.com";
       $mail = (new \Swift_Message('Bienvenue sur MyPTUT !'))
            ->setFrom('myptut@gmail.com')
            ->setTo($adr_etu)
            ->setBody(
                $this->renderView(
                    // templates/hello/email.txt.twig
                    'emails/email_inscription.html.twig',
                    ['adresse_login' => $adresse,
                    'name' => $nom_etu] )
            )
        ;
        $mailer->send($mail);
        $message = "Le mail a été envoyé avec succès";
        $color="success";

        return $this->render('adminTemplate/adminEtudiantTemplate/index.html.twig',   ['color'=>$color,'etudiants'=>$etudiants, 'message'=>$message]);
    }
*/
    


}
