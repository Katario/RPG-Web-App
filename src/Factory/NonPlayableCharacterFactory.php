<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\NonPlayableCharacter;
use App\Entity\NonPlayableCharacterTemplate;

class NonPlayableCharacterFactory
{
    public function createOneFromNonPlayableCharacterTemplate(NonPlayableCharacterTemplate $nonPlayableCharacterTemplate): NonPlayableCharacter
    {
        $nonPlayableCharacter = new NonPlayableCharacter();
        $nonPlayableCharacter
            ->setCharacterClass($nonPlayableCharacterTemplate->getCharacterClass())
            ->setKind($nonPlayableCharacterTemplate->getKind())
            ->setCurrentHealthPoints($nonPlayableCharacterTemplate->getMaxHealthPoints())
            ->setMaxHealthPoints($nonPlayableCharacterTemplate->getMaxHealthPoints())
            ->setCurrentActionPoints($nonPlayableCharacterTemplate->getMaxActionPoints())
            ->setMaxActionPoints($nonPlayableCharacterTemplate->getMaxActionPoints())
            ->setCurrentManaPoints($nonPlayableCharacterTemplate->getMaxManaPoints())
            ->setMaxManaPoints($nonPlayableCharacterTemplate->getMaxManaPoints())
            ->setCurrentExhaustPoints($nonPlayableCharacterTemplate->getMaxExhaustPoints())
            ->setMaxExhaustPoints($nonPlayableCharacterTemplate->getMaxExhaustPoints())
            ->setSpells($nonPlayableCharacterTemplate->getSpells())
            ->setItems($nonPlayableCharacterTemplate->getItems())
            ->setSkills($nonPlayableCharacterTemplate->getSkills())
        ;

        return $nonPlayableCharacter;
    }
}
