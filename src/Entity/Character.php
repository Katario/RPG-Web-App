<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'playable_character')]
#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Character extends AbstractCharacter
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
    #[ORM\Column(type: 'string')]
    private string $title;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'characters')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true)]
    private ?User $user;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'characters')]
    #[ORM\JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'character')]
    #[ORM\JoinColumn(nullable: true, onDelete:'SET NULL')]
    private Collection|array $armaments;
    #[ORM\JoinTable(name: 'characters_spells')]
    #[ORM\JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'characters_items')]
    #[ORM\JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'characters_skills')]
    #[ORM\JoinColumn(name: 'character_id', referencedColumnName: 'id')]
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Character
    {
        $this->title = $title;
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
}