<?php

namespace App\Entity;

use App\Repository\ElementschimiquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementschimiquesRepository::class)]
class Elementschimiques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleelement = null;

    #[ORM\ManyToOne(inversedBy: 'elementchimique')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $unite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleelement(): ?string
    {
        return $this->libelleelement;
    }

    public function setLibelleelement(string $libelleelement): static
    {
        $this->libelleelement = $libelleelement;

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->unite;
    }

    public function setUnite(?Unite $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    
}
