<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Table(name: 'playable_character')]
#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Character
{
    use HasDateTimeTrait;
    use HasStatsTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lastName;
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
    #[JoinTable(name: 'characters_kind')]
    #[JoinColumn(name: 'character_id', referencedColumnName: 'id', unique: true)]
    #[ORM\InverseJoinColumn(name: 'kind_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: 'Kind')]
    private Collection $kind;
    #[JoinTable(name: 'characters_character_class')]
    #[JoinColumn(name: 'character_id', referencedColumnName: 'id', unique: true)]
    #[ORM\InverseJoinColumn(name: 'character_class_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: 'CharacterClass')]
    private Collection $characterClass;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'characters')]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true)]
    private ?User $user;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'characters')]
    #[JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'character')]
    #[JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private Collection|array $armaments;
    #[JoinTable(name: 'characters_spells')]
    #[JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[JoinTable(name: 'characters_items')]
    #[JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[JoinTable(name: 'characters_skills')]
    #[JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    public function __construct()
    {
        $this->kind = new ArrayCollection();
        $this->characterClass = new ArrayCollection();
        $this->armaments = new ArrayCollection();
        $this->spells = new ArrayCollection();
        $this->items = new ArrayCollection();
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

    public function setName(string $name): Character
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): Character
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getKind(): ?Kind
    {
        return $this->kind->first();
    }

    public function setKind(Kind $kind): Character
    {
        if (!$this->kind->contains($kind)) {
            $this->kind->clear();
            $this->kind->add($kind);
        }

        return $this;
    }

    public function getCharacterClass(): ?CharacterClass
    {
        return $this->characterClass->first();
    }

    public function setCharacterClass(CharacterClass $characterClass): Character
    {
        if (!$this->characterClass->contains($characterClass)) {
            $this->characterClass->clear();
            $this->characterClass->add($characterClass);
        }

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Character
    {
        $this->user = $user;

        return $this;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): Character
    {
        $this->game = $game;

        return $this;
    }

    public function getArmaments(): Collection|array
    {
        return $this->armaments;
    }

    public function setArmaments(Collection|array $armaments): Character
    {
        $this->armaments = $armaments;

        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function setSpells(Collection|array $spells): Character
    {
        $this->spells = $spells;

        return $this;
    }

    public function addSpell(Spell $spell): Character
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): Character
    {
        if ($this->getSpells()->contains($spell)) {
            $this->spells->removeElement($spell);
        }

        return $this;
    }

    public function getItems(): Collection|array
    {
        return $this->items;
    }

    public function setItems(Collection|array $items): Character
    {
        $this->items = $items;

        return $this;
    }

    public function addItem(Item $item): Character
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(Item $item): Character
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

    public function setSkills(Collection|array $skills): Character
    {
        $this->skills = $skills;

        return $this;
    }

    public function addSkill(Skill $skill): Character
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): Character
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }

        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): Character
    {
        $this->level = $level;

        return $this;
    }

    public function getCurrentHealthPoints(): int
    {
        return $this->currentHealthPoints;
    }

    public function setCurrentHealthPoints(int $currentHealthPoints): Character
    {
        $this->currentHealthPoints = $currentHealthPoints;

        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): Character
    {
        $this->maxHealthPoints = $maxHealthPoints;

        return $this;
    }

    public function getCurrentManaPoints(): int
    {
        return $this->currentManaPoints;
    }

    public function setCurrentManaPoints(int $currentManaPoints): Character
    {
        $this->currentManaPoints = $currentManaPoints;

        return $this;
    }

    public function getMaxManaPoints(): int
    {
        return $this->maxManaPoints;
    }

    public function setMaxManaPoints(int $maxManaPoints): Character
    {
        $this->maxManaPoints = $maxManaPoints;

        return $this;
    }

    public function getCurrentActionPoints(): int
    {
        return $this->currentActionPoints;
    }

    public function setCurrentActionPoints(int $currentActionPoints): Character
    {
        $this->currentActionPoints = $currentActionPoints;

        return $this;
    }

    public function getMaxActionPoints(): int
    {
        return $this->maxActionPoints;
    }

    public function setMaxActionPoints(int $maxActionPoints): Character
    {
        $this->maxActionPoints = $maxActionPoints;

        return $this;
    }

    public function getCurrentExhaustPoints(): int
    {
        return $this->currentExhaustPoints;
    }

    public function setCurrentExhaustPoints(int $currentExhaustPoints): Character
    {
        $this->currentExhaustPoints = $currentExhaustPoints;

        return $this;
    }

    public function getMaxExhaustPoints(): int
    {
        return $this->maxExhaustPoints;
    }

    public function setMaxExhaustPoints(int $maxExhaustPoints): Character
    {
        $this->maxExhaustPoints = $maxExhaustPoints;

        return $this;
    }

    public function getTitle(): Kind
    {
        return $this->title;
    }

    public function setTitle(Kind $title): Character
    {
        $this->title = $title;

        return $this;
    }
}
