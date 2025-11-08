<?php

namespace App\Entity;

use App\Repository\TalentLevelRepository;
use Doctrine\ORM\Mapping as ORM;

// @TODO: relation with TalentLevel: a talent have multiple TalentLevel, a TalentLevel have one Talent
#[ORM\Entity(repositoryClass: TalentLevelRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TalentLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'int')]
    private int $level;

    #[ORM\Column(type: 'text')]
    private string $description;
    // @TODO: a Talent may be linked to a Skill, passive or active. The relation is a TalentLevel may be link to ONE skill, a skill may be linked to MULTIPLE TalentLevel.
    // @TODO: a TalentLevel may also be linked to Bonuses.
}
