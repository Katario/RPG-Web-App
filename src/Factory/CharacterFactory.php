<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Character;

class CharacterFactory
{
    public function createNew(): Character
    {
        $newlyGeneratedCharacter = new Character();

        return $newlyGeneratedCharacter
            ->setName('Default')
            ->setLastName('Default')
            ->setTitle('Wanderer')
            ->setCurrentLevel(1)
            ->setHealthPoints(10)
            ->setMaxHealthPoints(10);
    }
}