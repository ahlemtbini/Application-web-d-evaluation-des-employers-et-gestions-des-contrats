<?php

namespace App\Entity;

use App\Repository\RealisationCddRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealisationCddRepository::class)
 */
class RealisationCdd
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idObjectif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $realisation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valider;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObjectif(): ?int
    {
        return $this->idObjectif;
    }

    public function setIdObjectif(int $idObjectif): self
    {
        $this->idObjectif = $idObjectif;

        return $this;
    }

    public function getRealisation(): ?string
    {
        return $this->realisation;
    }

    public function setRealisation(?string $realisation): self
    {
        $this->realisation = $realisation;

        return $this;
    }

    public function getValider(): ?int
    {
        return $this->valider;
    }

    public function setValider(?int $valider): self
    {
        $this->valider = $valider;

        return $this;
    }
}
