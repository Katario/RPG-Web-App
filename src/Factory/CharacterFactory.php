<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Character;
use App\Entity\CharacterTemplate;

class CharacterFactory
{
    public function createOneFromCharacterTemplate(CharacterTemplate $characterTemplate): Character
    {
        $character = new Character();
        $character
            ->setCharacterClass($characterTemplate->getCharacterClass())
            ->setKind($characterTemplate->getKind())
            ->setCurrentHealthPoints($characterTemplate->getMaxHealthPoints())
            ->setMaxHealthPoints($characterTemplate->getMaxHealthPoints())
            ->setCurrentActionPoints($characterTemplate->getMaxActionPoints())
            ->setMaxActionPoints($characterTemplate->getMaxActionPoints())
            ->setCurrentManaPoints($characterTemplate->getMaxManaPoints())
            ->setMaxManaPoints($characterTemplate->getMaxManaPoints())
            ->setCurrentExhaustPoints($characterTemplate->getMaxExhaustPoints())
            ->setMaxExhaustPoints($characterTemplate->getMaxExhaustPoints())
            ->setSpells($characterTemplate->getSpells())
            ->setItems($characterTemplate->getItems())
            ->setSkills($characterTemplate->getSkills())
        ;

        return $character;
    }
}
