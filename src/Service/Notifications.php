<?php
namespace App\Service;

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

class Notifications  extends AbstractController
{

    public function etudiantEnvoiNotification(String $nom_etudiant,String $nom_groupe,Etudiant $etudiant,Groupe $groupe,String $type,ObjectManager $manager )
    {
        $notification=new Notification();
        $notification->setNomEtudiant($nom_etudiant);
        $notification->setNomGroupe($nom_groupe);
        $notification->setSourceEtudiant($etudiant);
        $notification->setDestGroupe($groupe);
        $notification->setType($type);
        $notification->setCreatedAt(new \DateTime());
        
        $manager->persist($notification);
        $manager->flush();

    }
    public function tuteurEnvoiNotification(String $nom_tuteur,String $nom_groupe,Professeur $tuteur,Groupe $groupe,String $type,ObjectManager $manager ){
        $notification=new Notification();
        $notification->setNomProfesseur($nom_tuteur);
        $notification->setNomGroupe($nom_groupe);
        $notification->setSourceProfesseur($tuteur);
        $notification->setDestGroupe($groupe);
        $notification->setType($type);
        $notification->setCreatedAt(new \DateTime());
        
        $manager->persist($notification);
        $manager->flush();
    }


    public function groupeEnvoiNotification(String $nom_etudiant,String $nom_professeur,String $nom_groupe,$etudiant,$professeur,Groupe $groupe,String $type,ObjectManager $manager )
    {
     
    $notification=new Notification();   
    if($etudiant==null){
        $notification->setNomProfesseur($nom_professeur);
        $notification->setDestProfesseur($professeur);
    }else if($professeur==null){
        $notification-> setNomEtudiant($nom_etudiant);
        $notification->setDestEtudiant($etudiant);
    }

    $notification->setSourceGroupe($groupe);
   
    $notification->setNomGroupe($nom_groupe);

    $notification->setType($type);
    $notification->setCreatedAt(new \DateTime());
    $manager->persist($notification);
    $manager->flush();
    }



}