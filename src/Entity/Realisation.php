<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealisationRepository::class)
 */
class Realisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $criteres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poste;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivites(): ?string
    {
        return $this->activites;
    }

    public function setActivites(?string $activites): self
    {
        $this->activites = $activites;

        return $this;
    }

    public function getCriteres(): ?string
    {
        return $this->criteres;
    }

    public function setCriteres(?string $criteres): self
    {
        $this->criteres = $criteres;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

   
}
