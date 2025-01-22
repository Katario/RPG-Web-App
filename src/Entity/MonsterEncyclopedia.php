<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonsterEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterEncyclopediaRepository::class)]
class MonsterEncyclopedia extends Encyclopedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $type;
    #[ORM\Column(type: 'integer')]
    private int $strengthMin;
    #[ORM\Column(type: 'integer')]
    private int $strengthMax;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMin;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMax;
    #[ORM\Column(type: 'integer')]
    private int $staminaMin;
    #[ORM\Column(type: 'integer')]
    private int $staminaMax;
    #[ORM\Column(type: 'integer')]
    private int $agilityMin;
    #[ORM\Column(type: 'integer')]
    private int $agilityMax;
    #[ORM\Column(type: 'integer')]
    private int $charismaMin;
    #[ORM\Column(type: 'integer')]
    private int $charismaMax;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): MonsterEncyclopedia
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): MonsterEncyclopedia
    {
        $this->type = $type;
        return $this;
    }

    public function getStrengthMin(): int
    {
        return $this->strengthMin;
    }

    public function setStrengthMin(int $strengthMin): MonsterEncyclopedia
    {
        $this->strengthMin = $strengthMin;
        return $this;
    }

    public function getStrengthMax(): int
    {
        return $this->strengthMax;
    }

    public function setStrengthMax(int $strengthMax): MonsterEncyclopedia
    {
        $this->strengthMax = $strengthMax;
        return $this;
    }

    public function getIntelligenceMin(): int
    {
        return $this->intelligenceMin;
    }

    public function setIntelligenceMin(int $intelligenceMin): MonsterEncyclopedia
    {
        $this->intelligenceMin = $intelligenceMin;
        return $this;
    }

    public function getIntelligenceMax(): int
    {
        return $this->intelligenceMax;
    }

    public function setIntelligenceMax(int $intelligenceMax): MonsterEncyclopedia
    {
        $this->intelligenceMax = $intelligenceMax;
        return $this;
    }

    public function getStaminaMin(): int
    {
        return $this->staminaMin;
    }

    public function setStaminaMin(int $staminaMin): MonsterEncyclopedia
    {
        $this->staminaMin = $staminaMin;
        return $this;
    }

    public function getStaminaMax(): int
    {
        return $this->staminaMax;
    }

    public function setStaminaMax(int $staminaMax): MonsterEncyclopedia
    {
        $this->staminaMax = $staminaMax;
        return $this;
    }

    public function getAgilityMin(): int
    {
        return $this->agilityMin;
    }

    public function setAgilityMin(int $agilityMin): MonsterEncyclopedia
    {
        $this->agilityMin = $agilityMin;
        return $this;
    }

    public function getAgilityMax(): int
    {
        return $this->agilityMax;
    }

    public function setAgilityMax(int $agilityMax): MonsterEncyclopedia
    {
        $this->agilityMax = $agilityMax;
        return $this;
    }

    public function getCharismaMin(): int
    {
        return $this->charismaMin;
    }

    public function setCharismaMin(int $charismaMin): MonsterEncyclopedia
    {
        $this->charismaMin = $charismaMin;
        return $this;
    }

    public function getCharismaMax(): int
    {
        return $this->charismaMax;
    }

    public function setCharismaMax(int $charismaMax): MonsterEncyclopedia
    {
        $this->charismaMax = $charismaMax;
        return $this;
    }
}