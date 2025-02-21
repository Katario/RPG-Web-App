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
            ->setName($characterTemplate->getName())
            ->setTitle($characterTemplate->getTitle())
        ;

        return $character;
    }
}