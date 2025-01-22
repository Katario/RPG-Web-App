<?php

namespace App\Entity;

use App\Repository\ArmamentEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmamentEncyclopediaRepository::class)]
class ArmamentEncyclopedia extends Encyclopedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $type;
    #[ORM\Column(type: 'integer')]
    private string $valueMin;
    #[ORM\Column(type: 'integer')]
    private string $valueMax;
    #[ORM\Column(type: 'integer')]
    private string $durabilityMin;
    #[ORM\Column(type: 'integer')]
    private string $durabilityMax;
    #[ORM\Column(type: 'text')]
    private string $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ArmamentEncyclopedia
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ArmamentEncyclopedia
    {
        $this->type = $type;
        return $this;
    }

    public function getValueMin(): string
    {
        return $this->valueMin;
    }

    public function setValueMin(string $valueMin): ArmamentEncyclopedia
    {
        $this->valueMin = $valueMin;
        return $this;
    }

    public function getValueMax(): string
    {
        return $this->valueMax;
    }

    public function setValueMax(string $valueMax): ArmamentEncyclopedia
    {
        $this->valueMax = $valueMax;
        return $this;
    }

    public function getDurabilityMin(): string
    {
        return $this->durabilityMin;
    }

    public function setDurabilityMin(string $durabilityMin): ArmamentEncyclopedia
    {
        $this->durabilityMin = $durabilityMin;
        return $this;
    }

    public function getDurabilityMax(): string
    {
        return $this->durabilityMax;
    }

    public function setDurabilityMax(string $durabilityMax): ArmamentEncyclopedia
    {
        $this->durabilityMax = $durabilityMax;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ArmamentEncyclopedia
    {
        $this->description = $description;
        return $this;
    }
}
