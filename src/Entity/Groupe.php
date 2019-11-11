<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class Groupe
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
    private $sujet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etudiant", mappedBy="groupe")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Professeur", inversedBy="groupes")
     */
    private $professeur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reunion", mappedBy="relation", orphanRemoval=true)
     */
    private $reunions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="source_groupe")
     */
    private $source_groupe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="dest_groupe")
     */
    private $dest_groupe;

    public function __construct()
    {
        $this->etudiant = new ArrayCollection();
        $this->reunions = new ArrayCollection();
        $this->source_groupe = new ArrayCollection();
        $this->dest_groupe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return 1;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function __toString() {
        return (string) $this->id;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant[] = $etudiant;
            $etudiant->setGroupe($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiant->contains($etudiant)) {
            $this->etudiant->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getGroupe() === $this) {
                $etudiant->setGroupe(null);
            }
        }

        return $this;
    }

    public function getProfesseurId(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseurId(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    /**
     * @return Collection|Reunion[]
     */
    public function getReunions(): Collection
    {
        return $this->reunions;
    }

    public function addReunion(Reunion $reunion): self
    {
        if (!$this->reunions->contains($reunion)) {
            $this->reunions[] = $reunion;
            $reunion->setRelation($this);
        }

        return $this;
    }

    public function removeReunion(Reunion $reunion): self
    {
        if ($this->reunions->contains($reunion)) {
            $this->reunions->removeElement($reunion);
            // set the owning side to null (unless already changed)
            if ($reunion->getRelation() === $this) {
                $reunion->setRelation(null);
            }
        }

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

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
    public function getSourceGroupe(): Collection
    {
        return $this->source_groupe;
    }

    public function addSourceGroupe(Notification $sourceGroupe): self
    {
        if (!$this->source_groupe->contains($sourceGroupe)) {
            $this->source_groupe[] = $sourceGroupe;
            $sourceGroupe->setSourceGroupe($this);
        }

        return $this;
    }

    public function removeSourceGroupe(Notification $sourceGroupe): self
    {
        if ($this->source_groupe->contains($sourceGroupe)) {
            $this->source_groupe->removeElement($sourceGroupe);
            // set the owning side to null (unless already changed)
            if ($sourceGroupe->getSourceGroupe() === $this) {
                $sourceGroupe->setSourceGroupe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getDestGroupe(): Collection
    {
        return $this->dest_groupe;
    }

    public function addDestGroupe(Notification $destGroupe): self
    {
        if (!$this->dest_groupe->contains($destGroupe)) {
            $this->dest_groupe[] = $destGroupe;
            $destGroupe->setDestGroupe($this);
        }

        return $this;
    }

    public function removeDestGroupe(Notification $destGroupe): self
    {
        if ($this->dest_groupe->contains($destGroupe)) {
            $this->dest_groupe->removeElement($destGroupe);
            // set the owning side to null (unless already changed)
            if ($destGroupe->getDestGroupe() === $this) {
                $destGroupe->setDestGroupe(null);
            }
        }

        return $this;
    }
}
