<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CharacterTalentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterTalentRepository::class)]
class CharacterTalent
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'talents')]
    private Character $character;
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Talent::class)]
    private Talent $talent;
    #[ORM\Column(type: 'integer')]
    private int $value;

    public function getCharacter(): Character
    {
        return $this->character;
    }

    public function setCharacter(Character $character): CharacterTalent
    {
        $this->character = $character;
        return $this;
    }

    public function getTalent(): Talent
    {
        return $this->talent;
    }

    public function setTalent(Talent $talent): CharacterTalent
    {
        $this->talent = $talent;
        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): CharacterTalent
    {
        $this->value = $value;
        return $this;
    }

}