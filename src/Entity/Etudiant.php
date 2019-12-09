<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudiantRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message="L'email que vous avez indiqué est déjà utilisé")
 */
class Etudiant implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe", inversedBy="etudiant")
     */
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="source_etudiant")
     */
    private $source_etudiant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="dest_etudiant")
     */
    private $dest_etudiant;

    public function __construct()
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->password=$password;
        $this->groupe=$groupe;
        $this->source_etudiant = new ArrayCollection();
        $this->dest_etudiant = new ArrayCollection();
    }

    public function getUsername(){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setnom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->nom = $prenom;

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

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function eraseCredentials(){}

    public function getSalt(){}

    public function getRoles(){
            return ['ROLE_ETUDIANT'];
    }

    /**
     * @return Collection|Notification[]
     */
    public function getSourceEtudiant(): Collection
    {
        return $this->source_etudiant;
    }

    public function addSourceEtudiant(Notification $sourceEtudiant): self
    {
        if (!$this->source_etudiant->contains($sourceEtudiant)) {
            $this->source_etudiant[] = $sourceEtudiant;
            $sourceEtudiant->setSourceEtudiant($this);
        }

        return $this;
    }

    public function removeSourceEtudiant(Notification $sourceEtudiant): self
    {
        if ($this->source_etudiant->contains($sourceEtudiant)) {
            $this->source_etudiant->removeElement($sourceEtudiant);
            // set the owning side to null (unless already changed)
            if ($sourceEtudiant->getSourceEtudiant() === $this) {
                $sourceEtudiant->setSourceEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getDestEtudiant(): Collection
    {
        return $this->dest_etudiant;
    }

    public function addDestEtudiant(Notification $destEtudiant): self
    {
        if (!$this->dest_etudiant->contains($destEtudiant)) {
            $this->dest_etudiant[] = $destEtudiant;
            $destEtudiant->setDestEtudiant($this);
        }

        return $this;
    }

    public function removeDestEtudiant(Notification $destEtudiant): self
    {
        if ($this->dest_etudiant->contains($destEtudiant)) {
            $this->dest_etudiant->removeElement($destEtudiant);
            // set the owning side to null (unless already changed)
            if ($destEtudiant->getDestEtudiant() === $this) {
                $destEtudiant->setDestEtudiant(null);
            }
        }

        return $this;
    }
}
