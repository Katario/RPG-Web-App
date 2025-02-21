<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait HasStatsTrait
{
    #[ORM\Column(type: 'integer')]
    private int $currentStrength;
    #[ORM\Column(type: 'integer')]
    private int $maxStrength;
    #[ORM\Column(type: 'integer')]
    private int $currentIntelligence;
    #[ORM\Column(type: 'integer')]
    private int $maxIntelligence;
    #[ORM\Column(type: 'integer')]
    private int $currentStamina;
    #[ORM\Column(type: 'integer')]
    private int $maxStamina;
    #[ORM\Column(type: 'integer')]
    private int $currentAgility;
    #[ORM\Column(type: 'integer')]
    private int $maxAgility;
    #[ORM\Column(type: 'integer')]
    private int $currentCharisma;
    #[ORM\Column(type: 'integer')]
    private int $maxCharisma;

    public function getCurrentStrength(): int
    {
        return $this->currentStrength;
    }

    public function setCurrentStrength(int $currentStrength): self
    {
        $this->currentStrength = $currentStrength;
        return $this;
    }

    public function getMaxStrength(): int
    {
        return $this->maxStrength;
    }

    public function setMaxStrength(int $maxStrength): self
    {
        $this->maxStrength = $maxStrength;
        return $this;
    }

    public function getCurrentIntelligence(): int
    {
        return $this->currentIntelligence;
    }

    public function setCurrentIntelligence(int $currentIntelligence): self
    {
        $this->currentIntelligence = $currentIntelligence;
        return $this;
    }

    public function getMaxIntelligence(): int
    {
        return $this->maxIntelligence;
    }

    public function setMaxIntelligence(int $maxIntelligence): self
    {
        $this->maxIntelligence = $maxIntelligence;
        return $this;
    }

    public function getCurrentStamina(): int
    {
        return $this->currentStamina;
    }

    public function setCurrentStamina(int $currentStamina): self
    {
        $this->currentStamina = $currentStamina;
        return $this;
    }

    public function getMaxStamina(): int
    {
        return $this->maxStamina;
    }

    public function setMaxStamina(int $maxStamina): self
    {
        $this->maxStamina = $maxStamina;
        return $this;
    }

    public function getCurrentAgility(): int
    {
        return $this->currentAgility;
    }

    public function setCurrentAgility(int $currentAgility): self
    {
        $this->currentAgility = $currentAgility;
        return $this;
    }

    public function getMaxAgility(): int
    {
        return $this->maxAgility;
    }

    public function setMaxAgility(int $maxAgility): self
    {
        $this->maxAgility = $maxAgility;
        return $this;
    }

    public function getCurrentCharisma(): int
    {
        return $this->currentCharisma;
    }

    public function setCurrentCharisma(int $currentCharisma): self
    {
        $this->currentCharisma = $currentCharisma;
        return $this;
    }

    public function getMaxCharisma(): int
    {
        return $this->maxCharisma;
    }

    public function setMaxCharisma(int $maxCharisma): self
    {
        $this->maxCharisma = $maxCharisma;
        return $this;
    }
}