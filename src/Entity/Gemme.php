<?php

namespace App\Entity;

use App\Repository\GemmeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GemmeRepository::class)]
class Gemme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Gemme = null;

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

    public function getGemme(): ?string
    {
        return $this->Gemme;
    }

    public function setGemme(string $Gemme): static
    {
        $this->Gemme = $Gemme;

        return $this;
    }
}
