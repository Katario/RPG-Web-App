<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\NonPlayableCharacterTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterTemplateRepository::class)]
#[ORM\HasLifecycleCallbacks]
class NonPlayableCharacterTemplate extends AbstractEncyclopedia
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
    #[ORM\JoinTable(name: 'non_playable_character_templates_spells')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'spell_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Spell::class)]
    private Collection|array $spells;
    #[ORM\JoinTable(name: 'non_playable_character_templates_items')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'item_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection|array $items;
    #[ORM\JoinTable(name: 'non_playable_character_templates_skills')]
    #[ORM\JoinColumn(name: 'non_playable_character_template_id', referencedColumnName: 'id', onDelete: 'cascade')]
    #[ORM\InverseJoinColumn(name: 'skill_id', referencedColumnName: 'id', onDelete: 'cascade')]
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

    public function setId(?int $id): NonPlayableCharacterTemplate
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): NonPlayableCharacterTemplate
    {
        $this->name = $name;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): NonPlayableCharacterTemplate
    {
        $this->title = $title;
        return $this;
    }

    public function getStrengthMin(): int
    {
        return $this->strengthMin;
    }

    public function setStrengthMin(int $strengthMin): NonPlayableCharacterTemplate
    {
        $this->strengthMin = $strengthMin;
        return $this;
    }

    public function getStrengthMax(): int
    {
        return $this->strengthMax;
    }

    public function setStrengthMax(int $strengthMax): NonPlayableCharacterTemplate
    {
        $this->strengthMax = $strengthMax;
        return $this;
    }

    public function getIntelligenceMin(): int
    {
        return $this->intelligenceMin;
    }

    public function setIntelligenceMin(int $intelligenceMin): NonPlayableCharacterTemplate
    {
        $this->intelligenceMin = $intelligenceMin;
        return $this;
    }

    public function getIntelligenceMax(): int
    {
        return $this->intelligenceMax;
    }

    public function setIntelligenceMax(int $intelligenceMax): NonPlayableCharacterTemplate
    {
        $this->intelligenceMax = $intelligenceMax;
        return $this;
    }

    public function getStaminaMin(): int
    {
        return $this->staminaMin;
    }

    public function setStaminaMin(int $staminaMin): NonPlayableCharacterTemplate
    {
        $this->staminaMin = $staminaMin;
        return $this;
    }

    public function getStaminaMax(): int
    {
        return $this->staminaMax;
    }

    public function setStaminaMax(int $staminaMax): NonPlayableCharacterTemplate
    {
        $this->staminaMax = $staminaMax;
        return $this;
    }

    public function getAgilityMin(): int
    {
        return $this->agilityMin;
    }

    public function setAgilityMin(int $agilityMin): NonPlayableCharacterTemplate
    {
        $this->agilityMin = $agilityMin;
        return $this;
    }

    public function getAgilityMax(): int
    {
        return $this->agilityMax;
    }

    public function setAgilityMax(int $agilityMax): NonPlayableCharacterTemplate
    {
        $this->agilityMax = $agilityMax;
        return $this;
    }

    public function getCharismaMin(): int
    {
        return $this->charismaMin;
    }

    public function setCharismaMin(int $charismaMin): NonPlayableCharacterTemplate
    {
        $this->charismaMin = $charismaMin;
        return $this;
    }

    public function getCharismaMax(): int
    {
        return $this->charismaMax;
    }

    public function setCharismaMax(int $charismaMax): NonPlayableCharacterTemplate
    {
        $this->charismaMax = $charismaMax;
        return $this;
    }

    public function getHealthPointMin(): int
    {
        return $this->healthPointMin;
    }

    public function setHealthPointMin(int $healthPointMin): NonPlayableCharacterTemplate
    {
        $this->healthPointMin = $healthPointMin;
        return $this;
    }

    public function getHealthPointMax(): int
    {
        return $this->healthPointMax;
    }

    public function setHealthPointMax(int $healthPointMax): NonPlayableCharacterTemplate
    {
        $this->healthPointMax = $healthPointMax;
        return $this;
    }

    public function getManaMin(): int
    {
        return $this->manaMin;
    }

    public function setManaMin(int $manaMin): NonPlayableCharacterTemplate
    {
        $this->manaMin = $manaMin;
        return $this;
    }

    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): NonPlayableCharacterTemplate
    {
        $this->manaMax = $manaMax;
        return $this;
    }

    public function getSpells(): Collection|array
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): NonPlayableCharacterTemplate
    {
        if (!$this->getSpells()->contains($spell)) {
            $this->spells->add($spell);
        }
        return $this;
    }

    public function removeSpell(Spell $spell): NonPlayableCharacterTemplate
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

    public function addItem(Item $item): NonPlayableCharacterTemplate
    {
        if (!$this->getItems()->contains($item)) {
            $this->items->add($item);
        }
        return $this;
    }

    public function removeItem(Item $item): NonPlayableCharacterTemplate
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

    public function addSkill(Skill $skill): NonPlayableCharacterTemplate
    {
        if (!$this->getSkills()->contains($skill)) {
            $this->skills->add($skill);
        }
        return $this;
    }

    public function removeSkill(Skill $skill): NonPlayableCharacterTemplate
    {
        if ($this->getSkills()->contains($skill)) {
            $this->skills->removeElement($skill);
        }
        return $this;
    }
}