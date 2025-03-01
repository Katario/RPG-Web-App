<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait HasStatsTrait
{
    #[ORM\Column(type: 'integer')]
    private int $strength;
    #[ORM\Column(type: 'integer')]
    private int $intelligence;
    #[ORM\Column(type: 'integer')]
    private int $stamina;
    #[ORM\Column(type: 'integer')]
    private int $agility;
    #[ORM\Column(type: 'integer')]
    private int $charisma;

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;
        return $this;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): self
    {
        $this->stamina = $stamina;
        return $this;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): self
    {
        $this->agility = $agility;
        return $this;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): self
    {
        $this->charisma = $charisma;
        return $this;
    }
}