<?php

namespace App\Entity;

use App\Repository\ParcelleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Culture>
     */
    #[ORM\OneToMany(targetEntity: Culture::class, mappedBy: 'noparcelle', orphanRemoval: true)]
    private Collection $cultures;

    public function __construct()
    {
        $this->cultures = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Culture>
     */
    public function getCultures(): Collection
    {
        return $this->cultures;
    }

    public function addCulture(Culture $culture): static
    {
        if (!$this->cultures->contains($culture)) {
            $this->cultures->add($culture);
            $culture->setNoparcelle($this);
        }

        return $this;
    }

    public function removeCulture(Culture $culture): static
    {
        if ($this->cultures->removeElement($culture)) {
            // set the owning side to null (unless already changed)
            if ($culture->getNoparcelle() === $this) {
                $culture->setNoparcelle(null);
            }
        }

        return $this;
    }
}
