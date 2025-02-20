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
        $monster->setFamily($monsterTemplate->getFamily())
            ->setKind($monsterTemplate->getKind())
            ->setDescription($monsterTemplate->getDescription())
            ->setSkills($monsterTemplate->getSkills())
            ->setSpells($monsterTemplate->getSpells())
        ;

        $monster->setValue(
            $this->generateBetweenMinAndMax($monsterTemplate->getValueMin(), $monsterTemplate->getValueMax())
        )
            ->setDurability(
                $this->generateBetweenMinAndMax($monsterTemplate->getDurabilityMin(), $monsterTemplate->getDurabilityMax())
            );

        return $monster;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}