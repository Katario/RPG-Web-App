<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[ORM\DiscriminatorMap([ // @TODO: replace this by BeingEnum::toDiscriminatorMapping
    "character" => Character::class,
    "monster" => Monster::class,
    "non_playable_character" => NonPlayableCharacter::class,
])]
#[ORM\MappedSuperclass]
abstract class Being
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    // @TODO: move all the relationships here (see ChatGPT topic)
}
