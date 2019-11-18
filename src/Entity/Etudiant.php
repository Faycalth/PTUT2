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
class Etudiant extends User implements UserInterface
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $roles;
    /**
     * @var string Le mot de passe crypté
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomComplet;
    /**
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;
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
        $this->source_etudiant = new ArrayCollection();
        $this->dest_etudiant = new ArrayCollection();
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
