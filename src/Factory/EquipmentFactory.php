<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Equipment;
use App\Entity\EquipmentTemplate;

class EquipmentFactory
{
    public function createOneFromEquipmentTemplate(EquipmentTemplate $equipmentTemplate): Equipment
    {
        $equipment = new Equipment();
        $equipment
            ->setName($equipmentTemplate->getName())
            ->setCategory($equipmentTemplate->getCategory())
            ->setValue($equipmentTemplate->getValue())
            ->setCurrentDurabilityPoints($equipmentTemplate->getMaxDurability())
            ->setMaxDurabilityPoints($equipmentTemplate->getMaxDurability())
            ->setDescription($equipmentTemplate->getDescription())
            ->setSpells($equipmentTemplate->getSpells())
            ->setSkills($equipmentTemplate->getSkills());

        return $equipment;
    }

    private function generateBetweenMinAndMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}
