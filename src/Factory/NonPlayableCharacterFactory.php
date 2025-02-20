<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;
use App\Entity\NonPlayableCharacter;
use App\Entity\NonPlayableCharacterTemplate;

class NonPlayableCharacterFactory
{
    public function createOneFromNonPlayableCharacterTemplate(NonPlayableCharacterTemplate $nonPlayableCharacterTemplate): NonPlayableCharacter
    {
        $nonPlayableCharacter = new NonPlayableCharacter();
        $nonPlayableCharacter
            ->setName($nonPlayableCharacterTemplate->getName())
            ->setType($nonPlayableCharacterTemplate->getType())
            ->setDescription($nonPlayableCharacterTemplate->getDescription())
            ->setSkills($nonPlayableCharacterTemplate->getSkills())
            ->setSpells($nonPlayableCharacterTemplate->getSpells())
        ;

        $nonPlayableCharacter->setValue(
            $this->generateBetweenMinAndMax($nonPlayableCharacterTemplate->getValueMin(), $nonPlayableCharacterTemplate->getValueMax())
        )
            ->setDurability(
                $this->generateBetweenMinAndMax($nonPlayableCharacterTemplate->getDurabilityMin(), $nonPlayableCharacterTemplate->getDurabilityMax())
            );

        return $nonPlayableCharacter;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}