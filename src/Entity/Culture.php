<?php

namespace App\Entity;

use App\Repository\CultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultureRepository::class)]
class Culture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateCulture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFin = null;

    #[ORM\Column]
    private ?int $quantiteRecolte = null;

    #[ORM\ManyToOne(inversedBy: 'cultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?parcelle $noparcelle = null;

    #[ORM\ManyToOne(inversedBy: 'cultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?production $production = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCulture(): ?\DateTime
    {
        return $this->dateCulture;
    }

    public function setDateCulture(\DateTime $dateCulture): static
    {
        $this->dateCulture = $dateCulture;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getQuantiteRecolte(): ?int
    {
        return $this->quantiteRecolte;
    }

    public function setQuantiteRecolte(int $quantiteRecolte): static
    {
        $this->quantiteRecolte = $quantiteRecolte;

        return $this;
    }

    public function getNoparcelle(): ?parcelle
    {
        return $this->noparcelle;
    }

    public function setNoparcelle(?parcelle $noparcelle): static
    {
        $this->noparcelle = $noparcelle;

        return $this;
    }

    public function getProduction(): ?production
    {
        return $this->production;
    }

    public function setProduction(?production $production): static
    {
        $this->production = $production;

        return $this;
    }
}
