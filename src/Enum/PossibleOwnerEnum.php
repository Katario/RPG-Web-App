<?php

declare(strict_types=1);

namespace App\Enum;

enum PossibleOwnerEnum: string
{
    case MONSTER = 'monster';
    case NON_PLAYABLE_CHARACTER = 'nonPlayableCharacter';
    case CHARACTER = 'character';
}
