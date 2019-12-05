<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_etudiant;
 
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_professeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\etudiant", inversedBy="source_etudiant")
     */
    private $source_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\etudiant", inversedBy="dest_etudiant")
     */
    private $dest_etudiant;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Professeur", inversedBy="source_professeur")
     */
    private $source_professeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Professeur", inversedBy="dest_professeur")
     */
    private $dest_professeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_groupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\groupe", inversedBy="source_groupe")
     */
    private $source_groupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\groupe", inversedBy="dest_groupe")
     */
    private $dest_groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSourceEtudiant(): ?string
    {
        return $this->nom_source_etudiant;
    }

    public function setNomSourceEtudiant(?string $nom_source_etudiant): self
    {
        $this->nom_source_etudiant = $nom_source_etudiant;

        return $this;
    }

    public function getNomDestEtudiant(): ?string
    {
        return $this->nom_dest_etudiant;
    }

    public function setNomDestEtudiant(?string $nom_dest_etudiant): self
    {
        $this->nom_dest_etudiant = $nom_dest_etudiant;

        return $this;
    }

    public function getSourceEtudiant(): ?etudiant
    {
        return $this->source_etudiant;
    }

    public function setSourceEtudiant(?etudiant $source_etudiant): self
    {
        $this->source_etudiant = $source_etudiant;

        return $this;
    }

    public function getDestEtudiant(): ?etudiant
    {
        return $this->dest_etudiant;
    }

    public function setDestEtudiant(?etudiant $dest_etudiant): self
    {
        $this->dest_etudiant = $dest_etudiant;

        return $this;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nom_groupe;
    }

    public function setNomGroupe(?string $nom_groupe): self
    {
        $this->nom_groupe = $nom_groupe;

        return $this;
    }

    public function getSourceGroupe(): ?groupe
    {
        return $this->source_groupe;
    }

    public function setSourceGroupe(?groupe $source_groupe): self
    {
        $this->source_groupe = $source_groupe;

        return $this;
    }

    public function getDestGroupe(): ?groupe
    {
        return $this->dest_groupe;
    }

    public function setDestGroupe(?groupe $dest_groupe): self
    {
        $this->dest_groupe = $dest_groupe;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNomProfesseur(): ?string
    {
        return $this->nom_professeur;
    }

    public function setNomProfesseur(?string $nom_professeur): self
    {
        $this->nom_professeur = $nom_professeur;

        return $this;
    }

    public function getSourceProfesseur(): ?Professeur
    {
        return $this->source_professeur;
    }

    public function setSourceProfesseur(?Professeur $source_professeur): self
    {
        $this->source_professeur = $source_professeur;

        return $this;
    }

    public function getDestProfesseur(): ?Professeur
    {
        return $this->dest_professeur;
    }

    public function setDestProfesseur(?Professeur $dest_professeur): self
    {
        $this->dest_professeur = $dest_professeur;

        return $this;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nom_etudiant;
    }

    public function setNomEtudiant(?string $nom_etudiant): self
    {
        $this->nom_etudiant = $nom_etudiant;

        return $this;
    }
}
