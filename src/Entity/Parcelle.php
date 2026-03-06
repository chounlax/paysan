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
     * @var Collection<int, Epandre>
     */
    #[ORM\OneToMany(targetEntity: Epandre::class, mappedBy: 'noparcelle', orphanRemoval: true)]
    private Collection $epandres;

    public function __construct()
    {
        $this->epandres = new ArrayCollection();
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
     * @return Collection<int, Epandre>
     */
    public function getEpandres(): Collection
    {
        return $this->epandres;
    }

    public function addEpandre(Epandre $epandre): static
    {
        if (!$this->epandres->contains($epandre)) {
            $this->epandres->add($epandre);
            $epandre->setNoparcelle($this);
        }

        return $this;
    }

    public function removeEpandre(Epandre $epandre): static
    {
        if ($this->epandres->removeElement($epandre)) {
            // set the owning side to null (unless already changed)
            if ($epandre->getNoparcelle() === $this) {
                $epandre->setNoparcelle(null);
            }
        }

        return $this;
    }
}
