<?php

namespace App\Entity;

use App\Repository\CddRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CddRepository::class)
 */
class Cdd
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=4,unique=true)
     */
    private $MTR;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $NOM_PRENOM;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CIN;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $GRADE;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $AGENCE;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FONC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DATE_REC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DATE_NAIS;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DATE_FIN_DE_CONTRAT;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $session;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numsession;

    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="cdd")
     */
    private $Contrat;

    public function __construct()
    {
        $this->Contrat = new ArrayCollection();
    }

    
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMTR(): ?int
    {
        return $this->MTR;
    }

    public function setMTR(?int $MTR): self
    {
        $this->MTR = $MTR;

        return $this;
    }

    public function getNOMPRENOM(): ?string
    {
        return $this->NOM_PRENOM;
    }

    public function setNOMPRENOM(?string $NOM_PRENOM): self
    {
        $this->NOM_PRENOM = $NOM_PRENOM;

        return $this;
    }

    public function getCIN(): ?int
    {
        return $this->CIN;
    }

    public function setCIN(?int $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getGRADE(): ?string
    {
        return $this->GRADE;
    }

    public function setGRADE(?string $GRADE): self
    {
        $this->GRADE = $GRADE;

        return $this;
    }

    public function getAGENCE(): ?int
    {
        return $this->AGENCE;
    }

    public function setAGENCE(?int $AGENCE): self
    {
        $this->AGENCE = $AGENCE;

        return $this;
    }

    public function getFONC(): ?int
    {
        return $this->FONC;
    }

    public function setFONC(?int $FONC): self
    {
        $this->FONC = $FONC;

        return $this;
    }

    public function getDATEREC(): ?int
    {
        return $this->DATE_REC;
    }

    public function setDATEREC(?int $DATE_REC): self
    {
        $this->DATE_REC = $DATE_REC;

        return $this;
    }

    public function getDATENAIS(): ?int
    {
        return $this->DATE_NAIS;
    }

    public function setDATENAIS(?int $DATE_NAIS): self
    {
        $this->DATE_NAIS = $DATE_NAIS;

        return $this;
    }

    public function getDATEFINDECONTRAT(): ?int
    {
        return $this->DATE_FIN_DE_CONTRAT;
    }

    public function setDATEFINDECONTRAT(?int $DATE_FIN_DE_CONTRAT): self
    {
        $this->DATE_FIN_DE_CONTRAT = $DATE_FIN_DE_CONTRAT;

        return $this;
    }

    public function getSession(): ?bool
    {
        return $this->session;
    }

    public function setSession(?bool $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getNumsession(): ?int
    {
        return $this->numsession;
    }

    public function setNumsession(?int $numsession): self
    {
       $numsession=$this->getNumsession();
        $this->numsession = $numsession+1;

        return $this;
    }

    /**
     * @return Collection|Contrat[]
     */
    public function getContrat(): Collection
    {
        return $this->Contrat;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->Contrat->contains($contrat)) {
            $this->Contrat[] = $contrat;
            $contrat->setCdd($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->Contrat->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getCdd() === $this) {
                $contrat->setCdd(null);
            }
        }

        return $this;
    }

    

    
}
