<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 */
class Tache
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numGroupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomTache;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descTache;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tacheRealisee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreSousTaches;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumGroupe(): ?int
    {
        return $this->numGroupe;
    }

    public function setNumGroupe(?int $numGroupe): self
    {
        $this->numGroupe = $numGroupe;

        return $this;
    }

    public function getNomTache(): ?string
    {
        return $this->nomTache;
    }

    public function setNomTache(string $nomTache): self
    {
        $this->nomTache = $nomTache;

        return $this;
    }

    public function getDescTache(): ?string
    {
        return $this->descTache;
    }

    public function setDescTache(?string $descTache): self
    {
        $this->descTache = $descTache;

        return $this;
    }

    public function getTacheRealisee(): ?bool
    {
        return $this->tacheRealisee;
    }

    public function setTacheRealisee(bool $tacheRealisee): self
    {
        $this->tacheRealisee = $tacheRealisee;

        return $this;
    }

    public function getNombreSousTaches(): ?int
    {
        return $this->nombreSousTaches;
    }

    public function setNombreSousTaches(?int $nombreSousTaches): self
    {
        $this->nombreSousTaches = $nombreSousTaches;

        return $this;
    }
}
