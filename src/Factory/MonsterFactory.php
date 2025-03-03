<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;
use App\Entity\Monster;
use App\Entity\MonsterTemplate;

class MonsterFactory
{
    public function createOneFromMonsterTemplate(MonsterTemplate $monsterTemplate): Monster
    {
        $monster = new Monster();
        $monster
            ->setName($monsterTemplate->getName())
            ->setCurrentHealthPoints($monsterTemplate->getMaxHealthPoints())
            ->setMaxHealthPoints($monsterTemplate->getMaxHealthPoints())
            ->setCurrentActionPoints($monsterTemplate->getMaxActionPoints())
            ->setMaxActionPoints($monsterTemplate->getMaxActionPoints())
            ->setCurrentManaPoints($monsterTemplate->getMaxManaPoints())
            ->setMaxManaPoints($monsterTemplate->getMaxManaPoints())
            ->setCurrentExhaustPoints($monsterTemplate->getMaxExhaustPoints())
            ->setMaxExhaustPoints($monsterTemplate->getMaxExhaustPoints())
            ->setStrength(rand(
                $monsterTemplate->getMinStrength(),
                $monsterTemplate->getMaxStrength()
            ))
            ->setIntelligence(rand(
                $monsterTemplate->getMinIntelligence(),
                $monsterTemplate->getMaxIntelligence()
            ))
            ->setStamina(rand(
                $monsterTemplate->getMinStamina(),
                $monsterTemplate->getMaxStamina()
            ))
            ->setAgility(rand(
                $monsterTemplate->getMinAgility(),
                $monsterTemplate->getMaxAgility()
            ))
            ->setCharisma(rand(
                $monsterTemplate->getMinCharisma(),
                $monsterTemplate->getMaxCharisma()
            ))
            ->setSpells($monsterTemplate->getSpells())
            ->setItems($monsterTemplate->getItems())
            ->setSkills($monsterTemplate->getSkills());

        return $monster;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}