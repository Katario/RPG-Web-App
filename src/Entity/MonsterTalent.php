<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonsterTalentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterTalentRepository::class)]
class MonsterTalent
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Monster::class, inversedBy: 'talents')]
    private Monster $monster;
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Talent::class)]
    private Talent $talent;
    #[ORM\Column(type: 'integer')]
    private int $value;

    public function getMonster(): Monster
    {
        return $this->monster;
    }

    public function setMonster(Monster $monster): MonsterTalent
    {
        $this->monster = $monster;

        return $this;
    }

    public function getTalent(): Talent
    {
        return $this->talent;
    }

    public function setTalent(Talent $talent): MonsterTalent
    {
        $this->talent = $talent;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): MonsterTalent
    {
        $this->value = $value;

        return $this;
    }

    public function getName(): string
    {
        return $this->talent->getName();
    }
}
