<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
<<<<<<< HEAD
     * @var Collection<int, Elementschimiques>
     */
    #[ORM\OneToMany(targetEntity: Elementschimiques::class, mappedBy: 'unite')]
    private Collection $elementschimiques;

    /**
     * @var Collection<int, Elementschimiques>
     */
    #[ORM\OneToMany(targetEntity: Elementschimiques::class, mappedBy: 'unite', orphanRemoval: true)]
    private Collection $elementchimique;

    public function __construct()
    {
        $this->elementschimiques = new ArrayCollection();
        $this->elementchimique = new ArrayCollection();
=======
     * @var Collection<int, Engrais>
     */
    #[ORM\OneToMany(targetEntity: Engrais::class, mappedBy: 'unite', orphanRemoval: true)]
    private Collection $engrais;

    public function __construct()
    {
        $this->engrais = new ArrayCollection();
>>>>>>> 82465f98a1fb2efbc744f9118b8b13d49e0a0d40
    }


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

    /**
<<<<<<< HEAD
     * @return Collection<int, Elementschimiques>
     */
    public function getElementschimiques(): Collection
    {
        return $this->elementschimiques;
    }

    public function addElementschimique(Elementschimiques $elementschimique): static
    {
        if (!$this->elementschimiques->contains($elementschimique)) {
            $this->elementschimiques->add($elementschimique);
            $elementschimique->setUnite($this);
=======
     * @return Collection<int, Engrais>
     */
    public function getEngrais(): Collection
    {
        return $this->engrais;
    }

    public function addEngrai(Engrais $engrai): static
    {
        if (!$this->engrais->contains($engrai)) {
            $this->engrais->add($engrai);
            $engrai->setUnite($this);
>>>>>>> 82465f98a1fb2efbc744f9118b8b13d49e0a0d40
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeElementschimique(Elementschimiques $elementschimique): static
    {
        if ($this->elementschimiques->removeElement($elementschimique)) {
            // set the owning side to null (unless already changed)
            if ($elementschimique->getUnite() === $this) {
                $elementschimique->setUnite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Elementschimiques>
     */
    public function getElementchimique(): Collection
    {
        return $this->elementchimique;
    }

    public function addElementchimique(Elementschimiques $elementchimique): static
    {
        if (!$this->elementchimique->contains($elementchimique)) {
            $this->elementchimique->add($elementchimique);
            $elementchimique->setUnite($this);
        }

        return $this;
    }

    public function removeElementchimique(Elementschimiques $elementchimique): static
    {
        if ($this->elementchimique->removeElement($elementchimique)) {
            // set the owning side to null (unless already changed)
            if ($elementchimique->getUnite() === $this) {
                $elementchimique->setUnite(null);
=======
    public function removeEngrai(Engrais $engrai): static
    {
        if ($this->engrais->removeElement($engrai)) {
            // set the owning side to null (unless already changed)
            if ($engrai->getUnite() === $this) {
                $engrai->setUnite(null);
>>>>>>> 82465f98a1fb2efbc744f9118b8b13d49e0a0d40
            }
        }

        return $this;
    }
}
