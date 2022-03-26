<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
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
     * @ORM\Column(type="string", length=40)
     */
    private $NOM_PRENOM;

    /**
     * @ORM\Column(type="integer")
     */
    private $CIN;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $GRADE;

    /**
     * @ORM\Column(type="integer")
     */
    private $AGENCE;

    /**
     * @ORM\Column(type="integer")
     */
    private $FONC;

    /**
     * @ORM\Column(type="integer")
     */
    private $DATE_NAIS;

    /**
     * @ORM\Column(type="integer")
     */
    private $numsession;

    /**
     * @ORM\ManyToOne(targetEntity=Cdd::class, inversedBy="Contrat")
     */
    private $cdd;

   /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $Duree;

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

    public function getNOMPRENOM(): ?string
    {
        return $this->NOM_PRENOM;
    }

    public function setNOMPRENOM(string $NOM_PRENOM): self
    {
        $this->NOM_PRENOM = $NOM_PRENOM;

        return $this;
    }

    public function getCIN(): ?int
    {
        return $this->CIN;
    }

    public function setCIN(int $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getGRADE(): ?string
    {
        return $this->GRADE;
    }

    public function setGRADE(string $GRADE): self
    {
        $this->GRADE = $GRADE;

        return $this;
    }

    public function getAGENCE(): ?int
    {
        return $this->AGENCE;
    }

    public function setAGENCE(int $AGENCE): self
    {
        $this->AGENCE = $AGENCE;

        return $this;
    }

    public function getFONC(): ?int
    {
        return $this->FONC;
    }

    public function setFONC(int $FONC): self
    {
        $this->FONC = $FONC;

        return $this;
    }

    public function getDATENAIS(): ?int
    {
        return $this->DATE_NAIS;
    }

    public function setDATENAIS(int $DATE_NAIS): self
    {
        $this->DATE_NAIS = $DATE_NAIS;

        return $this;
    }

    public function getNumsession(): ?int
    {
        return $this->numsession;
    }

    public function setNumsession(int $numsession): self
    {
        $this->numsession = $numsession;

        return $this;
    }

    public function getCdd(): ?Cdd
    {
        return $this->cdd;
    }

    public function setCdd(?Cdd $cdd): self
    {
        $this->cdd = $cdd;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->Duree;
    }

    public function setDuree(?string $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }
}
