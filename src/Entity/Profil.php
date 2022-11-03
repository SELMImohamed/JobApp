<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomProfil = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comp�etences = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProfil(): ?string
    {
        return $this->nomProfil;
    }

    public function setNomProfil(string $nomProfil): self
    {
        $this->nomProfil = $nomProfil;

        return $this;
    }

    public function getComp�etences(): ?string
    {
        return $this->comp�etences;
    }

    public function setComp�etences(string $comp�etences): self
    {
        $this->comp�etences = $comp�etences;

        return $this;
    }
}
