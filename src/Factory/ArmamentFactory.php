<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;

class ArmamentFactory
{
    public function createOneFromArmamentTemplate(ArmamentTemplate $armamentTemplate): Armament
    {
        $armament = new Armament();
        $armament
            ->setName($armamentTemplate->getName())
            ->setCategory($armamentTemplate->getCategory())
            ->setValue($armamentTemplate->getValue())
            ->setCurrentDurability($armamentTemplate->getMaxDurability())
            ->setMaxDurability($armamentTemplate->getMaxDurability())
            ->setDescription($armamentTemplate->getDescription())
            ->setSpells($armamentTemplate->getSpells())
            ->setSkills($armamentTemplate->getSkills());

        return $armament;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}
