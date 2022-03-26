<?php

namespace App\Entity;

use App\Repository\SessionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionsRepository::class)
 */
class Sessions
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numsession;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $rates = [];

   

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $responsable;

   
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

    public function getNumsession(): ?int
    {
        return $this->numsession;
    }

    public function setNumsession(?int $numsession): self
    {
        $this->numsession = $numsession;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getRates(): ?array
    {
        return $this->rates;
    }

    public function setRates(?array $rates): self
    {
        $this->rates = $rates;

        return $this;
    }

   
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

   
}
