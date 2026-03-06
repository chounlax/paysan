<?php

namespace App\Entity;

use App\Repository\PossederRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PossederRepository::class)]
class Posseder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'posseders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?elementschimiques $codeelement = null;

    #[ORM\ManyToOne(inversedBy: 'posseders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?engrais $idengrais = null;

    #[ORM\Column]
    private ?float $valeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeelement(): ?elementschimiques
    {
        return $this->codeelement;
    }

    public function setCodeelement(?elementschimiques $codeelement): static
    {
        $this->codeelement = $codeelement;

        return $this;
    }

    public function getIdengrais(): ?engrais
    {
        return $this->idengrais;
    }

    public function setIdengrais(?engrais $idengrais): static
    {
        $this->idengrais = $idengrais;

        return $this;
    }

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }
}
