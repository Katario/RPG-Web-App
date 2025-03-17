<?php

namespace App\Entity;

use App\Repository\ArmamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmamentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Armament
{
    use HasDateTimeTrait;
    use HasNoteTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $category;
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $value;
    #[ORM\Column(type: 'integer')]
    private int $maxDurability;
    #[ORM\Column(type: 'integer')]
    private int $currentDurability;
    #[ORM\Column(type: 'text')]
    private string $description = '';
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isOwned = false;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'armaments')]
    private Game $game;
    #[ORM\ManyToOne(targetEntity: Monster::class, inversedBy: 'armaments')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?Monster $monster;
    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'armaments')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?Character $character;
    #[ORM\ManyToOne(targetEntity: NonPlayableCharacter::class, inversedBy: 'armaments')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?NonPlayableCharacter $nonPlayableCharacter;
    #[ORM\JoinTable(name: 'armaments_skills')]
    #[ORM\JoinColumn(name: 'armament_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;
    #[ORM\JoinTable(name: 'armaments_spells')]
    #[ORM\JoinColumn(name: 'armament_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;

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

    public function setName(string $name): Armament
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): Armament
    {
        $this->category = $category;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): Armament
    {
        $this->value = $value;

        return $this;
    }

    public function getMaxDurability(): int
    {
        return $this->maxDurability;
    }

    public function setMaxDurability(int $maxDurability): Armament
    {
        $this->maxDurability = $maxDurability;

        return $this;
    }

    public function getCurrentDurability(): int
    {
        return $this->currentDurability;
    }

    public function setCurrentDurability(int $currentDurability): Armament
    {
        $this->currentDurability = $currentDurability;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Armament
    {
        $this->description = $description;

        return $this;
    }

    public function isOwned(): bool
    {
        return $this->isOwned;
    }

    public function setIsOwned(bool $isOwned): Armament
    {
        $this->isOwned = $isOwned;

        return $this;
    }

    public function getSkills(): Collection|array
    {
        return $this->skills;
    }

    public function setSkills(Collection|array $skills): Armament
    {
        $this->skills = $skills;

        return $this;
    }

    public function addSkill(Skill $skill): Armament
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): Armament
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

    public function setSpells(Collection|array $spells): Armament
    {
        $this->spells = $spells;

        return $this;
    }

    public function addSpell(Spell $spell): Armament
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): Armament
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

    public function setGame(Game $game): Armament
    {
        $this->game = $game;

        return $this;
    }

    public function getMonster(): ?Monster
    {
        return $this->monster;
    }

    public function setMonster(?Monster $monster): Armament
    {
        $this->monster = $monster;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): Armament
    {
        $this->character = $character;

        return $this;
    }

    public function getNonPlayableCharacter(): ?NonPlayableCharacter
    {
        return $this->nonPlayableCharacter;
    }

    public function setNonPlayableCharacter(?NonPlayableCharacter $nonPlayableCharacter): Armament
    {
        $this->nonPlayableCharacter = $nonPlayableCharacter;

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
