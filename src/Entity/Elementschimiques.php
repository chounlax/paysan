<?php

namespace App\Entity;

use App\Repository\ElementschimiquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Posseder>
     */
    #[ORM\OneToMany(targetEntity: Posseder::class, mappedBy: 'codeelement', orphanRemoval: true)]
    private Collection $posseders;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Posseder>
     */
    public function getPosseders(): Collection
    {
        return $this->posseders;
    }

    public function addPosseder(Posseder $posseder): static
    {
        if (!$this->posseders->contains($posseder)) {
            $this->posseders->add($posseder);
            $posseder->setCodeelement($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): static
    {
        if ($this->posseders->removeElement($posseder)) {
            // set the owning side to null (unless already changed)
            if ($posseder->getCodeelement() === $this) {
                $posseder->setCodeelement(null);
            }
        }

        return $this;
    }

    
}
