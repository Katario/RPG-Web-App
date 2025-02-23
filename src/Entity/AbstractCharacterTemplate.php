<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
abstract class AbstractCharacterTemplate extends Encyclopedia
{
    #[ORM\Column(type: 'string')]
    private string $kind;
    #[ORM\Column(type: 'integer')]
    private int $minHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $minManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $minActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $minExhaustPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxExhaustPoints;

    public function getKind(): string
    {
        return $this->kind;
    }

    public function setKind(string $kind): AbstractCharacterTemplate
    {
        $this->kind = $kind;
        return $this;
    }

    public function getMinHealthPoints(): int
    {
        return $this->minHealthPoints;
    }

    public function setMinHealthPoints(int $minHealthPoints): AbstractCharacterTemplate
    {
        $this->minHealthPoints = $minHealthPoints;
        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): AbstractCharacterTemplate
    {
        $this->maxHealthPoints = $maxHealthPoints;
        return $this;
    }

    public function getMinManaPoints(): int
    {
        return $this->minManaPoints;
    }

    public function setMinManaPoints(int $minManaPoints): AbstractCharacterTemplate
    {
        $this->minManaPoints = $minManaPoints;
        return $this;
    }

    public function getMaxManaPoints(): int
    {
        return $this->maxManaPoints;
    }

    public function setMaxManaPoints(int $maxManaPoints): AbstractCharacterTemplate
    {
        $this->maxManaPoints = $maxManaPoints;
        return $this;
    }

    public function getMinActionPoints(): int
    {
        return $this->minActionPoints;
    }

    public function setMinActionPoints(int $minActionPoints): AbstractCharacterTemplate
    {
        $this->minActionPoints = $minActionPoints;
        return $this;
    }

    public function getMaxActionPoints(): int
    {
        return $this->maxActionPoints;
    }

    public function setMaxActionPoints(int $maxActionPoints): AbstractCharacterTemplate
    {
        $this->maxActionPoints = $maxActionPoints;
        return $this;
    }

    public function getMinExhaustPoints(): int
    {
        return $this->minExhaustPoints;
    }

    public function setMinExhaustPoints(int $minExhaustPoints): AbstractCharacterTemplate
    {
        $this->minExhaustPoints = $minExhaustPoints;
        return $this;
    }

    public function getMaxExhaustPoints(): int
    {
        return $this->maxExhaustPoints;
    }

    public function setMaxExhaustPoints(int $maxExhaustPoints): AbstractCharacterTemplate
    {
        $this->maxExhaustPoints = $maxExhaustPoints;
        return $this;
    }
}