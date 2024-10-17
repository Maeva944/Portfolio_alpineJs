<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Realisation>
     */
    #[ORM\OneToMany(targetEntity: Realisation::class, mappedBy: 'categorie')]
    private Collection $realisation;

    public function __construct()
    {
        $this->realisation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Realisation>
     */
    public function getRealisation(): Collection
    {
        return $this->realisation;
    }

    public function addRealisation(Realisation $realisation): static
    {
        if (!$this->realisation->contains($realisation)) {
            $this->realisation->add($realisation);
            $realisation->setCategorie($this);
        }

        return $this;
    }

    public function removeRealisation(Realisation $realisation): static
    {
        if ($this->realisation->removeElement($realisation)) {
            // set the owning side to null (unless already changed)
            if ($realisation->getCategorie() === $this) {
                $realisation->setCategorie(null);
            }
        }

        return $this;
    }
}
