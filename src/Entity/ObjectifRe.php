<?php

namespace App\Entity;

use App\Repository\ObjectifReRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectifReRepository::class)
 */
class ObjectifRe
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
    private $MTR;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $objectif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_realisation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numsession;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMTR(): ?int
    {
        return $this->MTR;
    }

    public function setMTR(int $MTR): self
    {
        $this->MTR = $MTR;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getNbRealisation(): ?int
    {
        return $this->nb_realisation;
    }

    public function setNbRealisation(?int $nb_realisation): self
    {
        $this->nb_realisation = $nb_realisation;

        return $this;
    }
    public function setNbRealisation1(?int $nb_realisation): self
    {
       $nb_realisation=$this->getNbRealisation();
        $this->nb_realisation = $nb_realisation-1;

        return $this;
    }

    public function getNumsession(): ?int
    {
        return $this->numsession;
    }

    public function setNumsession(?int $numsession): self
    {
        $this->numsession = $numsession;

        return $this;
    }

 
}
