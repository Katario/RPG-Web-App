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
            ->setTitle($nonPlayableCharacterTemplate->getTitle())
            ->setKind($nonPlayableCharacterTemplate->getKind())
            ->setCurrentHealthPoints($nonPlayableCharacterTemplate->getMaxHealthPoints())
            ->setMaxHealthPoints($nonPlayableCharacterTemplate->getMaxHealthPoints())
            ->setCurrentActionPoints($nonPlayableCharacterTemplate->getMaxActionPoints())
            ->setMaxActionPoints($nonPlayableCharacterTemplate->getMaxActionPoints())
            ->setCurrentManaPoints($nonPlayableCharacterTemplate->getMaxManaPoints())
            ->setMaxManaPoints($nonPlayableCharacterTemplate->getMaxManaPoints())
            ->setCurrentExhaustPoints($nonPlayableCharacterTemplate->getMaxExhaustPoints())
            ->setMaxExhaustPoints($nonPlayableCharacterTemplate->getMaxExhaustPoints())
            ->setStrength(rand(
                $nonPlayableCharacterTemplate->getMinStrength(),
                $nonPlayableCharacterTemplate->getMaxStrength()
            ))
            ->setIntelligence(rand(
                $nonPlayableCharacterTemplate->getMinIntelligence(),
                $nonPlayableCharacterTemplate->getMaxIntelligence()
            ))
            ->setStamina(rand(
                $nonPlayableCharacterTemplate->getMinStamina(),
                $nonPlayableCharacterTemplate->getMaxStamina()
            ))
            ->setAgility(rand(
                $nonPlayableCharacterTemplate->getMinAgility(),
                $nonPlayableCharacterTemplate->getMaxAgility()
            ))
            ->setCharisma(rand(
                $nonPlayableCharacterTemplate->getMinCharisma(),
                $nonPlayableCharacterTemplate->getMaxCharisma()
            ))
            ->setSpells($nonPlayableCharacterTemplate->getSpells())
            ->setItems($nonPlayableCharacterTemplate->getItems())
            ->setSkills($nonPlayableCharacterTemplate->getSkills())
        ;

        return $nonPlayableCharacter;
    }
}