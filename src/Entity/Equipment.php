<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Equipment
{
    use HasDateTimeTrait;
    use HasNoteTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    // @TODO: Type it with an enum
    #[ORM\Column(type: 'string')]
    private string $category;

    #[ORM\Column(type: 'integer', nullable: true)]
    private int $value = 0;

    #[ORM\Column(type: 'integer')]
    private int $currentDurabilityPoints;

    #[ORM\Column(type: 'integer')]
    private int $maxDurabilityPoints;

    #[ORM\Column(type: 'text')]
    private string $description = '';

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isOwned = false;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'armaments')]
    private Game $game;

//    #[ORM\ManyToOne(targetEntity: Monster::class, inversedBy: 'armaments')]
//    #[ORM\JoinColumn(onDelete: 'SET NULL')]
//    private ?Monster $monster = null;

//    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'armaments')]
//    #[ORM\JoinColumn(onDelete: 'SET NULL')]
//    private ?Character $character = null;

//    #[ORM\ManyToOne(targetEntity: NonPlayableCharacter::class, inversedBy: 'armaments')]
//    #[ORM\JoinColumn(onDelete: 'SET NULL')]
//    private ?NonPlayableCharacter $nonPlayableCharacter = null;

    #[ORM\JoinTable(name: 'equipments_skills')]
    #[ORM\JoinColumn(name: 'equipment_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection $skills;

    #[ORM\JoinTable(name: 'equipments_spells')]
    #[ORM\JoinColumn(name: 'equipment_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection $spells;

    // @TODO: add enchantments

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->spells = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Equipment
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): Equipment
    {
        $this->category = $category;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): Equipment
    {
        $this->value = $value;

        return $this;
    }

    public function getMaxDurabilityPoints(): int
    {
        return $this->maxDurabilityPoints;
    }

    public function setMaxDurabilityPoints(int $maxDurabilityPoints): Equipment
    {
        $this->maxDurabilityPoints = $maxDurabilityPoints;

        return $this;
    }

    public function getCurrentDurabilityPoints(): int
    {
        return $this->currentDurabilityPoints;
    }

    public function setCurrentDurabilityPoints(int $currentDurabilityPoints): Equipment
    {
        $this->currentDurabilityPoints = $currentDurabilityPoints;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Equipment
    {
        $this->description = $description;

        return $this;
    }

    public function isOwned(): bool
    {
        return $this->isOwned;
    }

    public function setIsOwned(bool $isOwned): Equipment
    {
        $this->isOwned = $isOwned;

        return $this;
    }

    public function getSkills(): Collection|array
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): Equipment
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): Equipment
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }

        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): Equipment
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): Equipment
    {
        if ($this->getSpells()->contains($spell)) {
            $this->spells->removeElement($spell);
        }

        return $this;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): Equipment
    {
        $this->game = $game;

        return $this;
    }

    public function getMonster(): ?Monster
    {
        return $this->monster;
    }

    public function setMonster(?Monster $monster): Equipment
    {
        $this->monster = $monster;
        if ($this->monster) {
            $this->setIsOwned(true);
        }

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): Equipment
    {
        $this->character = $character;
        if ($this->character) {
            $this->setIsOwned(true);
        }

        return $this;
    }

    public function getNonPlayableCharacter(): ?NonPlayableCharacter
    {
        return $this->nonPlayableCharacter;
    }

    public function setNonPlayableCharacter(?NonPlayableCharacter $nonPlayableCharacter): Equipment
    {
        $this->nonPlayableCharacter = $nonPlayableCharacter;
        if ($this->nonPlayableCharacter) {
            $this->setIsOwned(true);
        }

        return $this;
    }

    public function getOwnerName(): ?string
    {
        if ($this->getCharacter()) {
            return $this->getCharacter()->getFullName();
        }
        if ($this->getMonster()) {
            return $this->getMonster()->getName();
        }
        if ($this->getNonPlayableCharacter()) {
            return $this->getNonPlayableCharacter()->getFullName();
        }

        return null;
    }
}
