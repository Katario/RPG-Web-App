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
            ->setType($armamentTemplate->getType())
            ->setDescription($armamentTemplate->getDescription())
            ->setSkills($armamentTemplate->getSkills())
            ->setSpells($armamentTemplate->getSpells())
        ;

        $armament->setValue(
            $this->generateBetweenMinAndMax($armamentTemplate->getValueMin(), $armamentTemplate->getValueMax())
        )
            ->setDurability(
            $this->generateBetweenMinAndMax($armamentTemplate->getDurabilityMin(), $armamentTemplate->getDurabilityMax())
        );

        return $armament;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}