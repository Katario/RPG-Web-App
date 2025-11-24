<?php

declare(strict_types=1);

namespace App\Enum;

use App\Entity\Character;
use App\Entity\Monster;
use App\Entity\NonPlayableCharacter;

enum BeingEnum: string
{
    case CHARACTER = 'character';
    case MONSTER = 'monster';
    case NON_PLAYABLE_CHARACTER = 'non_playable_character';

    public static function toDiscriminatorMapping(): array
    {
        return [
            self::CHARACTER->value => Character::class,
            self::MONSTER->value => Monster::class,
            self::NON_PLAYABLE_CHARACTER->value => NonPlayableCharacter::class,
        ];
    }
}
