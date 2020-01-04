<?php
namespace App\Service;


use App\Entity\Professeur;

use App\Repository\ProfesseurRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfesseurConnecte  extends AbstractController
{


    public function getUser_p()
    {
        $manager=$this->getDoctrine()->getENtityManager();
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $repository = $this->getDoctrine()->getRepository(Professeur::class);
        $idapp=$user->getId();

        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM Professeur etu
            WHERE etu.prenom=:prenom and etu.nom=:nom
            ';
        $stmt_invite = $conn->prepare($sql);
        $stmt_invite->execute(['prenom' => $user->getPrenom(),'nom' => $user->getNom()]);
        $etudiants =$stmt_invite->fetchAll();

        $user_p = $repository->find($etudiants[0]['id']);
        return $user_p;
    }
}