<?php

namespace App\Entity;

use App\Repository\LigneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneRepository::class)
 */
class Ligne
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
    private $Position;

    /**
     * @ORM\ManyToOne(targetEntity=Rapport::class, inversedBy="lignes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rapport;

    /**
     * @ORM\OneToOne(targetEntity=RapportCle::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $RapportCle;

    /**
     * @ORM\OneToOne(targetEntity=RapportValue::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $RapportValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->Position;
    }

    public function setPosition(int $Position): self
    {
        $this->Position = $Position;

        return $this;
    }

    public function getRapport(): ?Rapport
    {
        return $this->rapport;
    }

    public function setRapport(?Rapport $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getRapportCle(): ?RapportCle
    {
        return $this->RapportCle;
    }

    public function setRapportCle(RapportCle $RapportCle): self
    {
        $this->RapportCle = $RapportCle;

        return $this;
    }

    public function getRapportValue(): ?RapportValue
    {
        return $this->RapportValue;
    }

    public function setRapportValue(RapportValue $RapportValue): self
    {
        $this->RapportValue = $RapportValue;

        return $this;
    }
}
