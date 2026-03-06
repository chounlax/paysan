<?php

namespace App\Entity;

use App\Repository\ParcelleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcelleRepository::class)]
class Parcelle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column(length: 255)]
    private ?string $nomparcelle = null;

    #[ORM\Column]
    private ?int $coordonnees = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNomparcelle(): ?string
    {
        return $this->nomparcelle;
    }

    public function setNomparcelle(string $nomparcelle): static
    {
        $this->nomparcelle = $nomparcelle;

        return $this;
    }

    public function getCoordonnees(): ?int
    {
        return $this->coordonnees;
    }

    public function setCoordonnees(int $coordonnees): static
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }
}
