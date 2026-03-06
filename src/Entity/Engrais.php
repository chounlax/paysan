<?php

namespace App\Entity;

use App\Repository\EngraisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EngraisRepository::class)]
class Engrais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomengrais = null;

    #[ORM\ManyToOne(inversedBy: 'engrais')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $unite = null;

    /**
     * @var Collection<int, Epandre>
     */
    #[ORM\OneToMany(targetEntity: Epandre::class, mappedBy: 'idengrais', orphanRemoval: true)]
    private Collection $epandres;

    public function __construct()
    {
        $this->epandres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomengrais(): ?string
    {
        return $this->nomengrais;
    }

    public function setNomengrais(string $nomengrais): static
    {
        $this->nomengrais = $nomengrais;

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
            $epandre->setIdengrais($this);
        }

        return $this;
    }

    public function removeEpandre(Epandre $epandre): static
    {
        if ($this->epandres->removeElement($epandre)) {
            // set the owning side to null (unless already changed)
            if ($epandre->getIdengrais() === $this) {
                $epandre->setIdengrais(null);
            }
        }

        return $this;
    }
}
