<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NonPlayableCharacterTalentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterTalentRepository::class)]
class NonPlayableCharacterTalent
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: NonPlayableCharacter::class, inversedBy: 'talents')]
    private NonPlayableCharacter $nonPlayableCharacter;
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Talent::class)]
    private Talent $talent;
    #[ORM\Column(type: 'integer')]
    private int $value;

    public function getNonPlayableCharacter(): NonPlayableCharacter
    {
        return $this->nonPlayableCharacter;
    }

    public function setNonPlayableCharacter(NonPlayableCharacter $nonPlayableCharacter): NonPlayableCharacterTalent
    {
        $this->nonPlayableCharacter = $nonPlayableCharacter;

        return $this;
    }

    public function getTalent(): Talent
    {
        return $this->talent;
    }

    public function setTalent(Talent $talent): NonPlayableCharacterTalent
    {
        $this->talent = $talent;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): NonPlayableCharacterTalent
    {
        $this->value = $value;

        return $this;
    }

    public function getName(): string
    {
        return $this->talent->getName();
    }
}
