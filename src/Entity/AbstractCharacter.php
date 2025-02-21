<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractCharacter
{
    #[ORM\Column(type: 'string')]
    private string $kind;
    #[ORM\Column(type: 'integer')]
    private string $level;
    #[ORM\Column(type: 'integer')]
    private int $currentHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentExhaustPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxExhaustPoints;

    public function getKind(): string
    {
        return $this->kind;
    }

    public function setKind(string $kind): AbstractCharacter
    {
        $this->kind = $kind;
        return $this;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): AbstractCharacter
    {
        $this->level = $level;
        return $this;
    }

    public function getCurrentHealthPoints(): int
    {
        return $this->currentHealthPoints;
    }

    public function setCurrentHealthPoints(int $currentHealthPoints): AbstractCharacter
    {
        $this->currentHealthPoints = $currentHealthPoints;
        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): AbstractCharacter
    {
        $this->maxHealthPoints = $maxHealthPoints;
        return $this;
    }

    public function getCurrentManaPoints(): int
    {
        return $this->currentManaPoints;
    }

    public function setCurrentManaPoints(int $currentManaPoints): AbstractCharacter
    {
        $this->currentManaPoints = $currentManaPoints;
        return $this;
    }

    public function getMaxManaPoints(): int
    {
        return $this->maxManaPoints;
    }

    public function setMaxManaPoints(int $maxManaPoints): AbstractCharacter
    {
        $this->maxManaPoints = $maxManaPoints;
        return $this;
    }

    public function getCurrentActionPoints(): int
    {
        return $this->currentActionPoints;
    }

    public function setCurrentActionPoints(int $currentActionPoints): AbstractCharacter
    {
        $this->currentActionPoints = $currentActionPoints;
        return $this;
    }

    public function getMaxActionPoints(): int
    {
        return $this->maxActionPoints;
    }

    public function setMaxActionPoints(int $maxActionPoints): AbstractCharacter
    {
        $this->maxActionPoints = $maxActionPoints;
        return $this;
    }

    public function getCurrentExhaustPoints(): int
    {
        return $this->currentExhaustPoints;
    }

    public function setCurrentExhaustPoints(int $currentExhaustPoints): AbstractCharacter
    {
        $this->currentExhaustPoints = $currentExhaustPoints;
        return $this;
    }

    public function getMaxExhaustPoints(): int
    {
        return $this->maxExhaustPoints;
    }

    public function setMaxExhaustPoints(int $maxExhaustPoints): AbstractCharacter
    {
        $this->maxExhaustPoints = $maxExhaustPoints;
        return $this;
    }
}