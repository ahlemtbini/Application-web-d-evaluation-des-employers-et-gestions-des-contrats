<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResponsableRepository::class)
 */
class Responsable
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
    private $GSPRMTRC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $GSPRNOM;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_agence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGSPRMTRC(): ?int
    {
        return $this->GSPRMTRC;
    }

    public function setGSPRMTRC(int $GSPRMTRC): self
    {
        $this->GSPRMTRC = $GSPRMTRC;

        return $this;
    }

    public function getGSPRNOM(): ?string
    {
        return $this->GSPRNOM;
    }

    public function setGSPRNOM(string $GSPRNOM): self
    {
        $this->GSPRNOM = $GSPRNOM;

        return $this;
    }

    public function getCodeAgence(): ?int
    {
        return $this->code_agence;
    }

    public function setCodeAgence(int $code_agence): self
    {
        $this->code_agence = $code_agence;

        return $this;
    }
}
