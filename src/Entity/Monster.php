<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Monster
{
    use HasDateTimeTrait;
    use HasNoteTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'boolean')]
    private bool $isBoss = false;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'monsters')]
    private Game $game;
    #[ORM\Column(type: 'integer')]
    private int $level;
    #[ORM\Column(type: 'integer')]
    private int $currentHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxHealthPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxManaPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxActionPoints;
    #[ORM\Column(type: 'integer')]
    private int $currentExhaustPoints;
    #[ORM\Column(type: 'integer')]
    private int $maxExhaustPoints;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'monster')]
    #[ORM\JoinColumn(nullable: true)]
    private Collection|array $armaments;

    #[ORM\JoinTable(name: 'monsters_specie')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id', unique: true, onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'specie_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: 'Specie')]
    private Collection $specie;

    #[ORM\JoinTable(name: 'monsters_spells')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'monsters_items')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'monsters_skills')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    public function __construct()
    {
        $this->specie = new ArrayCollection();
        $this->spells = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->armaments = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function isBoss(): bool
    {
        return $this->isBoss;
    }

    public function setIsBoss(bool $isBoss): Monster
    {
        $this->isBoss = $isBoss;

        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function setSpells(Collection|array $spells): Monster
    {
        $this->spells = $spells;

        return $this;
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

    public function setArmaments(Collection|array $armaments): Monster
    {
        $this->armaments = $armaments;

        return $this;
    }

    public function addArmament(Armament $armament): Monster
    {
        if (!$this->getArmaments()->contains($armament)) {
            $armament->setIsOwned(true);
            $armament->setMonster($this);
            $this->armaments->add($armament);
        }

        return $this;
    }

    public function removeArmament(Armament $armament): Monster
    {
        if ($this->getArmaments()->contains($armament)) {
            $armament->setMonster(null);
            $armament->setIsOwned(false);
            $this->armaments->removeElement($armament);
        }

        return $this;
    }

    public function getItems(): Collection|array
    {
        return $this->items;
    }

    public function setItems(Collection|array $items): Monster
    {
        $this->items = $items;

        return $this;
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

    public function setSkills(Collection|array $skills): Monster
    {
        $this->skills = $skills;

        return $this;
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

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): Monster
    {
        $this->game = $game;

        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): Monster
    {
        $this->level = $level;

        return $this;
    }

    public function getCurrentHealthPoints(): int
    {
        return $this->currentHealthPoints;
    }

    public function setCurrentHealthPoints(int $currentHealthPoints): Monster
    {
        $this->currentHealthPoints = $currentHealthPoints;

        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): Monster
    {
        $this->maxHealthPoints = $maxHealthPoints;

        return $this;
    }

    public function getCurrentManaPoints(): int
    {
        return $this->currentManaPoints;
    }

    public function setCurrentManaPoints(int $currentManaPoints): Monster
    {
        $this->currentManaPoints = $currentManaPoints;

        return $this;
    }

    public function getMaxManaPoints(): int
    {
        return $this->maxManaPoints;
    }

    public function setMaxManaPoints(int $maxManaPoints): Monster
    {
        $this->maxManaPoints = $maxManaPoints;

        return $this;
    }

    public function getCurrentActionPoints(): int
    {
        return $this->currentActionPoints;
    }

    public function setCurrentActionPoints(int $currentActionPoints): Monster
    {
        $this->currentActionPoints = $currentActionPoints;

        return $this;
    }

    public function getMaxActionPoints(): int
    {
        return $this->maxActionPoints;
    }

    public function setMaxActionPoints(int $maxActionPoints): Monster
    {
        $this->maxActionPoints = $maxActionPoints;

        return $this;
    }

    public function getCurrentExhaustPoints(): int
    {
        return $this->currentExhaustPoints;
    }

    public function setCurrentExhaustPoints(int $currentExhaustPoints): Monster
    {
        $this->currentExhaustPoints = $currentExhaustPoints;

        return $this;
    }

    public function getMaxExhaustPoints(): int
    {
        return $this->maxExhaustPoints;
    }

    public function setMaxExhaustPoints(int $maxExhaustPoints): Monster
    {
        $this->maxExhaustPoints = $maxExhaustPoints;

        return $this;
    }

    public function getSpecie(): ?Specie
    {
        if (0 === $this->specie->count()) {
            return null;
        }

        return $this->specie->first();
    }

    public function setSpecie(Specie $specie): Monster
    {
        if (!$this->specie->contains($specie)) {
            $this->specie->clear();
            $this->specie->add($specie);
        }

        return $this;
    }
}
