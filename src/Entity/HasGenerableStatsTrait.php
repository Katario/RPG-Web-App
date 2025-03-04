<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait HasGenerableStatsTrait
{
    #[ORM\Column(type: 'integer')]
    private int $minStrength;
    #[ORM\Column(type: 'integer')]
    private int $maxStrength;
    #[ORM\Column(type: 'integer')]
    private int $minIntelligence;
    #[ORM\Column(type: 'integer')]
    private int $maxIntelligence;
    #[ORM\Column(type: 'integer')]
    private int $minStamina;
    #[ORM\Column(type: 'integer')]
    private int $maxStamina;
    #[ORM\Column(type: 'integer')]
    private int $minAgility;
    #[ORM\Column(type: 'integer')]
    private int $maxAgility;
    #[ORM\Column(type: 'integer')]
    private int $minCharisma;
    #[ORM\Column(type: 'integer')]
    private int $maxCharisma;

    public function getMinStrength(): int
    {
        return $this->minStrength;
    }

    public function setMinStrength(int $minStrength): self
    {
        $this->minStrength = $minStrength;

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

    public function getMinIntelligence(): int
    {
        return $this->minIntelligence;
    }

    public function setMinIntelligence(int $minIntelligence): self
    {
        $this->minIntelligence = $minIntelligence;

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

    public function getMinStamina(): int
    {
        return $this->minStamina;
    }

    public function setMinStamina(int $minStamina): self
    {
        $this->minStamina = $minStamina;

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

    public function getMinAgility(): int
    {
        return $this->minAgility;
    }

    public function setMinAgility(int $minAgility): self
    {
        $this->minAgility = $minAgility;

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

    public function getMinCharisma(): int
    {
        return $this->minCharisma;
    }

    public function setMinCharisma(int $minCharisma): self
    {
        $this->minCharisma = $minCharisma;

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
