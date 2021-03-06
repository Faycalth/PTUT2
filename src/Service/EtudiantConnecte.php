<?php
namespace App\Service;


use App\Entity\Etudiant;

use App\Repository\EtudiantRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EtudiantConnecte  extends AbstractController
{


    public function getUser()
    {
        $manager=$this->getDoctrine()->getENtityManager();
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $idapp=$user->getId();

        $conn =$manager->getConnection();

        $sql = '
            SELECT * FROM etudiant etu
            WHERE etu.prenom=:prenom and etu.nom=:nom
            ';
        $stmt_invite = $conn->prepare($sql);
        $stmt_invite->execute(['prenom' => $user->getPrenom(),'nom' => $user->getNom()]);
        $etudiants =$stmt_invite->fetchAll();

        $user = $repository->find($etudiants[0]['id']);
        return $user;
    }
}