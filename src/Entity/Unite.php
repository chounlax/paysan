<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteRepository::class)]
class Unite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $unite = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?float
    {
        return $this->unite;
    }

    public function setUnite(?float $unite): static
    {
        $this->unite = $unite;

        return $this;
    }
}
