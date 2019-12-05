<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesseurRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message="L'email que vous avez indiqué est déjà utilisé")
 */
class Professeur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @var string $prenom
    *
    * @ORM\Column(name="prenom", type="string", length=255)
    */
    private $prenom;

    /**
    * @var string $nom
    *
    * @ORM\Column(name="nom", type="string", length=255)
    */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Le mot de passe contient moins de 8 caractères")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Groupe", mappedBy="professeur")
     */
    private $groupes;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="source_professeur")
     */
    private $source_professeur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="dest_professeur")
     */
    private $dest_professeur;








    public function __construct()
    {
        $this->groupes = new ArrayCollection();
        $this->source_professeur = new ArrayCollection();
        $this->dest_professeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setProfesseur($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->contains($groupe)) {
            $this->groupes->removeElement($groupe);
            // set the owning side to null (unless already changed)
            if ($groupe->getProfesseur() === $this) {
                $groupe->setProfesseur(null);
            }
        }

        return $this;
    }

    public function eraseCredentials(){}

    public function getSalt(){}
    
    public function getRoles(){
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    function addRole($role) {
        $this->roles[] = $role;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getSourceProfesseur(): Collection
    {
        return $this->source_professeur;
    }

    public function addSourceProfesseur(Notification $sourceProfesseur): self
    {
        if (!$this->source_professeur->contains($sourceProfesseur)) {
            $this->source_professeur[] = $sourceProfesseur;
            $sourceProfesseur->setSourceProfesseur($this);
        }

        return $this;
    }

    public function removeSourceProfesseur(Notification $sourceProfesseur): self
    {
        if ($this->source_professeur->contains($sourceProfesseur)) {
            $this->source_professeur->removeElement($sourceProfesseur);
            // set the owning side to null (unless already changed)
            if ($sourceProfesseur->getSourceProfesseur() === $this) {
                $sourceProfesseur->setSourceProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getDestProfesseur(): Collection
    {
        return $this->dest_professeur;
    }

    public function addDestProfesseur(Notification $destProfesseur): self
    {
        if (!$this->dest_professeur->contains($destProfesseur)) {
            $this->dest_professeur[] = $destProfesseur;
            $destProfesseur->setDestProfesseur($this);
        }

        return $this;
    }

    public function removeDestProfesseur(Notification $destProfesseur): self
    {
        if ($this->dest_professeur->contains($destProfesseur)) {
            $this->dest_professeur->removeElement($destProfesseur);
            // set the owning side to null (unless already changed)
            if ($destProfesseur->getDestProfesseur() === $this) {
                $destProfesseur->setDestProfesseur(null);
            }
        }

        return $this;
    }

}
