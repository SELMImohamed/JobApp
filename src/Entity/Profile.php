<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameProfile = null;

    #[ORM\Column(length: 255)]
    private ?string $surnameProfile = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $career = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $skillProfile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProfile(): ?string
    {
        return $this->nameProfile;
    }

    public function setNameProfile(string $nameProfile): self
    {
        $this->nameProfile = $nameProfile;

        return $this;
    }

    public function getSurnameProfile(): ?string
    {
        return $this->surnameProfile;
    }

    public function setSurnameProfile(string $surnameProfile): self
    {
        $this->surnameProfile = $surnameProfile;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCareer(): ?string
    {
        return $this->career;
    }

    public function setCareer(string $career): self
    {
        $this->career = $career;

        return $this;
    }

    public function getSkillProfile(): ?string
    {
        return $this->skillProfile;
    }

    public function setSkillProfile(string $skillProfile): self
    {
        $this->skillProfile = $skillProfile;

        return $this;
    }
}
