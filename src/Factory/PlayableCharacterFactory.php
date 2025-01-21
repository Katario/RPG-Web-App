<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\PlayableCharacter;

class PlayableCharacterFactory
{
    public function createNew(): PlayableCharacter
    {
        $newPlayableCharacter = new PlayableCharacter();

        return $newPlayableCharacter
            ->setName('Default')
            ->setLastName('Default')
            ->setTitle('Wanderer')
            ->setCurrentLevel(1)
            ->setHealthPoints(10)
            ->setMaxHealthPoints(10);
    }
}