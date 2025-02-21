<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Cascade;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster extends AbstractCharacter
{
    use HasDateTimeTrait;
    use HasStatsTrait;

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

    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'monster')]
    #[ORM\JoinColumn(nullable: true)]
    private Collection|array $armaments;

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


    public function __construct()
    {
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
            $armament->setMonster($this);
            $this->armaments->add($armament);
        }
        return $this;
    }

    public function removeArmament(Armament $armament): Monster
    {
        if ($this->getArmaments()->contains($armament)) {
            $armament->setMonster(NULL);
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
}