<?php

namespace App\Entity;

use App\Repository\CriteresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CriteresRepository::class)
 */
class Criteres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MTR;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numsession;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_critere;

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

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

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

    public function getResponsable(): ?int
    {
        return $this->responsable;
    }

    public function setResponsable(?int $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getIdCritere(): ?int
    {
        return $this->id_critere;
    }

    public function setIdCritere(?int $id_critere): self
    {
        $this->id_critere = $id_critere;

        return $this;
    }
    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }
}
