<?php

namespace App\Entity;

use App\Repository\EpandreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpandreRepository::class)]

class Epandre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'epandres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Engrais $idengrais = null;

    #[ORM\ManyToOne(inversedBy: 'epandres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parcelle $noparcelle = null;

    #[ORM\ManyToOne(inversedBy: 'epandres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Date $date = null;

    #[ORM\Column]
    private ?int $qteepandre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdengrais(): ?Engrais
    {
        return $this->idengrais;
    }

    public function setIdengrais(?Engrais $idengrais): static
    {
        $this->idengrais = $idengrais;

        return $this;
    }

    public function getNoparcelle(): ?Parcelle
    {
        return $this->noparcelle;
    }

    public function setNoparcelle(?Parcelle $noparcelle): static
    {
        $this->noparcelle = $noparcelle;

        return $this;
    }

    public function getDate(): ?Date
    {
        return $this->date;
    }

    public function setDate(?Date $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getQteepandre(): ?int
    {
        return $this->qteepandre;
    }

    public function setQteepandre(int $qteepandre): static
    {
        $this->qteepandre = $qteepandre;

        return $this;
    }
}
