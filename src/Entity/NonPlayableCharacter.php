<?php

namespace App\Entity;

use App\Repository\NonPlayableCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterRepository::class)]
class NonPlayableCharacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $firstName = null;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lastName = null;
    #[ORM\Column(type: 'string')]
    private string $title;
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
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'nonPlayableCharacter')]
    #[ORM\JoinColumn(nullable: true)]
    private Collection|array $armaments;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'nonPlayableCharacters')]
    private Game $game;
    #[ORM\JoinTable(name: 'nonPlayableCharacters_spells')]
    #[ORM\JoinColumn(name: 'nonPlayableCharacter_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'nonPlayableCharacters_items')]
    #[ORM\JoinColumn(name: 'nonPlayableCharacter_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'nonPlayableCharacters_skills')]
    #[ORM\JoinColumn(name: 'nonPlayableCharacter_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    public function __construct()
    {
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): NonPlayableCharacter
    {
        $this->firstName = $firstName;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): NonPlayableCharacter
    {
        $this->title = $title;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): NonPlayableCharacter
    {
        $this->strength = $strength;
        return $this;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): NonPlayableCharacter
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): NonPlayableCharacter
    {
        $this->stamina = $stamina;
        return $this;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): NonPlayableCharacter
    {
        $this->agility = $agility;
        return $this;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): NonPlayableCharacter
    {
        $this->charisma = $charisma;
        return $this;
    }

    public function getHealthPoint(): int
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint): NonPlayableCharacter
    {
        $this->healthPoint = $healthPoint;
        return $this;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(int $mana): NonPlayableCharacter
    {
        $this->mana = $mana;
        return $this;
    }

    public function getArmaments(): Collection|array
    {
        return $this->armaments;
    }

    public function addArmament(Armament $armament): NonPlayableCharacter
    {
        if (!$this->getArmaments()->contains($armament)) {
            $armament->setNonPlayableCharacter($this);
            $this->armaments->add($armament);
        }
        return $this;
    }

    public function removeArmament(Armament $armament): NonPlayableCharacter
    {
        if ($this->getArmaments()->contains($armament)) {
            $armament->setNonPlayableCharacter(null);
            $this->armaments->removeElement($armament);
        }
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

    public function getSpells(): Collection|array
    {
        return $this->spells;
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
}
