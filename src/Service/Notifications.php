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
        $notification->setNomSourceEtudiant($nom_etudiant);
        $notification->setNomGroupe($nom_groupe);
        $notification->setSourceEtudiant($etudiant);
        $notification->setDestGroupe($groupe);
        $notification->setType($type);
        $notification->setCreatedAt(new \DateTime());
        
        $manager->persist($notification);
        $manager->flush();

    }


    public function groupeEnvoiNotification(String $nom_etudiant,String $nom_groupe,Etudiant $etudiant,Groupe $groupe,String $type,ObjectManager $manager )
    {
     
    $notification=new Notification();   
    $notification->setSourceGroupe($groupe);
    $notification->setNomDestEtudiant($nom_etudiant);
    $notification->setNomGroupe($nom_groupe);
    $notification->setDestEtudiant($etudiant);
    $notification->setType($type);
    $notification->setCreatedAt(new \DateTime());
    $manager->persist($notification);
    $manager->flush();
    }



}