<?php

namespace App\Entity;

use App\Repository\NonPlayableCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterRepository::class)]
class NonPlayableCharacter extends AbstractCharacter
{
    use HasDateTimeTrait;
    use HasStatsTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lastName;
    #[ORM\Column(type: 'string')]
    private string $title;
    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'nonPlayableCharacters')]
    #[ORM\JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'nonPlayableCharacter')]
    #[ORM\JoinColumn(nullable: true, onDelete:'SET NULL')]
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): NonPlayableCharacter
    {
        $this->title = $title;
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
}
