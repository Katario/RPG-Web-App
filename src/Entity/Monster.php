<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $type;
    #[ORM\Column(type: 'integer')]
    private int $strength;
    #[ORM\Column(type: 'integer')]
    private int $intelligence;
    #[ORM\Column(type: 'integer')]
    private int $stamina;
    #[ORM\Column(type: 'integer')]
    private int $agility;
    #[ORM\Column(type: 'integer')]
    private int $charisma;

    #[ORM\JoinTable(name: 'monsters_spells')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
}