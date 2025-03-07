<?php

namespace App\Entity;

use App\Repository\NonPlayableCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class NonPlayableCharacter
{
    use HasDateTimeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lastName;
    #[ORM\JoinTable(name: 'non_playable_characters_kind')]
    #[ORM\JoinColumn(name: 'non_playable_character_id', referencedColumnName: 'id', unique: true)]
    #[ORM\InverseJoinColumn(name: 'kind_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: 'Kind')]
    private Collection $kind;
    #[ORM\JoinTable(name: 'non_playable_characters_character_class')]
    #[ORM\JoinColumn(name: 'non_playable_character_id', referencedColumnName: 'id', unique: true)]
    #[ORM\InverseJoinColumn(name: 'character_class_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: 'CharacterClass')]
    private Collection $characterClass;
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
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'nonPlayableCharacters')]
    #[ORM\JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'nonPlayableCharacter')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private Collection|array $armaments;
    #[ORM\JoinTable(name: 'non_playable_characters_spells')]
    #[ORM\JoinColumn(name: 'non_playable_character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'non_playable_characters_items')]
    #[ORM\JoinColumn(name: 'non_playable_character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'non_playable_characters_skills')]
    #[ORM\JoinColumn(name: 'non_playable_character_id', referencedColumnName: 'id')]
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): NonPlayableCharacter
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): NonPlayableCharacter
    {
        $this->name = $name;

        return $this;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): NonPlayableCharacter
    {
        $this->game = $game;

        return $this;
    }

    public function getArmaments(): Collection|array
    {
        return $this->armaments;
    }

    public function setArmaments(Collection|array $armaments): NonPlayableCharacter
    {
        $this->armaments = $armaments;

        return $this;
    }

    public function addArmament(Armament $armament): NonPlayableCharacter
    {
        if (!$this->getArmaments()->contains($armament)) {
            $armament->setIsOwned(true);
            $armament->setNonPlayableCharacter($this);
            $this->armaments->add($armament);
        }

        return $this;
    }

    public function removeArmament(Armament $armament): NonPlayableCharacter
    {
        if ($this->getArmaments()->contains($armament)) {
            $armament->setNonPlayableCharacter(null);
            $armament->setIsOwned(false);
            $this->armaments->removeElement($armament);
        }

        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function setSpells(Collection|array $spells): NonPlayableCharacter
    {
        $this->spells = $spells;

        return $this;
    }

    public function addSpell(Spell $spell): NonPlayableCharacter
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): NonPlayableCharacter
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

    public function setItems(Collection|array $items): NonPlayableCharacter
    {
        $this->items = $items;

        return $this;
    }

    public function addItem(Item $item): NonPlayableCharacter
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(Item $item): NonPlayableCharacter
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

    public function setSkills(Collection|array $skills): NonPlayableCharacter
    {
        $this->skills = $skills;

        return $this;
    }

    public function addSkill(Skill $skill): NonPlayableCharacter
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): NonPlayableCharacter
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

    public function setLevel(int $level): NonPlayableCharacter
    {
        $this->level = $level;

        return $this;
    }

    public function getCurrentHealthPoints(): int
    {
        return $this->currentHealthPoints;
    }

    public function setCurrentHealthPoints(int $currentHealthPoints): NonPlayableCharacter
    {
        $this->currentHealthPoints = $currentHealthPoints;

        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): NonPlayableCharacter
    {
        $this->maxHealthPoints = $maxHealthPoints;

        return $this;
    }

    public function getCurrentManaPoints(): int
    {
        return $this->currentManaPoints;
    }

    public function setCurrentManaPoints(int $currentManaPoints): NonPlayableCharacter
    {
        $this->currentManaPoints = $currentManaPoints;

        return $this;
    }

    public function getMaxManaPoints(): int
    {
        return $this->maxManaPoints;
    }

    public function setMaxManaPoints(int $maxManaPoints): NonPlayableCharacter
    {
        $this->maxManaPoints = $maxManaPoints;

        return $this;
    }

    public function getCurrentActionPoints(): int
    {
        return $this->currentActionPoints;
    }

    public function setCurrentActionPoints(int $currentActionPoints): NonPlayableCharacter
    {
        $this->currentActionPoints = $currentActionPoints;

        return $this;
    }

    public function getMaxActionPoints(): int
    {
        return $this->maxActionPoints;
    }

    public function setMaxActionPoints(int $maxActionPoints): NonPlayableCharacter
    {
        $this->maxActionPoints = $maxActionPoints;

        return $this;
    }

    public function getCurrentExhaustPoints(): int
    {
        return $this->currentExhaustPoints;
    }

    public function setCurrentExhaustPoints(int $currentExhaustPoints): NonPlayableCharacter
    {
        $this->currentExhaustPoints = $currentExhaustPoints;

        return $this;
    }

    public function getMaxExhaustPoints(): int
    {
        return $this->maxExhaustPoints;
    }

    public function setMaxExhaustPoints(int $maxExhaustPoints): NonPlayableCharacter
    {
        $this->maxExhaustPoints = $maxExhaustPoints;

        return $this;
    }

    public function getKind(): ?Kind
    {
        if (0 === $this->kind->count()) {
            return null;
        }

        return $this->kind->first();
    }

    public function setKind(Kind $kind): NonPlayableCharacter
    {
        if (!$this->kind->contains($kind)) {
            $this->kind->clear();
            $this->kind->add($kind);
        }

        return $this;
    }

    public function getCharacterClass(): ?CharacterClass
    {
        if (0 === $this->characterClass->count()) {
            return null;
        }

        return $this->characterClass->first();
    }

    public function setCharacterClass(CharacterClass $characterClass): NonPlayableCharacter
    {
        if (!$this->characterClass->contains($characterClass)) {
            $this->characterClass->clear();
            $this->characterClass->add($characterClass);
        }

        return $this;
    }

    public function getFullName(): string
    {
        return $this->name.' '.$this->getLastName();
    }
}
