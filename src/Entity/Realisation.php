<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisationRepository::class)]
class Realisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 600)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_github = null;

    #[ORM\Column(length: 255)]
    private ?string $techno_use = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'realisation')]
    private ?categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLienGithub(): ?string
    {
        return $this->lien_github;
    }

    public function setLienGithub(string $lien_github): static
    {
        $this->lien_github = $lien_github;

        return $this;
    }

    public function getTechnoUse(): ?string
    {
        return $this->techno_use;
    }

    public function setTechnoUse(string $techno_use): static
    {
        $this->techno_use = $techno_use;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
