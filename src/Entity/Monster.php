<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $firstName = null;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lastName = null;
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
    #[ORM\Column(type: 'integer')]
    private int $healthPoint;
    #[ORM\Column(type: 'integer')]
    private int $mana;

    #[ORM\JoinTable(name: 'monsters_spells')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;

    #[ORM\JoinTable(name: 'monsters_items')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;

    #[ORM\JoinTable(name: 'monsters_skills')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'characters')]
    private Collection|array $armaments;

    public function __construct()
    {
        $this->spells = new ArrayCollection();
        $this->armaments = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Monster
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Monster
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Monster
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Monster
    {
        $this->type = $type;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): Monster
    {
        $this->strength = $strength;
        return $this;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): Monster
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): Monster
    {
        $this->stamina = $stamina;
        return $this;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): Monster
    {
        $this->agility = $agility;
        return $this;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): Monster
    {
        $this->charisma = $charisma;
        return $this;
    }

    public function getHealthPoint(): int
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint): Monster
    {
        $this->healthPoint = $healthPoint;
        return $this;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(int $mana): Monster
    {
        $this->mana = $mana;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): Monster
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): Monster
    {
        if ($this->getSpells()->contains($spell)) {
            $this->spells->removeElement($spell);
        }
        return $this;
    }

    public function getArmaments(): Collection|array
    {
        return $this->armaments;
    }

    public function addArmament(Armament $armament): Monster
    {
        if (!$this->getArmaments()->contains($armament)) {
            $this->armaments->add($armament);
        }
        return $this;
    }

    public function removeArmament(Armament $armament): Monster
    {
        if ($this->getArmaments()->contains($armament)) {
            $this->armaments->removeElement($armament);
        }
        return $this;
    }

    public function getItems(): Collection|array
    {
        return $this->items;
    }

    public function addItem(Item $item): Monster
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): Monster
    {
        if ($this->getItems()->contains($item)) {
            $this->items->removeElement($item);
        }
        return $this;
    }

    public function getSkills(): Collection|array
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): Monster
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): Monster
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}