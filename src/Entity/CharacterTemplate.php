<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\CharacterTemplateRepository;
use App\Repository\MonsterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CharacterTemplate extends AbstractEncyclopedia
{
    use DateTimeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $title;
    #[ORM\Column(type: 'integer')]
    private int $strengthMin;
    #[ORM\Column(type: 'integer')]
    private int $strengthMax;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMin;
    #[ORM\Column(type: 'integer')]
    private int $intelligenceMax;
    #[ORM\Column(type: 'integer')]
    private int $staminaMin;
    #[ORM\Column(type: 'integer')]
    private int $staminaMax;
    #[ORM\Column(type: 'integer')]
    private int $agilityMin;
    #[ORM\Column(type: 'integer')]
    private int $agilityMax;
    #[ORM\Column(type: 'integer')]
    private int $charismaMin;
    #[ORM\Column(type: 'integer')]
    private int $charismaMax;
    #[ORM\Column(type: 'integer')]
    private int $healthPointMin;
    #[ORM\Column(type: 'integer')]
    private int $healthPointMax;
    #[ORM\Column(type: 'integer')]
    private int $manaMin;
    #[ORM\Column(type: 'integer')]
    private int $manaMax;
    #[ORM\JoinTable(name: 'character_templates_spells')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'character_templates_items')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'character_templates_skills')]
    #[ORM\JoinColumn(name: 'character_template_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Skill::class)]
    private Collection|array $skills;

    public function __construct()
    {
        $this->spells = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): CharacterTemplate
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CharacterTemplate
    {
        $this->name = $name;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): CharacterTemplate
    {
        $this->title = $title;
        return $this;
    }

    public function getStrengthMin(): int
    {
        return $this->strengthMin;
    }

    public function setStrengthMin(int $strengthMin): CharacterTemplate
    {
        $this->strengthMin = $strengthMin;
        return $this;
    }

    public function getStrengthMax(): int
    {
        return $this->strengthMax;
    }

    public function setStrengthMax(int $strengthMax): CharacterTemplate
    {
        $this->strengthMax = $strengthMax;
        return $this;
    }

    public function getIntelligenceMin(): int
    {
        return $this->intelligenceMin;
    }

    public function setIntelligenceMin(int $intelligenceMin): CharacterTemplate
    {
        $this->intelligenceMin = $intelligenceMin;
        return $this;
    }

    public function getIntelligenceMax(): int
    {
        return $this->intelligenceMax;
    }

    public function setIntelligenceMax(int $intelligenceMax): CharacterTemplate
    {
        $this->intelligenceMax = $intelligenceMax;
        return $this;
    }

    public function getStaminaMin(): int
    {
        return $this->staminaMin;
    }

    public function setStaminaMin(int $staminaMin): CharacterTemplate
    {
        $this->staminaMin = $staminaMin;
        return $this;
    }

    public function getStaminaMax(): int
    {
        return $this->staminaMax;
    }

    public function setStaminaMax(int $staminaMax): CharacterTemplate
    {
        $this->staminaMax = $staminaMax;
        return $this;
    }

    public function getAgilityMin(): int
    {
        return $this->agilityMin;
    }

    public function setAgilityMin(int $agilityMin): CharacterTemplate
    {
        $this->agilityMin = $agilityMin;
        return $this;
    }

    public function getAgilityMax(): int
    {
        return $this->agilityMax;
    }

    public function setAgilityMax(int $agilityMax): CharacterTemplate
    {
        $this->agilityMax = $agilityMax;
        return $this;
    }

    public function getCharismaMin(): int
    {
        return $this->charismaMin;
    }

    public function setCharismaMin(int $charismaMin): CharacterTemplate
    {
        $this->charismaMin = $charismaMin;
        return $this;
    }

    public function getCharismaMax(): int
    {
        return $this->charismaMax;
    }

    public function setCharismaMax(int $charismaMax): CharacterTemplate
    {
        $this->charismaMax = $charismaMax;
        return $this;
    }

    public function getHealthPointMin(): int
    {
        return $this->healthPointMin;
    }

    public function setHealthPointMin(int $healthPointMin): CharacterTemplate
    {
        $this->healthPointMin = $healthPointMin;
        return $this;
    }

    public function getHealthPointMax(): int
    {
        return $this->healthPointMax;
    }

    public function setHealthPointMax(int $healthPointMax): CharacterTemplate
    {
        $this->healthPointMax = $healthPointMax;
        return $this;
    }

    public function getManaMin(): int
    {
        return $this->manaMin;
    }

    public function setManaMin(int $manaMin): CharacterTemplate
    {
        $this->manaMin = $manaMin;
        return $this;
    }

    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): CharacterTemplate
    {
        $this->manaMax = $manaMax;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): CharacterTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): CharacterTemplate
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

    public function addItem(Item $item): CharacterTemplate
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): CharacterTemplate
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

    public function addSkill(Skill $skill): CharacterTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): CharacterTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}